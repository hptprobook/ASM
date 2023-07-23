

<?

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$user = $database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');
$user_id = $user['user_id'];
$user_carts = $database->get_list('SELECT user_cart.*, products.name FROM user_cart INNER JOIN products ON user_cart.product_id=products.product_id WHERE user_id = "' . $user_id . '"');
$orders = $database->get_row('SELECT * FROM orders WHERE user_id = "' . $user['user_id'] . '"');

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

    foreach ($user_carts as $user_cart) {
      $data = array(
        'user_id' => $user_cart['user_id'],
        'product_id' => $user_cart['product_id'],
        'quantity' => $user_cart['quantity'],
        'subtotal' => $user_cart['subtotal'],
        'ship_name' => $full_name,
        'ship_address' => $address,
        'ship_phone' => $phone,
        'ship_email' => $email,
        'ship_date' => $current_date,
        'note' => $note,
        'status' => -1
      );
      $database->insert('user_cart_comp', $data);
      $database->remove('user_cart', 'id = "' . $user_cart['id'] . '"');
    }

    $cart->get_order($username);

    $is_checked_out = true;
    header('Location: ?mod=cart&act=send-mail&ship_name="'.$full_name.'"&ship_address="'.$address.'"&ship_email="'.$email.'"&ship_date="'.$current_date.'"');
    // header('Location: ?mod=user&act=order&is_checked_out=true');
  } else $is_checked_out = false;

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

  if (empty($user['address']) || empty($user['phone'])) {
    echo '<div class="alert alert-error">Please complete all <a href="?mod=user&act=profile" class="text-white primary-link">your personal information</a>!</div>';
  }

  if (isset($is_checked_out) && $is_checked_out === false) {
    echo '<div class="alert alert-primary">Order Success</div>';
  } elseif (isset($is_checked_out) && $is_checked_out === true) {
    echo '<div class="alert alert-error">Order Failure</div>';
  }

  ?>

  <form action="" method="post">
    <div class="row">
      <!-- <form action=""> -->
      <div class="col l-6">
        <div class="checkout-form">
          <h2 class="checkout-heading">Check Out</h2>
          <p class="checkout-desc">Receiver Information</p>

          <div class="form-group">
            <label for="checkout-fullname">Full name ...</label>
            <input readonly type="text" name="checkout-fullname" id="checkout-fullname" class="checkout-form__input" value="<? echo $user['name'] ?>">
            <span class="form-message"><? echo formError('fullname') ?></span>
          </div>
          <div class="form-group">
            <label for="checkout-email">Email ...</label>
            <input readonly type="text" name="checkout-email" id="checkout-email" class="checkout-form__input" value="<? echo $user['email'] ?>">
            <span class="form-message"><? echo formError('email') ?></span>
          </div>
          <div class="form-group">
            <label for="checkout-address">Address ...</label>
            <input readonly type="text" name="checkout-address" id="checkout-address" class="checkout-form__input" value="<? echo $user['address'] ?>">
            <span class="form-message"><? echo formError('address') ?></span>
          </div>
          <div class="form-group">
            <label for="checkout-phone">Phone ...</label>
            <input readonly type="text" name="checkout-phone" id="checkout-phone" class="checkout-form__input" value="<? echo $user['phone'] ?>">
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
                <td><? echo $cart_item['name'] ?></td>
                <td>x <? echo $cart_item['quantity'] ?></td>
                <td style="text-align: end;">$<? echo $cart_item['subtotal'] ?></td>
              </tr>

            <? } ?>

          </table>

          <div class="checkout-total_amount float-end">
            <p>Total Amount: $<? echo $orders['total_amount'] ?></p>
            <button type="submit" name="checkout-btn" class="checkout-btn float-end">Check Out</button>
          </div>

          <br>

        </div>
      </div>
      <!-- </form> -->
    </div>
  </form>
</section>


<? $template->getFooter(); ?>