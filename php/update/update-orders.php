<?php 
require_once '../config/connect.php';

$ordersId = $_POST['ordersId'];
$ordersUser = $_POST['ordersUser'];
$ordersService = $_POST['ordersService'];
$ordersPrice = $_POST['ordersPrice'];
$ordersStatus = $_POST['ordersStatus'];
$ordersDate = $_POST['ordersDate'];
$ordersTime = $_POST['ordersTime'];
$ordersAddress = $_POST['ordersAddress'];

mysqli_query($connect,  query:"UPDATE `orders` SET `id_user` = '$ordersUser', `id_service` = '$ordersService', `price` = '$ordersPrice', `status` = '$ordersStatus', `date` = '$ordersDate', `time` = '$ordersTime', `address` = '$ordersAddress' WHERE `orders`.`id_orders` = '$ordersId'");
header('Location:../../admin-orders.php');
?>

