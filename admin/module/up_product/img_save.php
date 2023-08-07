<? header('Refresh: 0.7; URL=?mod=up_product&act=list'); ?>

<? getHeader() ?>

<?
if (isset($_POST['img_submit'])) {
  $img_title = $_POST['img_title'];
  $img_alt = $_POST['img_alt'];

  $data = array(
    'img_title' => $img_title,
    'img_alt' => $img_alt
  );

  $admin->update('pro_more', $data, 'id = "' . $_POST['id'] . '"');
  echo '<div class="alert alert-success">Thành công!</div>';
}
?>

<? getFooter() ?>