<?php

require_once '../config/connect.php'; //подключение к бд

$serviceName = $_POST['serviceName']; //запись значений в переменные из полей ввода 
$servicePrice = $_POST['servicePrice'];
$serviceDesc = $_POST['serviceDesc'];

mysqli_query($connect, query:"INSERT INTO `service` (`id_service`, `service`, `price`, `description`) VALUES (NULL, '$serviceName', '$servicePrice', '$serviceDesc')"); //запрос на добавление в бд





header('Location:../../admin-service.php');

?>