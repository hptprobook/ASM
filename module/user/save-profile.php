<?

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../libs/DBDriver.php';
require '../../libs/Validate.php';

$database = new DB_Driver();
$user = $database->get_row('SELECT * FROM users WHERE username = "' . $_SESSION['username'] . '"');
$email = $_POST['email'];
$name = $_POST['fullname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$error = array();

if (!empty($email) || !empty($name) || !empty($address) || !empty($phone)) {
  if (!is_email($email)) $error['email'] = 'Email address does not exist!';
  if (!is_fullname($name)) $error['fullname'] = 'Fullname does not exist!';
  if (!is_address($address)) $error['address'] = 'Address does not exist!';
  if (!is_phone($phone)) $error['phone'] = 'Phone does not exist!';
}

if (empty($error)) {
  $data = array(
    'email' => $email,
    'name' => $name,
    'address' => $address,
    'phone' => $phone
  );

  $database->update('users', $data, 'username="' . $user['username'] . '"');
}
echo json_encode($error);