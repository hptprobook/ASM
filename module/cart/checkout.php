

<?

$user_id = $user->get_user_id($_SESSION['username']);
$user_info = $database->get_row('SELECT * FROM users WHERE user_id = "' . $user_id . '"');
$report = $database->get_row('SELECT * FROM report');
$user_carts = array();
if (isset($_SESSION['selected_ids'])) {
  $selectedIds = $_SESSION['selected_ids'];
} else {
  $selectedIds = array();
}
foreach ($selectedIds as $key => $value) {
  $user_cart = $database->get_row('SELECT user_cart.*, products.price, products.name FROM user_cart INNER JOIN products ON user_cart.product_id=products.product_id WHERE id = "' . $value . '"');
  array_push($user_carts, $user_cart);
}

$total_checkout = 0;

if (isset($_POST['checkout-btn'])) {
  $error = array();
  $current_date = date('Y-m-d');

  $full_name = trim($_POST['checkout-fullname']);
  $email = trim($_POST['checkout-email']);
  $address = trim($_POST['checkout-address']);
  $phone = trim($_POST['checkout-phone']);
  $note = isset($_POST['checkout-note']) ? trim($_POST['checkout-note']) : null;

  if (empty($full_name)) $error['fullname'] = 'This field not be empty';
  if (empty($email)) $error['email'] = 'This field not be empty';
  if (empty($address)) $error['address'] = 'This field not be empty';
  if (empty($phone)) $error['phone'] = 'This field not be empty';

  if (empty($error)) {

    foreach ($user_carts as $item) {
      $data = array(
        'user_id' => $item['user_id'],
        'product_id' => $item['product_id'],
        'quantity' => $item['quantity'],
        'subtotal' => $item['subtotal'],
        'ship_name' => $full_name,
        'ship_address' => $address,
        'ship_phone' => $phone,
        'ship_email' => $email,
        'ship_date' => $current_date,
        'note' => $note,
        'status' => -1
      );
      $database->insert('user_cart_comp', $data);
      $order_processing = $report['order_processing'];
      $database->update('report', array('order_processing' => $order_processing + 1), 'id = 1');
      $is_checked_out = true;
      header('Location: ?mod=cart&act=send-mail&ship_name="'.$full_name.'"&ship_address="'.$address.'"&ship_email="'.$email.'"&ship_date="'.$current_date.'"');
      $database->remove('user_cart', 'id = "' . $item['id'] . '"');
      $cart->get_order($_SESSION['username']);

    }




    // header('Location: ?mod=user&act=order&is_checked_out=true');
  }

}
?>
<? $template->getHeader(); ?>

<section class="home">
  <div class="home__parallax-bg"></div>
  <div class="home__content">
    <h2 class="text-center">CHECK OUT</h2>
  </div>
</section>

<section class="shop-container grid wide">

  <?

  if (empty($user_info['name']) || empty($user_info['address']) || empty($user_info['phone'])) {
    echo '<div class="alert alert-error checkout-notify">Please complete all <a href="?mod=user&act=profile" class="text-white primary-link">your personal information</a>!</div>';
  }

  ?>

  <form action="" method="post" id="checkout-final-form">
    <div class="row">
      <!-- <form action=""> -->
      <div class="col l-6">
        <div class="checkout-form">
          <h2 class="checkout-heading">Check Out</h2>
          <p class="checkout-desc">Receiver Information</p>

          <div class="form-group">
            <label for="checkout-fullname">Full name ...</label>
            <input type="text" name="checkout-fullname" id="checkout-fullname" class="checkout-form__input" value="<? echo $user_info['name'] ?>">
            <span class="form-message"><? echo formError('fullname') ?></span>
          </div>
          <div class="form-group">
            <label for="checkout-email">Email ...</label>
            <input type="text" name="checkout-email" id="checkout-email" class="checkout-form__input" value="<? echo $user_info['email'] ?>">
            <span class="form-message"><? echo formError('email') ?></span>
          </div>
          <div class="form-group">
            <label for="checkout-address">Address ...</label>
            <input type="text" name="checkout-address" id="checkout-address" class="checkout-form__input" value="<? echo $user_info['address'] ?>">
            <span class="form-message"><? echo formError('address') ?></span>
          </div>
          <div class="form-group">
            <label for="checkout-phone">Phone ...</label>
            <input type="text" name="checkout-phone" id="checkout-phone" class="checkout-form__input" value="<? echo $user_info['phone'] ?>">
            <span class="form-message"><? echo formError('phone') ?></span>
          </div>
          <div class="form-group">
            <label for="checkout-note">Note ...</label>
            <textarea type="text" name="checkout-note" rows="6" id="checkout-note" class="checkout-form__note"></textarea>
            <span class="form-message"></span>
          </div>

        </div>
      </div>

      <div class="col l-6">
        <div class="checkout-order">
          <p class="checkout-desc" style="margin-top:52px;">Order Information</p>

          <table>
            <tr>
              <th style="width: 50%;">Product</th>
              <th style="width: 20%;"></th>
              <th style="width: 30%; text-align: end;">SubTotal</th>
            </tr>

            <? foreach ($user_carts as $cart_item) { ?>

              <tr>
                <td><? if (isset($cart_item['name'])) echo $cart_item['name'] ?></td>
                <td>x <? if (isset($cart_item['quantity'])) echo $cart_item['quantity'] ?></td>
                <td style="text-align: end;">$<? if (isset($cart_item['subtotal'])) echo $cart_item['subtotal'] ?></td>
              </tr>
              <?


              $total_checkout += isset($cart_item['subtotal']) ? $cart_item['subtotal'] : 0;

              ?>
            <? } ?>

          </table>

          <div class="checkout-total_amount float-end">
            <p>Total Amount: $<? echo $total_checkout ?></p>
            <button
              type="submit"
              <? if (empty($user_carts) && !isset($user_carts)) echo 'default' ?> 
              name="checkout-btn" class="checkout-btn float-end" id="checkout-final-btn">CHECK OUT</button>
          </div>

          <br>

        </div>
      </div>
      <!-- </form> -->
    </div>
  </form>
</section>


<? $template->getFooter(); ?>