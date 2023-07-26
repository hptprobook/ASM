<?

$data = array(
  'status' => 0
);

if ($admin->update('user_cart_comp', $data, 'id="'.$_GET['id'].'"')) {
  $is_confirm = true;
  header("Refresh: 0.5; URL=?mod=order&act=main");
}

?>

<? getHeader(); ?>

<section style="min-height:500px;">

<? if (isset($is_confirm) && $is_confirm) {
  echo '<div class="alert alert-success">Xác nhận thành công</div>';
} ?>

</section>


<? getFooter(); ?>