<?
  header('Refresh: 1; URL= ' . $_SERVER['HTTP_REFERER'] . '');
?>

<? $template->getHeader(); ?>

<?

$id = $_GET['id'];
$data = array(
  'status' => 3
);
$cart_item = $database->update('user_cart_comp', $data, 'id = "' . $id . '"');
echo '<div class="alert alert-primary text-center">Cancel Success <br>Redirecting...</div>';


?>

<? $template->getFooter(); ?>