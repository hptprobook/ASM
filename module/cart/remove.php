

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

$user_id = $user->get_user_id($_SESSION['username']);

$id = $_GET['id'];
$database->remove('user_cart', 'id="'.$id.'"');
$cart->get_order($_SESSION['username']);

$user_cart = $cart->get_user_cart_full_info($user_id);
$total_amount = $cart->get_order($_SESSION['username']);
array_push($user_cart, $total_amount);

echo json_encode($user_cart);

?>