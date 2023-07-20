
<?
$id = $_GET['id'];

$product_info = $admin->get_row('SELECT * FROM products WHERE product_id = "' . $id . '"');

if (isset($_POST['edit_product-btn'])) {
  $product_name = $_POST['name'];
  $product_rate = (string)$_POST['rate'];
  $product_price = (string)$_POST['price'];
  $product_code = $_POST['product_code'];
  $product_short_desc = $_POST['short_desc'];
  $product_detail = $_POST['detail'];
  $image_url = $_FILES['image_url'];
  $error = array();
  $empty = 'Trường này không được để trống';
  $upload_dir = "uploads/";
  $upload_file = $upload_dir . basename($image_url['name']);
  $type_img = array('jpg', 'png', 'gif', 'jpeg');
  $extension_file = pathinfo(basename($image_url['name']), PATHINFO_EXTENSION);

  if (empty($product_name)) $error['name'] = $empty;
  if (empty($product_rate)) $error['rate'] = $empty;
  if (empty($product_price)) $error['price'] = $empty;
  if (empty($product_code)) $error['product_code'] = $empty;
  if (empty($product_short_desc)) $error['short_desc'] = $empty;
  if (empty($product_detail)) $error['detail'] = $empty;

  if ($image_url['error'] > 0) {
    $upload_file = $_POST['existing_image'];
  } else {
    if (!in_array($extension_file, $type_img)) $error['image'] = 'Không đúng định dạng hình ảnh';
    else {
      if ($image_url['size'] >= 1048576) $error['image'] = "Kích thước ảnh không vượt quá 20MB";
      else {
        $isUploads = move_uploaded_file($image_url['tmp_name'], "../$upload_file");
        if (!$isUploads) $error['image_url'] = 'Upload file thất bại';
      }
    }
  }

  $data = array(
    'name' => $product_name,
    'rate' => $product_rate,
    'price' => $product_price,
    'image_url' => $upload_file,
    'product_code' => $product_code,
    'short_desc' => $product_short_desc,
    'detail' => $product_detail
  );

  if (empty($error)) {
    echo '<div class="alert alert-success text-center">Cập nhật thành công</div>';
    $admin->update('products', $data, 'product_id="' . $id . '"');
    header("Refresh: 1; URL=?mod=up_product&act=list");
  } else {
    echo '<div class="alert alert-danger text-center">Thất bại</div>';
  }
}
?>

<? getHeader(); ?>

<section>

  <h2 class="text-center pt-5">Chỉnh sửa sản phẩm ID: <? echo $id ?></h2>
  <form action="" enctype="multipart/form-data" method="post" class="w-75 m-auto ps-3">
    <div class="form-group mt-2">
      <label for="name" class="form-label">Tên sản phẩm</label>
      <input type="text" name="name" class="form-control" id="name" value="<? echo $product_info['name'] ?>">
      <span class="form-message"><? echo formError('name') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="rate" class="form-label">Đánh giá</label>
      <input type="number" name="rate" class="form-control" min="1" max="5" id="rate" onkeydown="return false;" value="<? echo $product_info['rate'] ?>">
      <span class="form-message"><? echo formError('rate') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="price" class="form-label">Giá tiền</label>
      <input type="text" name="price" class="form-control" id="price" value="<? echo $product_info['price'] ?>">
      <span class="form-message"><? echo formError('price') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="image" class="form-label">Ảnh sản phẩm</label>
      <input class="form-control" type="file" name="image_url" id="image" value="../<? echo $product_info['image_url'] ?>">
      <span class="form-message text-danger"></span>
    </div>

    <div class="mt-2">
      <?php if (!empty($product_info['image_url'])) : ?>
        <img src="../<?php echo $product_info['image_url']; ?>" alt="Ảnh sản phẩm" style="max-width: 100px;">
        <input type="hidden" name="existing_image" value="<?php echo $product_info['image_url']; ?>">
      <?php endif; ?>
    </div>

    <div class="form-group mt-2">
      <label for="product_code" class="form-label">Mã sản phẩm</label>
      <input type="text" name="product_code" class="form-control" id="product_code" value="<? echo $product_info['product_code'] ?>">
      <span class="form-message"><? echo formError('product_code') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="short_desc" class="form-label">Mô tả ngắn</label>
      <input type="text" name="short_desc" class="form-control" id="short_desc" value="<? echo $product_info['short_desc'] ?>">
      <span class="form-message"><? echo formError('short_desc') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="detail" class="form-label">Chi tiết sản phẩm</label>
      <textarea name="detail" id="detail" class="ckeditor"><? echo $product_info['detail'] ?></textarea>
      <span class="form-message text-danger"><? echo formError('detail') ?></span>
    </div>

    <input type="submit" value="Cập nhật" name="edit_product-btn" class="btn btn-warning my-4 btn-lg px-5">
  </form>
</section>

<? getFooter() ?>