

<?

$data = array(
  'status' => 1
);

if ($admin->update('user_cart_comp', $data, 'id="'.$_GET['id'].'"')) {
  $is_ship_confirm = true;
  header("Refresh: 2; URL=?mod=order&act=main");
}

?>

<? getHeader(); ?>

<section style="min-height:500px;">

<? if (isset($is_ship_confirm) && $is_ship_confirm) {
  echo '<div class="alert alert-success">Xác nhận đang giao hàng thành công</div>';
} ?>

</section>


<? getFooter(); ?>