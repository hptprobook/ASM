<?
  header('Refresh: 1; URL= ' . $_SERVER['HTTP_REFERER'] . '');
?>

<? $template->getHeader();?>
<?


$username = $_POST['username'];
$user = $database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');
$user_id = $user['user_id'];
$qty = $_POST['qty'];

$user_cart = $database->get_list(
  'SELECT user_cart.*, products.price FROM user_cart INNER JOIN products ON user_cart.product_id=products.product_id WHERE user_id = "' . $user_id . '"'
);

foreach ($qty as $key => $value) {
  $user_cart[$key]['quantity'] = $value;
  $data = array(
    'quantity' => $value,
    'subtotal' => $value * $user_cart[$key]['price']
  );

  $database->update('user_cart', $data, 'id = "' . $user_cart[$key]['id'] . '"');
}
$cart->get_order($username);
echo '<div class="alert alert-primary text-center">Update Successfully.<br> Redirecting...</div>'
?>
<? $template->getFooter();?>

