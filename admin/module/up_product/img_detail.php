<? getHeader(); ?>

<?
$product_list = $admin->get_row('SELECT * FROM products WHERE product_id = "' . $_GET['id'] . '"');
$product_more = $admin->get_list('SELECT * FROM pro_more WHERE product_code = "' . $product_list['product_code'] . '"');
?>

<section style="min-height:500px">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th style="width: 15%;">Ảnh</th>
        <th style="width: 40%;">Tiêu đề</th>
        <th style="width: 35%;">Alt</th>
        <th style="width: 10%;">Action</th>
      </tr>
    </thead>
    <tbody>
      <? foreach ($product_more as $img) { ?>
        <form action="?mod=up_product&act=img_save" method="post">
          <tr>
            <td class="td-img"><img style="width: 80px; height: 80px;" src="../<? echo $img['img_url'];?>" alt="<? echo $img['img_alt'];?>"></td>
            <td><input type="text" name="img_title" value="<? echo $img['img_title'];?>" class="form-control"></td>
            <td><input type="text" name="img_alt" value="<? echo $img['img_alt'];?>" class="form-control"></td>
            <td>
              <button type="submit" class="btn btn-success" title="Lưu"><i class="bi bi-save"></i></button>
            </td>
          </tr>
          <input type="hidden" name="id" value="<? echo $img['id'] ?>">
        </form>
        <? } ?>
    </tbody>
  </table>
</section>
<style>
  table tr th {
    text-align: center;
  }
  .td-img {
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>

<? getFooter(); ?>