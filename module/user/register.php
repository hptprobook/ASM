<?

session_start();
require '../../libs/DBDriver.php';
require '../../libs/Validate.php';

$database = new DB_Driver();
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repass = $_POST['repass'];
$error = array();

// Validate Username
if (empty($username)) $error['username'] = 'Username can not be empty!';
else {
  if (!is_username($username)) $error['username'] = 'Username can only contain letters, numbers, 3-20 characters, and no special characters';
  else {
    $username_in_db = $database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');
    if (!empty($username_in_db)) $error['username'] = 'Username already exists. Please try a different username!';
  }
}

// Validate Email
if (empty($email)) $error['email'] = 'Email can not be empty!';
else {
  if (!is_email($email)) $error['email'] = 'Email address does not exist!';
  else {
    $email_in_db = $database->get_row('SELECT * FROM users WHERE email = "' . $email . '"');
    if (!empty($email_in_db)) $error['email'] = 'Email already exists. Please try a different Email!';
  }
}

// Validate Pasword
if (empty($password)) $error['password'] = 'Password can not be empty!';
else if (!is_password($password)) $error['password'] = 'Password must include letters, numbers, and special characters!';
if ($password !== $repass) $error['repass'] = 'Password confirmation does not match';

if (empty($error)) {
  $database->insert(
    'users',
    array(
      'username' => $username,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_BCRYPT)
    )
  );
}

echo json_encode($error);
