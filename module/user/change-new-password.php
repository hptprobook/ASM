<?

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../libs/DBDriver.php';
require '../../libs/Validate.php';
$database = new DB_Driver();

$new_password = $_POST['new-password'];
$renew_password = $_POST['renew-password'];
$error = array();

if (empty($new_password)) $error['empty'] = 'Data is not be empty!';
else {
  if (empty($renew_password)) $error['empty'] = 'Data is not be empty!';
  else {
    if (!is_password($new_password) || !is_password($renew_password)) $error['password'] = 'Password must include letters, numbers, and special characters!';
    else {
      if ($new_password !== $renew_password) $error['default'] = 'Password retype does not match';
    }
  }
}

if (empty($error)) {
  $data = array(
    'password' => password_hash($new_password, PASSWORD_BCRYPT)
  );

  $database->update('users', $data, 'email = "' . $_POST['lost-password__email'] . '"');

  echo true;
} else echo json_encode($error);
