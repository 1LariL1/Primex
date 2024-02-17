<?php

require_once '../config/connect.php';

$ordersUser = $_POST['ordersUser'];
$ordersService = $_POST['ordersService'];
$ordersPrice = $_POST['ordersPrice'];
$ordersStatus = $_POST['ordersStatus'];
$ordersDate = $_POST['ordersDate'];
$ordersTime = $_POST['ordersTime'];
$ordersAddress = $_POST['ordersAddress'];

mysqli_query($connect, query:"INSERT INTO `orders` (`id_orders`, `id_user`, `id_service`, `price`, `status`, `date`, `time`, `address`) VALUES (NULL, '$ordersUser', '$ordersService', '$ordersPrice', '$ordersStatus', '$ordersDate', '$ordersTime', '$ordersAddress')");

header('Location:../../admin-orders.php');

?>