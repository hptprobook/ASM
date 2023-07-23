<?
$template->getHeader();

$id = $_GET['id'];

$product_info = $database->get_row('SELECT * FROM products WHERE product_id = "' . $id . '"');

if (isset($_POST['add-to-cart'])) {
  $isLogin = $_POST['is-login'];
}

?>

<style>
  .login--notify {
    text-decoration: underline;
  }
  .login--notify:hover {
    color: #888;
    cursor: pointer;
  }
</style>

<!-- Home -->
<section class="home">
  <div class="home__parallax-bg"></div>
  <div class="home__content">
    <p class="text-center">Amazing Tour</p>
    <h2 class="text-center">SHOP</h2>
  </div>
</section>

<section class="shop-container grid wide">

  <?
  if (isset($isLogin) && $isLogin == 1) {
    echo '<div class="alert alert-primary">Please <span class="login--notify">log in here</span> before using the shopping cart!</div>';
  }
  ?>
  <div class="row">
    <div class="col l-5">
      <div class="shop-container__img">
        <img src="<? echo $product_info['image_url'] ?>" alt="">
      </div>
    </div>

    <div class="col l-7">
      <div class="shop-container__info ps-5">
        <h2 class="shop-container__info--name mt-5"><? echo $product_info['name'] ?></h2>
        <h3 class="shop-container__info--price pt-2">$<? echo $product_info['price'] ?></h3>
        <div class="shop-container__info--rate d-flex">

          <? for ($i = 1; $i <= 5; $i++) {

            if ($i <= $product_info['rate']) {
              echo '<i class="bi bi-star-fill pe-1"></i>';
            } else {
              echo '<i class="bi bi-star pe-1"></i>';
            }
          } ?>

          <p>( 240 customers preview)</p>
        </div>
        <p class="shop_container__info--short-desc pt-4"><? echo $product_info['short_desc'] ?></p>
        <form
          action="
            <?
            if ($user->is_login()) echo '?mod=cart&act=add';
            else '';
            ?>
          "
          method="post" class="shop-container__form"
        >
          <? if (!$user->is_login()) { ?>
          <input type="hidden" name="is-login" value="1">
          <? } ?>
          <input type="number" name="quantity" value="1" min="1" class="shop-container__quantity">
          <input type="hidden" name="product_id" value="<? echo $id ?>">
          <button type="submit" name="add-to-cart">ADD TO CART</button>
        </form>
      </div>
    </div>
  </div>

  <div class="shop-container__desc mt-5 pb-4">
    <h2 class="mb-3">Details of Product</h2>
    <? echo $product_info['detail'] ?>
  </div>
</section>

<? $template->getFooter(); ?>