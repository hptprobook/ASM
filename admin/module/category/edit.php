<?

$cat_list = $admin->get_row('SELECT * FROM category WHERE cat_id = "' . $_GET['cat_id'] . '"');

if (isset($_POST['cat-edit-btn'])) {
  $name = $_POST['cat-name'];
  $error = array();

  if (empty($name)) $error['cat-name'] = 'Trường này không được để trống';

  $data = array(
    'name' => $name,
  );

  if (empty($error)) {
    $is_edited = true;
    $admin->update('category', $data, 'cat_id = "' . $cat_list['cat_id'] . '"');
    header("Refresh: 1; URL=?mod=category&act=show");
  } else $is_added = false;
}
?>


<? getHeader(); ?>


<section style="min-height:500px;">

<?
  if (isset($is_edited) && $is_edited) {
    echo '<div class="alert alert-success">Sửa thành công</div>';
  }
?>

  <h2 class="ps-3 pt-5 pb-2 text-center">Sửa danh mục <? echo $cat_list['name'] ?>:</h2>

  <form action="" method="post" class="w-25 m-auto">
    <div class="form-group">
      <label for="cat_name" class="form-label">Tên danh mục</label>
      <input type="text" name="cat-name" id="cat_name" class="form-control" value="<? echo $cat_list['name'] ?>">
      <span class="form-message"><? if (isset($error) && !empty($error)) echo $error['cat-name']; ?></span>
    </div>

    <input type="submit" value="Xác nhận" name="cat-edit-btn" class="btn btn-warning mt-4">
  </form>

</section>


<? getFooter(); ?>