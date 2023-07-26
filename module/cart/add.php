<?
session_start();
require '../../libs/DBDriver.php';
require '../../libs/Cart.php';
require '../../libs/User.php';

$database = new DB_Driver();
$cart = new Cart($database);
$user = new User($database);

$is_added;
$user_id = $user->get_user_id($_SESSION['username']);

if ($cart->add_cart($_SESSION['username'], $_POST['product_id'], $_POST['quantity'])) {
  $cart->get_order($_SESSION['username']);
  $order_list = $cart->get_user_cart_full_info($user_id);
}
echo json_encode($order_list);