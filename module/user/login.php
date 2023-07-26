<?
session_start();
require '../../libs/DBDriver.php';

$database = new DB_Driver();

$username = $_POST['username'];
$password = $_POST['password'];
$remember = $_POST['remember'];
$error = array();

if (empty($username)) $error['login-username'] = 'Username can not be empty!';
else {
  if (empty($password)) $error['login-password'] = 'Password can not be empty';
  else {
    $user_in_db = $database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');

    if (!$user_in_db) $error['user'] = 'Username already exists!';
    else {
      if (!password_verify($password, $user_in_db['password'])) $error['user'] = 'Incorrect Password!';
    }
  }
}

if (empty($error)) {

  $_SESSION['is_login'] = true;
  $_SESSION['username'] = $username;
  if ($remember) {
    setcookie('username', $username, time() + 64800, '/');
    setcookie('password', $password, time() + 64800, '/');
  } else {
    if (isset($_COOKIE['username'])) {
      setcookie('username', $username, time() - 3600, '/');
      setcookie('password', $password, time() - 3600, '/');
    }
  }
}

echo json_encode($error);
