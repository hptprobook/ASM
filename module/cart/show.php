<? $template->getHeader(); ?>

<?

$username = $_SESSION['username'];
$users = $database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');
$user_carts = $database->get_list('SELECT * FROM user_cart WHERE user_id = "' . $users['user_id'] . '"');
$orders = $database->get_row('SELECT * FROM orders WHERE user_id = "' . $users['user_id'] . '"');

?>

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
    color: #3fd0d4 !important;
  }
</style>

<section class="home">
  <div class="home__parallax-bg"></div>
  <div class="home__content">
    <h2 class="text-center">CART</h2>
  </div>
</section>

<section class="container cart-table mt-5">
  <form action="?mod=cart&act=update" method="post">
    <input type="hidden" name="username" value="<? echo $_SESSION['username']; ?>">

    <? if (!empty($user_carts)) { ?>

      <table style="width: 100%;">
        <tr style="height: 36px;border-bottom:1px solid #dedcdc;">
          <th style="width: 10%;"></th>
          <th style="width: 25%;">Product</th>
          <th style="width: 15%;"></th>
          <th style="width: 15%;">Price</th>
          <th style="width: 15%;">Quantity</th>
          <th style="width: 20%;">SubTotal</th>
        </tr>



        <? foreach ($user_carts as $cart_item) { ?>
          <?

          $product = $database->get_row('SELECT * FROM products WHERE product_id = "' . $cart_item['product_id'] . '"');

          ?>

          <tr style="height: 136px;border-bottom:1px solid #dedcdc;">
            <td><a title="Remove Item" href="?mod=cart&act=remove&id=<? echo $cart_item['id'] ?>" class="p-3 text-black text-decoration-none delete-cart-btn">X</a></td>
            <td><? echo $product['name'] ?></td>
            <td><img src="<? echo $product['image_url'] ?>" alt="" style="width: 90px;height:90px;object-fit:cover;margin-right:12px;"></td>
            <td>$<? echo $product['price'] ?> </td>
            <td>
              <input class="cart-quantity-input" type="number" min="1" value="<? echo $cart_item['quantity'] ?>" name="qty[]">
            </td>
            <td>$<? echo $cart_item['subtotal'] ?> </td>
          </tr>

        <? } ?>

      </table>
      <div class="cart-total">
        <h4 class="my-3">Cart Total: $<? echo (int)$orders['total_amount'] ?> </h4>
      </div>
    <? } else { ?>
      <div class="w-100 d-flex justify-content-center align-items-center" style="height: 400px">
        <h3 style="font-weight: 600;">No product in the cart</h3>
      </div>

    <? } ?>



    <div class="cart-checkout mt-5 mb-5">
      <a
        <? if (!empty($user_carts)) { ?>
        href="?mod=cart&act=remove_all"
        <? } ?>
      >REMOVE ALL</a>
      <button
        type="submit"
        <? if (empty($user_carts)) {
        echo 'disabled';
        } ?>
        class="update-cart-btn"
        name="update-cart-btn"
      >UPDATE CART</button>
      <a href="?mod=shop">VIEW SHOP</a>
      <a
        <? if (!empty($user_carts)) { ?>
          href="?mod=cart&act=checkout"
        <? } ?>
        class="float-end checkout-btn"
      >CHECK OUT</a>
    </div>
  </form>
  <style>
    .cart-checkout a,
    .update-cart-btn {
      padding: 12px 32px;
      background-color: #3fd0d4;
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      margin-right: 8px;
      border: none;
      outline: none;
    }
    .cart-checkout a {
      padding: 12.5px 32px;
    }
    .checkout-btn {
      transform: translateY(-23px);
      padding-top: 2px;
    }
    .cart-checkout a:hover,
    .update-cart-btn:hover {
      background-color: #068b8f;
    }
  </style>
</section>




<? $template->getFooter(); ?>