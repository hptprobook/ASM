<? getHeader(); ?>

<?
$products_list = $admin->get_list("SELECT * FROM products");

?>

<section style="min-height:500px">

  <h2 class="ps-3 pt-5 pb-2 text-center">Danh sách sản phẩm</h2>

  <div class="container">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th>Đánh giá</th>
          <th>Giá tiền</th>
          <th>Image URL</th>
          <th>Mã sản phẩm</th>
          <th class="text-center">Thao tác</th>
        </tr>
      </thead>
      <tbody>

      <? foreach ($products_list as $product) { ?>
        <tr>
          <td><? echo $product['product_id'] ?></td>
          <td><? echo $product['name'] ?></td>
          <td><? echo $product['rate'] ?></td>
          <td><? echo $product['price'] ?></td>
          <td><? echo $product['image_url'] ?></td>
          <td><? echo $product['product_code'] ?></td>
          <td class="text-center">
            <a href="?mod=up_product&act=update&id=<? echo $product['product_id'] ?>" title="Sửa"><i class="bi bi-pencil-square"></i></a>
            <a href="?mod=up_product&act=delete&id=<? echo $product['product_id'] ?>" title="Xoá"><i class="bi bi-trash3-fill"></i></a>
          </td>
        </tr>
      <? } ?>

      </tbody>
    </table>
  </div>


</section>


<? getFooter(); ?>