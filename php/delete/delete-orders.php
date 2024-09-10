<?php
require_once '../config/connect.php'; //подключение к бд

$ordersId = $_GET['id']; //запись значения первичного ключа в переменную

mysqli_query($connect, query:"DELETE FROM orders WHERE `orders`.`id_orders` = '$ordersId'"); //запрос на удаление
header('Location:../../admin-orders.php');
?>
    