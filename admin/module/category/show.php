<? getHeader(); ?>


<?

$cat_list = $admin->get_list('SELECT * FROM category');

?>

<section style="min-height:500px">
  <h2 class="ps-3 pt-5 pb-2 text-center">Danh mục sản phẩm</h2>

  <div class="container d-flex justify-content-center">
    <table class="table table-striped table-bordered">
      <tr>
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th>Thao tác</th>
      </tr>
      <? foreach ($cat_list as $cat_item) { ?>
      <tr>
        <td><? echo $cat_item['cat_id'] ?></td>
        <td><a href="?mod=category&act=detail&id=<? echo $cat_item['cat_id'] ?>"><? echo $cat_item['name'] ?></a></td>
        <td>
          <a class="btn btn-info" href="?mod=category&act=edit&cat_id=<? echo $cat_item['cat_id'] ?>" title="Sửa"><i class="bi bi-pencil-square"></i></a>
          <a class="btn btn-danger" href="?mod=category&act=delete&cat_id=<? echo $cat_item['cat_id'] ?>" title="Xoá"><i class="bi bi-trash3-fill"></i></a>
        </td>
      </tr>
      <? } ?>
    </table>
  </div>

  <a href="?mod=category&act=add" class="btn btn-primary mx-3">Thêm danh mục</a>
</section>


<? getFooter(); ?>