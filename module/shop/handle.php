<?

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../libs/DBDriver.php';
require '../../libs/Product.php';
$database = new DB_Driver();
$productHandle = new Product($database);

$sort = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';
$search = isset($_POST['searchValue']) ? trim($_POST['searchValue']) : '';
$filter = isset($_POST['filterValue']) ? (int)$_POST['filterValue'] : '';
$cat_id = isset($_POST['cat_id']) ? (int)$_POST['cat_id'] : '';

$productList = $productHandle->searchProducts($search, $filter, $sort, $cat_id);


echo json_encode($productList);