
<?

$username = $_SESSION['username'];

$user = $database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');

$database->remove('user_cart', 'user_id="' . $user['user_id'] . '"');

$cart->get_order($username);

?>