<?
session_start();
require '../../libs/DBDriver.php';
require '../../libs/Cart.php';
require '../../libs/User.php';

$database = new DB_Driver();
$cart = new Cart($database);
$user = new User($database);


$user_id = $user->get_user_id($_SESSION['username']);
$qty = $_GET['qty'];

$user_cart = $cart->get_user_cart_full_info($user_id);

foreach ($qty as $key => $value) {
  $user_cart[$key]['quantity'] = $value;
  $data = array(
    'quantity' => $value,
    'subtotal' => $value * $user_cart[$key]['price']
  );

  $database->update('user_cart', $data, 'id = "' . $user_cart[$key]['id'] . '"');
}
$user_cart = $cart->get_user_cart_full_info($user_id);
$total_amount = $cart->get_order($_SESSION['username']);
array_push($user_cart, $total_amount);

echo json_encode($user_cart);

