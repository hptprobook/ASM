<?
ob_start();
if (isset($_POST['login-btn'])) {
  $username = $_POST['login-username'];
  $password = $_POST['login-password'];
  $remember = isset($_POST['remember-me']) ? $_POST['remember-me'] : false;
  $error = array();

  if (empty($username)) $error['login-username'] = 'Username can not be empty!';
  else {
    if (empty($password)) $error['login-password'] = 'Password can not be empty';
    else {
      $user_in_db = $database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');

      if (!$user_in_db) $error['user'] = 'Username already exists!';
      else {
        if ($password !== $user_in_db['password']) $error['user'] = 'Incorrect Password!';
      }
    }
  }

  if (empty($error)) {

    $_SESSION['is_login'] = true;
    $_SESSION['username'] = $username;
    if ($remember) {
      setcookie('username', $username, time() + 64800);
      setcookie('password', $password, time() + 64800);
    } else {
      if (isset($_COOKIE['username'])) {
        setcookie('username', $username, time() - 3600);
        setcookie('password', $password, time() - 3600);
      }
    }
    echo '<div class="alert alert-primary text-center">Login Successfully.<br> Redirecting...</div>';
    header('Refresh: 1; URL= ' . $_SERVER['HTTP_REFERER'] . '');

  } else {
    foreach($error as $value) {
      echo '<div class="alert alert-error text-center">' . $value . '</div>';
      echo '
        <div class="d-flex justify-content-center my-5">
          <a href="javascript: history.back()" class="btn btn-primary">Go back</a>
        </div>
      ';
      break;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Winter Holiday</title>
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>

</body>
</html>