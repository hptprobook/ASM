

<?

if (isset($_POST['cat-btn'])) {
  $name = $_POST['cat-name'];
  $error = array();

  if (empty($name)) $error['cat-name'] = 'Trường này không được để trống';

  $data = array(
    'name' => $name,
  );

  if (empty($error)) {
    $is_added = true;
    $admin->insert('category', $data);
    header("Refresh: 1; URL=?mod=category&act=add");
  } else $is_added = false;
}

?>
<? getHeader(); ?>

<section style="min-height: 400px;">

<?
  if (isset($is_added) && $is_added) {
    echo '<div class="alert alert-success">Thêm thành công</div>';
  }
?>
  <h2 class="ps-3 pt-5 pb-2 text-center">Thêm danh mục</h2>

  <form action="" method="post" class="w-25 m-auto">
    <div class="form-group">
      <label for="cat_name" class="form-label">Tên danh mục</label>
      <input type="text" name="cat-name" id="cat_name" class="form-control">
      <span class="form-message"><? if (isset($error) && !empty($error)) echo $error['cat-name']; ?></span>
    </div>

    <input type="submit" value="Xác nhận" name="cat-btn" class="btn btn-warning mt-4">
  </form>

</section>


<? getFooter(); ?>