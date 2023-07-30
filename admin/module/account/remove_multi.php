<?
header('Refresh: 0.7; URL=?mod=account&act=main');
?>
<? getHeader(); ?>

<?

if (isset($_POST['account__remove--multi'])) {
  $selected = $_POST['selected'];
  $cnt = 0;

  foreach ($selected as $key => $value) {
    $admin->remove('users', 'user_id = "' . $value . '"');
    $cnt++;
  }
  echo '<div class="alert alert-success">Đã xoá ' . $cnt . ' tài khoản</div>';
}

?>


<? getFooter(); ?>