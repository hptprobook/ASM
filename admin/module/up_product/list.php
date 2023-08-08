<? getHeader(); ?>

<?
$products_list = $admin->get_list("SELECT * FROM products");

if (isset($_POST['search_product-btn'])) {
  $search_value = $_POST['search_product-input'];

  $products_list = $admin->get_list('SELECT * FROM products WHERE `name` LIKE "%' . $search_value . '%"');
}

?>

<section style="min-height:500px">

  <h2 class="ps-3 pt-5 pb-2 text-center">Danh sách sản phẩm</h2>

  <form action="" class="w-25 my-5 mx-3" method="post">
    <input type="text" name="search_product-input" class="form-control" placeholder="Tên sản phẩm">
    <button class="btn btn-info mt-2" type="submit" name="search_product-btn">Tìm kiếm</button>
  </form>

  <form action="?mod=up_product&act=remove_multi" method="post" class="container">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th><input type="checkbox" class="list-product-checkall"></th>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th>Đánh giá</th>
          <th>Giá tiền</th>
          <th>Image</th>
          <th>Mã sản phẩm</th>
          <th>Danh mục</th>
          <th class="text-center">Thao tác</th>
        </tr>
      </thead>
      <tbody>

      <? foreach ($products_list as $product) { ?>
        <tr>
          <th><input type="checkbox" class="list-product-checkbox" name="selected[]" value="<? echo $product['product_id'] ?>"></th>
          <td><? echo $product['product_id'] ?></td>
          <td><? echo $product['name'] ?></td>
          <td><? echo $product['rate'] ?></td>
          <td><? echo $product['price'] ?></td>
          <td><a href="?mod=up_product&act=img_detail&id=<? echo $product['product_id'] ?>"><img src="../<? echo $product['image_url'] ?>" style="width: 50px; height: 50px; object-fit: cover;" alt=""></a></td>
          <td><? echo $product['product_code'] ?></td>
          <td>
            <a href=""><? echo $product['cat_id'] ?></a>
          </td>
          <td class="text-center">
            <a class="btn btn-info" href="?mod=up_product&act=update&id=<? echo $product['product_id'] ?>" title="Sửa"><i class="bi bi-pencil-square"></i></a>
            <a class="btn btn-danger" href="?mod=up_product&act=delete&id=<? echo $product['product_id'] ?>" title="Xoá"><i class="bi bi-trash3-fill"></i></a>
          </td>
        </tr>
      <? } ?>

      </tbody>
    </table>

    <button type="submit" name="remove__multi--btn" class="btn btn-warning my-2">Xoá nhiều</button>
    <a href="?mod=up_product&act=remove_all" class="btn btn-danger my-2">Xoá tất cả</a>
  </form>

</section>


<? getFooter(); ?>