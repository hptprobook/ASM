<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../libs/DBDriver.php';
require '../../libs/Cart.php';
require '../../libs/User.php';

$database = new DB_Driver();
$cart = new Cart($database);
$user = new User($database);

$user_id = $user->get_user_id($_SESSION['username']);
$quantity = $_POST['quantity'];
$product_id = $_POST['product_id'];
$product_price = $database->get_row('SELECT * FROM products WHERE product_id = "' . $product_id . '"');
$user_cart = $cart->get_user_cart_full_info($user_id);
$data = array(
  'quantity' => $quantity,
  'subtotal' => $quantity * $product_price['price']
);

$database->update('user_cart', $data, 'product_id = "' . $product_id . '"');
$user_cart2 = $database->get_row('SELECT * FROM user_cart WHERE product_id = "' . $product_id . '"');
$total_amount = $cart->get_order($_SESSION['username']);

$data2 = array(
  'subtotal' => $user_cart2['subtotal'],
  'total_amount' => $total_amount
);

echo json_encode($data2);