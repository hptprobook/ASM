<?
$template->getHeader();
?>

<?

$user_id = $user->is_login() ? $user->get_user_id($_SESSION['username']) : null;
$check_out_list = isset($user_id) ? $database->get_list('SELECT * FROM check_out WHERE user_id = "' . $user_id . '"') : null;

?>


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
  <table style="width: 100%;">
      <tr style="height: 36px;border-bottom:1px solid #dedcdc;">
        <th style="width: 15%;">Product</th>
        <th style="width: 20%;"></th>
        <th style="width: 10%;"></th>
        <th style="width: 15%;">Date</th>
        <th style="width: 15%;">SubTotal</th>
        <th style="width: 15%;">Status</th>
        <th style="width: 10%;">Cancel</th>
      </tr>

      <tr>
        <td>hihi</td>
        <td>hihi</td>
        <td>hihi</td>
        <td>hihi</td>
        <td>hihi</td>
        <td>hihi</td>
      </tr>


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


    </table>

</section>


<? $template->getFooter(); ?>