

<?
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../libs/DBDriver.php';
require '../../libs/User.php';
require '../../libs/Cart.php';

$database = new DB_Driver();
$user = new User($database);
$cart = new Cart($database);

$check_out_user = $database->get_row('SELECT * FROM user_cart_comp WHERE id = "' . $_GET['id'] . '"');

$reason = array(

);

if ($check_out_user['status'] == 3) {
  if (empty($check_out_user['note'])) $reason['Your'] = 'Empty';
  else $reason['Your'] = $check_out_user['note'];

  // echo '<div class="alert alert-primary text-center">Your Reason: '. $check_out_user['note'] .'</div>';
} elseif ($check_out_user['status'] == 4) {
  if (empty($check_out_user['note'])) $reason['Your'] = 'Empty';
  else $reason['Our'] = $check_out_user['note'];
} else {
  $reason['Empty'] = 'No Reason';
}

echo json_encode($reason);
?>