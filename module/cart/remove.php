<? header('Refresh: 1; URL= ' . $_SERVER['HTTP_REFERER'] . ''); ?>

<? $template->getHeader();?>

<?

$id = $_GET['id'];
$database->remove('user_cart', 'id="'.$id.'"');
$cart->get_order($_SESSION['username']);
echo '<div class="alert alert-primary text-center">Remove item Successfully<br>Redirecting...</div>';

?>

<? $template->getFooter();?>