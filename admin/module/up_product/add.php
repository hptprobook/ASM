<?

$cat_list = $admin->get_list('SELECT * FROM category');

if (isset($_POST['add_product-btn'])) {
  $product_name = $_POST['name'];
  $product_rate = (string)$_POST['rate'];
  $product_price = (string)$_POST['price'];
  $product_code = $_POST['product_code'];
  $product_short_desc = $_POST['short_desc'];
  $product_detail = $_POST['detail'];
  $cat_id = $_POST['cat_id'];
  $error = array();
  $empty = 'Trường này không được để trống';

  if (empty($product_name)) $error['name'] = $empty;
  else {
    if (strlen($product_name) > 100) $error['name'] = 'Tên sản phẩm quá dài!';
  }

  if (empty($product_rate)) $error['rate'] = $empty;

  if (empty($product_price)) $error['price'] = $empty;
  else {
    if (strlen($product_price) > 1000000) $error['price'] = 'Giá sản phẩm vượt quá cho phép!';
  }

  if (empty($product_code)) $error['product_code'] = $empty;
  else {
    if (strlen($product_code) > 30) $error['product_code'] = 'Mã sản phẩm quá dài!';
    else {
      $product_code_in_db = $admin->get_row('SELECT * FROM products WHERE product_code = "' . $product_code . '"');

      if (!empty($product_code_in_db)) {
        $error['product_code'] = 'Mã sản phẩm trùng';
      }
    }
  }

  if (empty($product_short_desc)) $error['short_desc'] = $empty;
  else {
    if (strlen($product_short_desc) > 1000) $error['short_desc'] = 'Mô tả sản phẩm quá dài!';
  }

  if (empty($product_detail)) $error['detail'] = $empty;
  else {
    if (strlen($product_detail) > 2550) $error['detail'] = 'Chi tiết sản phẩm quá dài!';
    if (strlen($product_detail) < 20) $error['detail'] = 'Chi tiết sản phẩm quá ngắn!';
  }

  $upload_dir = "uploads/";
  $type_img = array('jpg', 'png', 'gif', 'jpeg');
  $images = $_FILES['image_url'];
  if (count($_FILES['image_url']['tmp_name']) > 4) {
    $error['image_url'] = 'Bạn chỉ có thể tải lên tối đa 4 ảnh.';
  }

  foreach ($images['tmp_name'] as $key => $tmp_name) {
    $image_url = $images['name'][$key];

    if ($images['error'][$key] !== 0) {
      $error['image_url'] = 'Upload file thất bại';
    } else {
      $extension_file = pathinfo($image_url, PATHINFO_EXTENSION);
      $upload_file = $upload_dir . basename($image_url);

      if (!in_array($extension_file, $type_img)) {
        $error['image'] = 'Không đúng định dạng hình ảnh';
      } elseif ($images['size'][$key] >= 1048576) {
        $error['image'] = "Kích thước ảnh không vượt quá 1MB";
      } else {
        if (empty($error)) {
          if (file_exists('../' . $upload_file)) {
            $fileName = pathinfo($image_url, PATHINFO_FILENAME);
            $newFileName = $fileName . '-Copy';
            $newUploadFile = $upload_dir . $newFileName . '.' . $extension_file;
            $cnt = 1;

            while (file_exists('../' . $newUploadFile)) {
              $fileName = pathinfo($image_url, PATHINFO_FILENAME);
              $newFileName = $fileName . '-Copy(' . $cnt . ')';
              $newUploadFile = $upload_dir . $newFileName . '.' . $extension_file;
              $cnt++;
            }

            $upload_file = $newUploadFile;
          }

          $isUploads = move_uploaded_file($tmp_name, "../$upload_file");

          if (!$isUploads) {
            $error['image_url'] = 'Upload file thất bại';
          } else {
            if (empty($error)) {
              $admin->insert('pro_more', array(
                'img_url' => $upload_file, // Lưu URL của ảnh
                'product_code' => $product_code,
              ));
            }
          }
        }
      }
    }
  }

  if (empty($error)) {
    $data = array(
      'name' => htmlspecialchars($product_name),
      'rate' => $product_rate,
      'price' => $product_price,
      'image_url' => $upload_file,
      'product_code' => $product_code,
      'short_desc' => htmlspecialchars($product_short_desc),
      'detail' => htmlspecialchars($product_detail),
      'cat_id' => $cat_id,
    );
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
      <input multiple class="form-control" type="file" name="image_url[]" id="image">
      <span class="form-message text-danger"><? echo formError('image_url') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="product_code" class="form-label">Mã sản phẩm</label>
      <input type="text" name="product_code" class="form-control" id="product_code" value="<? (isset($product_code) ? setValue($product_code) : '') ?>">
      <span class="form-message"><? echo formError('product_code') ?></span>
    </div>

    <div class="form-group mt-2">
      <label for="mySelect" class="form-label">Chọn danh mục sản phẩm:</label>
      <select class="form-select" id="mySelect" name="cat_id">
        <? foreach ($cat_list as $cat_item) { ?>

          <option value="<? echo $cat_item['cat_id'] ?>">Product <? echo $cat_item['name'] ?></option>
        <? } ?>
      </select>
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

  <form action="?mod=up_product&act=add-with-file" enctype="multipart/form-data" method="post" class="my-4"> 
    Select Excel File to Upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="upload-file-submit">
  </form>
</section>


<? getFooter(); ?>