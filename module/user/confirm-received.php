<?
require '../../libs/DBDriver.php';
$database = new DB_Driver();
$id = $_GET['id'];

$database->update('user_cart_comp', array('status' => 2), 'id = "' . $id . '"');

echo $id;