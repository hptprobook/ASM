<?
require '../../libs/DBDriver.php';
$database = new DB_Driver();
$id = $_GET['id'];
$report = $database->get_row('SELECT * FROM report');
$order_success = $report['order_success'];
$order_processing = $report['order_processing'];

$database->update('user_cart_comp', array('status' => 2), 'id = "' . $id . '"');
$database->update('report', 
  array(
    'order_success' => $order_success + 1,
    'order_processing' => $order_processing - 1
  ), 
  'id = 1'
);

echo $id;