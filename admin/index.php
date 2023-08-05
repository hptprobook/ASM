<?
session_start();
require 'libs/Template.php';
require 'libs/DBDriver.php';
require 'libs/Validate.php';

$admin = new DB_Driver();

?>

<?

$mod = isset($_GET['mod']) ? $_GET['mod'] : 'account';
$act = isset($_GET['act']) ? $_GET['act'] : 'main';
$path = 'module/' . $mod . '/' . $act . '.php';

if (!isset($_SESSION['is_admin_login']) && $act !== 'login') {
  header('Location: ?mod=user&act=login');
}

if (file_exists($path)) require $path;
else require 'inc/404.php';

?>
