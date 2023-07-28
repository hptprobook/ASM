<?

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../libs/DBDriver.php';
require '../../libs/Validate.php';

$database = new DB_Driver();

$user_id = $_POST['user_id'];
$old_password = $_POST['old-password'];
$new_password = $_POST['new-password'];
$renew_password = $_POST['renew-password'];
$user_info = $database->get_row('SELECT * FROM users WHERE user_id = "' . $user_id . '"');
$password_in_db = $user_info['password'];

$error = array();

if (empty($old_password) || empty($new_password) || empty($renew_password)) $error['data'] = 'Data is not be empty';
else {
  if (!password_verify($old_password, $password_in_db)) $error['old_password'] = 'Incorrect old Password!';
  else {
    if ($new_password !== $renew_password) $error['change'] = 'Repassword is incorrect!';
    else {
      if (!is_password($old_password) || !is_password($new_password) || !is_password($renew_password)) $error['password'] = 'Password must include letters, numbers, and special characters!';
    }
  }
}

if (empty($error)) {
  $data = array(
    'password' => password_hash($new_password, PASSWORD_BCRYPT)
  );

  $database->update('users', $data, 'user_id = "' . $user_id . '"');
}

echo json_encode($error);

