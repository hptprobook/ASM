<?
header('Refresh: 2; URL=' . $_SERVER['HTTP_REFERER'] . '');

getHeader();

$id = $_GET['id'];

$admin->remove('users', 'user_id="' . $id . '"');

echo '<div class="alert alert-success text-center">Xoá thành công!<br>Đang chuyển hướng ... </div>';


?>

<?
getFooter();
?>