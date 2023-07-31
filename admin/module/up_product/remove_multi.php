<?
if (isset($_POST['cat_id'])) header('Refresh: 0.7; URL=?mod=category&act=detail&id='. $_POST['cat_id'] . '');
else header('Refresh: 0.7; URL=?mod=up_product&act=list');


?>
<? getHeader(); ?>

<?

$products_list = $admin->get_list("SELECT * FROM products");

if (isset($_POST['remove__multi--btn'])) {
  if (isset($_POST['selected'])) {
    $selected = $_POST['selected'];
    $cnt = 0;

    foreach ($selected as $key => $value) {
      $admin->remove('products', 'product_id = "' . $value . '"');
      $cnt++;
    }
    echo '<div class="alert alert-success">Đã xoá ' . $cnt . ' sản phẩm</div>';
  } else echo '<div class="alert alert-danger">Chưa chọn sản phẩm nào</div>';
}

?>


<? getFooter(); ?>