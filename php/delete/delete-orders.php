<?php
require_once '../config/connect.php';

$ordersId = $_GET['id'];

mysqli_query($connect, query:"DELETE FROM orders WHERE `orders`.`id_orders` = '$ordersId'");
header('Location:../../admin-orders.php');
?>
