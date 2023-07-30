<?



?>

<?
getHeader();

if (isset($_POST['changepass-btn'])) {
  $oldPassword = $_POST['old-password'];
  $newPassword = $_POST['new-password'];
  $renewPassword = $_POST['renew-password'];
  $adminUser = $admin->get_row('SELECT * FROM admin WHERE username = "' . $_SESSION['admin_username'] . '"');

  if (empty($oldPassword)) $error['old'] = 'Trường này không được để trống';
  else {
    if ($oldPassword !== $adminUser['password']) $error['old'] = 'Mật khẩu cũ không chính xác!';
  }

  if (empty($newPassword)) $error['new'] = 'Trường này không được để trống';
  else {
    if (!is_password($newPassword)) $error['new'] = 'Mật khẩu phải lớn hơn 6 ký tự, chứa chữ cái và số';
  }

  if (empty($renewPassword)) $error['renew'] = 'Trường này không được để trống';
  else {
    if (!is_password($renewPassword)) $error['renew'] = 'Mật khẩu phải lớn hơn 6 ký tự, chứa chữ cái và số';
    else {
      if ($newPassword !== $renewPassword) $error['renew'] = 'Nhập lại mật khẩu không chính xác!';
    }
  }

  if (empty($error)) {
    $admin->update('admin', array('password' => $newPassword), 'username = "' . $_SESSION['admin_username'] . '"');
    echo '<div class="alert alert-success">Đổi mật khẩu thành công</div>';
  }
}
?>

<form action="" method="post" class="w-25 m-auto">
  <h2>Đổi mật khẩu</h2>
  <div class="form-group">
    <label for="old-password" class="form-label">Nhập mật khẩu cũ</label>
    <input type="password" name="old-password" class="form-control">
    <span class="form-message"><? if (isset($error['old'])) echo $error['old'] ?></span>
  </div>

  <div class="form-group">
    <label for="new-password" class="form-label">Nhập mật khẩu mới</label>
    <input type="password" name="new-password" class="form-control">
    <span class="form-message"><? if (isset($error['new'])) echo $error['new'] ?></span>
  </div>

  <div class="form-group">
    <label for="renew-password" class="form-label">Nhập lại mật khẩu mới</label>
    <input type="password" name="renew-password" class="form-control">
    <span class="form-message"><? if (isset($error['renew'])) echo $error['renew'] ?></span>
  </div>

  <button type="submit" class="btn btn-warning my-4" name="changepass-btn">Đổi mật khẩu</button>
</form>

<? getFooter(); ?>