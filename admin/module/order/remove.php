

<?


if ($admin->remove('user_cart_comp', 'id="'.$_GET['id'].'"')) {
  $is_remove = true;
  header("Refresh: 2; URL=?mod=order&act=main");
}

?>

<? getHeader(); ?>

<section style="min-height:500px;">

<? if (isset($is_remove) && $is_remove) {
  echo '<div class="alert alert-success">Xoá đơn hàng thành công</div>';
} ?>

</section>


<? getFooter(); ?>