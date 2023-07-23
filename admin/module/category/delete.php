

<?

  if ($admin->remove('category', 'cat_id = "' . $_GET['cat_id'] . '"')) {
    $is_deleted = true;
    header("Refresh: 1; URL=?mod=category&act=show");
  }

?>
<? getHeader(); ?>

<section style="min-height: 500px;">
<?
  if (isset($is_deleted) && $is_deleted) {
    echo '<div class="alert alert-success">Xoá thành công</div>';
  }
?>
</section>

<? getFooter(); ?>