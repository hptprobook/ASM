<?
header('Content-Type: text/html; charset=utf-8');
session_start();
require 'libs/Template.php';
require 'libs/User.php';
require 'libs/DBDriver.php';
require 'libs/Validate.php';
require 'libs/Cart.php';

$database = new DB_Driver();
$template = new Template();
$cart = new Cart($database);
$user = new User($database);

$GLOBALS['cart'] = $cart;
$GLOBALS['database'] = $database;
$GLOBALS['user_obj'] = $user;
?>

<?

$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';
$act = isset($_GET['act']) ? $_GET['act'] : 'main';
$path = 'module/' . $mod . '/' . $act . '.php';

if(file_exists($path)) require $path;
// else require 'inc/404.php';

?>

