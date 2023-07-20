

<?

if (isset($_POST['add_product-btn'])) {
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
  if ($image_url['error']) $error['image_url'] = $empty;


  if (!in_array($extension_file, $type_img)) $error['image'] = 'Không đúng định dạng hình ảnh';
  else {
    if ($image_url['size'] >= 1048576) $error['image'] = "Kích thước ảnh không vượt quá 20MB";
    else {
      $isUploads = move_uploaded_file($image_url['tmp_name'], "../$upload_file");
      if (!$isUploads) $error['image_url'] = 'Upload file thất bại';
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
    echo '<div class="alert alert-success text-center">Thêm thành công</div>';
    $admin->insert('products', $data);
    header("Refresh: 1; URL=?mod=up_product&act=add");
  }

}

?>

<? getHeader(); ?>


<section>

  <h2 class="text-center pt-5">Thêm sản phẩm</h2>
  <form action="" enctype="multipart/form-data" method="post" class="w-75 m-auto ps-3">
    <div class="form-group mt-2">
      <label for="name" class="form-label">Tên sản phẩm</label>
      <input type="text" name="name" class="form-control" id="name" value="<? (isset($product_name) ? setValue($product_name) : '') ?>">
      <span class="form-message"><? echo formError('name') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="rate" class="form-label">Đánh giá</label>
      <input type="number" name="rate" class="form-control" min="1" max="5" id="rate" onkeydown="return false;" value="<? (isset($product_rate) ? setValue($product_rate) : 5) ?>">
      <span class="form-message"><? echo formError('rate') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="price" class="form-label">Giá tiền</label>
      <input type="text" name="price" class="form-control" id="price" value="<? (isset($product_price) ? setValue($product_price) : '') ?>">
      <span class="form-message"><? echo formError('price') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="image" class="form-label">Ảnh sản phẩm</label>
      <input class="form-control" type="file" name="image_url" id="image">
      <span class="form-message text-danger"><? echo formError('image_url') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="product_code" class="form-label">Mã sản phẩm</label>
      <input type="text" name="product_code" class="form-control" id="product_code" value="<? (isset($product_code) ? setValue($product_code) : '') ?>">
      <span class="form-message"><? echo formError('product_code') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="short_desc" class="form-label">Mô tả ngắn</label>
      <input type="text" name="short_desc" class="form-control" id="short_desc" value="<? (isset($product_short_desc) ? setValue($product_short_desc) : '') ?>">
      <span class="form-message"><? echo formError('short_desc') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="detail" class="form-label">Chi tiết sản phẩm</label>
      <textarea name="detail" id="detail" class="ckeditor"><? (isset($product_detail) ? setValue($product_detail) : '') ?></textarea>
      <span class="form-message text-danger"><? echo formError('detail') ?></span>
    </div>

    <input type="submit" value="Thêm sản phẩm" name="add_product-btn" class="btn btn-warning my-4 btn-lg px-5">
  </form>
</section>


<? getFooter(); ?>