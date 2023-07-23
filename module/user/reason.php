<?
$template->getHeader();
?>

<?
$check_out_user = $database->get_row('SELECT * FROM user_cart_comp WHERE id = "' . $_GET['id'] . '"');

if ($check_out_user['status'] == 3) {
  if (empty($check_out_user['note'])) echo '<div class="alert alert-primary text-center">Your Reason: Empty!</div>';
  else echo '<div class="alert alert-primary text-center">Your Reason: '. $check_out_user['note'] .'</div>';
} elseif ($check_out_user['status'] == 4) {
  if (empty($check_out_user['note'])) echo '<div class="alert alert-primary text-center">Your Reason: Empty!</div>';
  else echo '<div class="alert alert-primary text-center">Our Reason: '. $check_out_user['note'] .'</div>';
} else {
  echo '<div class="alert alert-primary text-center">No Reason</div>';
}
?>

<div class="d-flex justify-content-center">
  <a href="javascript: history.go(-1);" class="btn btn-primary my-5">GO BACK!</a>
</div>

<? $template->getFooter(); ?>