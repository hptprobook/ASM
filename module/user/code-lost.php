<?

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../libs/DBDriver.php';
require '../../libs/Validate.php';
$database = new DB_Driver();

$code = $_POST['code'];
$user_code = $_POST['user_code'];
$error = array();

if (empty($code)) $error['code'] = 'Code not be empty!';
else {
  if ($code !== $user_code) $error['right'] = 'Code invalid!';
}

if (empty($error)) {
  echo true;
} else echo json_encode($error);