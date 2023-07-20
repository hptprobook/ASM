<?
$template->getHeader();

if (isset($_GET['cat_id'])) {
  $products_list = $database->get_list('SELECT * FROM products WHERE cat_id = "' . $_GET['cat_id'] . '"');
} else {
  $products_list = $database->get_list('SELECT * FROM products');
}
$products_per_page = 12;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($current_page - 1) * $products_per_page;
$end = $start + $products_per_page - 1;

$total_product = count($products_list);
$total_page = ceil($total_product / $products_per_page);

if ($end > $total_product) {
  $end = $total_product - 1;
}

?>

<!-- Home -->
<section class="home">
  <div class="home__parallax-bg"></div>
  <div class="home__content">
    <p class="text-center">Amazing Tour</p>
    <h2 class="text-center">SHOP</h2>
  </div>
</section>

<!-- Container -->

<section class="shop-container grid wide">
  <div class="row">
    <div class="col l-9 m-12">
      <div class="shop-container__content">

        <div class="shop-container__heading">
          <p class="shop-container__heading--cnt">Showing 1–12 of 18 results</p>
          <select name="" id="" class="shop-container__heading--select">
            <option value="">Sort</option>
            <option value="average">Sort by average rating</option>
            <option value="name">Sort by name</option>
            <option value="asc">Sort by Price: low to high</option>
            <option value="desc">Sort by Price: high to low</option>
          </select>
        </div>

        <div class="shop-container__product grid">
          <div class="row">

        <? for ($i = $start; $i <= $end; $i++) { ?>

          <div class="col l-4">
            <div class="shop-container__product--list">
              <div class="shop-container__product--img">
                <a href="?mod=shop&act=detail&id=<? echo $products_list[$i]['product_id'] ?>"><img src="<? echo $products_list[$i]['image_url'] ?>" alt=""></a>
              </div>
              <div class="shop-container__product--info">
                <a class="text-decoration-none" href="?mod=shop&act=detail&id=<? echo $products_list[$i]['product_id'] ?>"><h2 class="shop-container__product--name"><? echo $products_list[$i]['name'] ?></h2></a>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="shop-container__product--price">$<? echo $products_list[$i]['price'] ?></p>
                  <div class="shop-container__product--rate">
                    <? for ($j = 1; $j <= 5; $j++) {

                      if ($j <= $products_list[$i]['rate']) {
                        echo '<i class="bi bi-star-fill"></i>';
                      } else {
                        echo '<i class="bi bi-star"></i>';
                      }

                    } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <? } ?>


          </div>
        </div>

        <div class="shop-container__product--pagination">
          <? for ($i = 1; $i <= $total_page; $i++) { ?>

            <a href="?mod=shop&act=main&page=<? echo $i ?>"><? echo $i; ?></a>

          <? } ?>
        </div>
      </div>

    </div>

    <div class="col l-3 m-12">
      <form class="shop-container__search d-flex">
        <input type="text" name="" id="" class="shop-container__search--input">
        <button type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>

      <div class="shop-container__filter">
        <h2 class="shop-container__filter--title">Filter by price</h2>

        <input type="range" name="" id="" class="shop-container__filter--input" min="20" max="1000" value="20">

        <div class="shop-container__filter--info">
          Price: $20 - $<span class="value">1000</span>
          <a href="" class="shop-container__filter--submit float-end">
            filter
          </a>
        </div>
      </div>

      <div class="shop-container__category">
        <h2 class="shop-container__category--title">Categories</h2>
        <a href="" class="shop-container__category--link d-block">Accessories</a>
        <a href="" class="shop-container__category--link d-block">Beach</a>
        <a href="" class="shop-container__category--link d-block">Camping</a>
        <a href="" class="shop-container__category--link d-block">Summer</a>
        <a href="" class="shop-container__category--link d-block">Vintage</a>
        <a href="" class="shop-container__category--link d-block">Winter</a>
      </div>

      <div class="shop-container__popular">
        <h2 class="shop-container__popular--title">Popular products</h2>

        <div class="shop-container__popular--item">
          <a href="">
            <div class="shop-container__popular--img">
              <img src="public/img/html-shop/pr6.jpg" alt="">
            </div>
          </a>
          <div class="shop-container__popular--info float-end">
            <h2>Compass</h2>
            <span>$240</span>
            <div>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
          </div>
        </div>

        <div class="shop-container__popular--item">
          <a href="">
            <div class="shop-container__popular--img">
              <img src="public/img/html-shop/pr4.jpg" alt="">
            </div>
          </a>
          <div class="shop-container__popular--info float-end">
            <h2>Backpack</h2>
            <span>$190</span>
            <div>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
          </div>
        </div>

        <div class="shop-container__popular--item">
          <a href="">
            <div class="shop-container__popular--img">
              <img src="public/img/html-shop/pr3.jpg" alt="">
            </div>
          </a>
          <div class="shop-container__popular--info float-end">
            <h2>Camera</h2>
            <span>$420</span>
            <div>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
          </div>
        </div>
      </div>

      <a href="">
        <div class="shop-container__off mt-5">
          <img src="public/img/html-shop/shop-sidebar-img-1.png" alt="">
        </div>
      </a>
    </div>
  </div>
</section>
<?
$template->getFooter();
?>