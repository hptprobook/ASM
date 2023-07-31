<? getHeader() ?>

<?

$product_list = $admin->get_list('SELECT * FROM products WHERE cat_id = "' . $_GET['id'] . '"');
$cat = $admin->get_row('SELECT * FROM category WHERE cat_id = "' . $_GET['id'] . '"');

?>
<section style="min-height:500px">
  <h2 class="ps-3 pt-5 pb-2 text-center">Danh sách sản phẩm danh mục <b><? echo $cat['name'] ?></b></h2>

  <form action="?mod=up_product&act=remove_multi" method="post">
    <div class="container d-flex justify-content-center">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th><input type="checkbox" class="cat__checkall"></th>
            <th>Sản phẩm</th>
            <th>Mã SP</th>
            <th>Giá</th>
            <th>Đánh giá</th>
            <th>Ảnh</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>

        <? foreach ($product_list as $product) { ?>
          <tr>
            <td><input type="checkbox" class="cat__check" name="selected[]" value="<? echo $product['product_id'] ?>"></td>
            <td><? echo $product['name'] ?></td>
            <td><? echo $product['product_code'] ?></td>
            <td><? echo $product['price'] ?></td>
            <td><? echo $product['rate'] ?></td>
            <td><img style="width: 50px; height: 50px; object-fit: cover;" src="../<? echo $product['image_url'] ?>" alt=""></td>
            <td>
              <a href="?mod=up_product&act=update&id=<? echo $product['product_id'] ?>&cat_id=<? echo $_GET['id'] ?>" class="btn btn-primary" title="Sửa"><i class="bi bi-pencil-square"></i></a>
              <a href="?mod=up_product&act=delete&id=<? echo $product['product_id'] ?>&cat_id=<? echo $_GET['id'] ?>" class="btn btn-danger" title="Xoá"><i class="bi bi-trash3-fill"></i></a>
            </td>
          </tr>
        <? } ?>

        </tbody>
      </table>

    </div>
    <input type="hidden" name="cat_id" value="<? echo $_GET['id']; ?>">
    <button type="submit" name="remove__multi--btn" class="btn btn-danger mb-4 mx-3">Xoá nhiều</button>
  </form>
</section>

<? getFooter() ?>