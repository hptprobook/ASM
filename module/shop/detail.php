<?
$template->getHeader();

$id = $_GET['id'];

$product_info = $database->get_row('SELECT * FROM products WHERE product_id = "' . $id . '"');
$product_img_info = $database->get_list('SELECT * FROM pro_more WHERE product_code = "' . $product_info['product_code'] . '"');

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
  <div class="row">
    <div class="col l-5">
      <div class="swiper detail-product">
        <div class="swiper-wrapper">
          <? foreach ($product_img_info as $img_url) { ?>
            <div class="shop-container__img swiper-slide">
              <img title="<? echo $img_url['img_title'] ?>" alt="<? echo $img_url['img_alt'] ?>" src="<? echo $img_url['img_url'] ?>" alt="">
            </div>
          <? } ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
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
        <form class="shop-container__form">
          <? if (!$user->is_login()) { ?>
            <input type="hidden" name="is-login" value="1" class="shop-container__status--account">
          <? } ?>
          <input type="number" name="quantity" value="1" min="1" class="shop-container__quantity">
          <input type="hidden" name="product_id" value="<? echo $id ?>" class="shop-container__id">
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