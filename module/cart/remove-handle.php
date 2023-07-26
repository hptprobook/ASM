<?
// Trong file xử lý việc submit form, ví dụ: cart_process_checkout.php

session_start();

// Xử lý dữ liệu form và lưu các ID đã chọn vào session hoặc lưu trữ tạm thời
if (isset($_POST['selected'])) {
  $_SESSION['selected_ids'] = $_POST['selected'];
}

// Redirect trở lại trang ban đầu sau khi xử lý
header('Location: ?mod=cart&act=checkout');
exit;
