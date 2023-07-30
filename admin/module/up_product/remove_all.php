<? header('Refresh: 0.5; URL=?mod=up_product&act=list'); ?>

<? getHeader(); ?>
<?
$admin->remove('products', '1=1');

echo '<div class="alert alert-primary">Đã xoá tất cả sản phẩm</div>';
?>
<? getFooter(); ?>