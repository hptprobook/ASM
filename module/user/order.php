<?
$template->getHeader();
?>

<?

$user_id = $user->is_login() ? $user->get_user_id($_SESSION['username']) : null;
$check_out_user = isset($user_id) ? $database->get_row('SELECT * FROM user_cart_comp WHERE user_id = "' . $user_id . '"') : null;
$user_cart_complete = isset($user_id) ? $database->get_list('SELECT user_cart_comp.*, products.image_url, products.name FROM user_cart_comp INNER JOIN products ON user_cart_comp.product_id=products.product_id WHERE user_id = "' . $user_id . '"') : null;

?>

<style>
  .send-to p {
    font-size: 14px;
    font-weight: 500;
    color: #555555;
  }
  .send-to h6 {
    font-size: 15px;
  }
  table tr td {
    font-size: 14px;
    font-weight: 500;
    color: #555555;
  }
  table tr td a:hover {
    color:#3fd0d4 !important;
  }
</style>

<section class="home">
  <div class="home__parallax-bg"></div>
  <div class="home__content">
    <h2 class="text-center">ORDER TRACKING</h2>
  </div>
</section>

<section class="shop-container grid wide">
  <?
  if (isset($_GET['is_checked_out']) && $_GET['is_checked_out']) {
    echo '<div class="alert alert-primary">Order Success</div>';
  }
  ?>


  <h2>Order Tracking</h2>

  <? if (!empty($check_out_user)) { ?>
  <div class="send-to">
    <h6>Name: <? echo $check_out_user['ship_name']; ?></h6>
    <p class="mb-0">Send to: <? echo $check_out_user['ship_address']; ?></p>
    <p>Phone: <? echo $check_out_user['ship_phone']; ?></p>
  </div>
  <table style="width: 100%;">
    <tr style="height: 36px;border-bottom:1px solid #dedcdc;">
      <th style="width: 15%;" class="text-center">Product</th>
      <th style="width: 20%;"></th>
      <th style="width: 10%;"></th>
      <th style="width: 15%;" class="text-center">Date</th>
      <th style="width: 15%;" class="text-center">SubTotal</th>
      <th style="width: 15%;" class="text-center">Status</th>
      <th style="width: 10%;" class="text-center">Action</th>
    </tr>

    <?

    foreach ($user_cart_complete as $item) { ?>

    <tr style="height: 136px;border-bottom:1px solid #dedcdc;">
      <td class="text-center"><? echo $item['name'] ?></td>
      <td><img src="<? echo $item['image_url'] ?>" alt="" style="width: 90px;height:90px;object-fit:cover;margin-right:12px;"></td>
      <td>x <? echo $item['quantity'] ?></td>
      <td class="text-center"><? echo $item['ship_date'] ?></td>
      <td class="text-center">$<? echo $item['subtotal'] ?> </td>
      <td class="text-center">
        <?if ($item['status'] == -1) {
          echo '<div class="text-50-black">Unconfimred</div>';
        }elseif ($item['status'] == 0) {
          echo '<div class="text-warning">Confirmed</div>';
        } elseif ($item['status'] == 1) {
          echo '<div class="text-info">Delivery</div>';
        } elseif ($item['status'] == 2) {
          echo '<div class="text-success">Received</div>';
        } elseif ($item['status'] == 3) {
          echo '<div class="text-danger">Cancelled</div>';
        } elseif ($item['status'] == 4) {
          echo '<div class="text-secondary">Cancelled by admin</div>';
        } else echo ''; ?>
      </td>
      <td class="text-center">

        <? if ($item['status'] == 4 || $item['status'] == 3) { ?>
          <a style="color: #222" href="?mod=user&act=reason&id=<? echo $item['id'] ?> ">Reason?</a>
        <? } else { ?>
            <a style="color: #222" href="?mod=user&act=cancel_order&id=<? echo $item['id'] ?>">Cancel</a>
        <? } ?>
      </td>
    </tr>

    <? } ?>

  </table>
  <? } else { ?>
    <div class="alert alert-error">Order Empty!</div>
  <? } ?>
</section>

<style>
  .cart-quantity-input {
    width: 90px;
    height: 62px;
    border-radius: 0;
    outline: none;
    border: 0.5px solid #838383;
    position: relative;
    padding-left: 20px;
  }
  .delete-cart-btn {
    font-weight: 600;
  }
  .delete-cart-btn:hover {
    color:#3fd0d4 !important;
  }
</style>

<? $template->getFooter(); ?>