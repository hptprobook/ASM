<? header('Refresh: 1; URL= ' . $_SERVER['HTTP_REFERER'] . ''); ?>

<? $template->getHeader();?>
<?

$username = $_SESSION['username'];

$user = $database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');

$database->remove('user_cart', 'user_id="' . $user['user_id'] . '"');

$cart->get_order($username);

echo '<div class="alert alert-primary text-center">Remove all item Sucessfullybr>Redirecting ...</div>';
?>
<? $template->getFooter();?>