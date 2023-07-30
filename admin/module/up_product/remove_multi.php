<? header('Refresh: 0.7; URL=?mod=up_product&act=list') ?>
<? getHeader(); ?>

<?

$products_list = $admin->get_list("SELECT * FROM products");

if (isset($_POST['remove__multi--btn'])) {
  $selected = $_POST['selected'];
  $cnt = 0;

  foreach ($selected as $key => $value) {
    $admin->remove('products', 'product_id = "' . $value . '"');
    $cnt++;
  }
  echo '<div class="alert alert-success">Đã xoá ' . $cnt . ' sản phẩm</div>';
}

?>


<? getFooter(); ?>