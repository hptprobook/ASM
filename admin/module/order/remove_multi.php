<? header('Refresh: 0.5; URL=?mod=order&act=main'); ?>

<? getHeader(); ?>

<?

if (isset($_POST['order__remove--multi'])) {
  if (isset($_POST['selected'])) {
    $selected = $_POST['selected'];
    $cnt = 0;

    foreach ($selected as $key => $value) {
      $admin->remove('user_cart_comp', 'id = "' . $value . '"');
      $cnt++;
    }
    echo '<div class="alert alert-success">Đã xoá ' . $cnt . ' đơn hàng</div>';
  } else echo '<div class="alert alert-danger">Chưa chọn sản phẩm nào</div>';
}

?>

<? getFooter(); ?>