<?
session_start();
unset($_SESSION['is_login']);
unset($_SESSION['username']);
$is_logout = true;

echo json_encode($is_logout);


