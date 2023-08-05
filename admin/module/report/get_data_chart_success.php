<?
require '../../libs/DBDriver.php';
$admin = new DB_Driver();

$selectedPeriod = $_GET['period'];

if ($selectedPeriod === 'day') {
  $groupBy = 'DATE_FORMAT(ship_date, "%Y-%m-%d")';
} elseif ($selectedPeriod === 'week') {
  $groupBy = 'DATE_FORMAT(ship_date, "%Y-%u")';
} elseif ($selectedPeriod === 'month') {
  $groupBy = 'DATE_FORMAT(ship_date, "%Y-%m")';
} else {
  die("Giá trị không hợp lệ");
}

$sql = "SELECT $groupBy as time_period, COUNT(*) as total_orders FROM user_cart_comp WHERE `status` = 2 GROUP BY time_period";

$result = $admin->get_list($sql);

echo json_encode($result);
