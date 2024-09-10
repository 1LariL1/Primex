<?php 
require_once '../config/connect.php'; //подключение к бд

$serviceId = $_POST['serviceId']; //запись значений в переменные из полей ввода 
$serviceName = $_POST['serviceName'];
$servicePrice = $_POST['servicePrice'];
$serviceDesc = $_POST['serviceDesc'];

//запрос на изменение данных в бд
mysqli_query($connect,  query:"UPDATE `service` SET `service` = '$serviceName', `price` = '$servicePrice', `description` = '$serviceDesc' WHERE `service`.`id_service` = '$serviceId'");
header('Location:../../admin-service.php');
?>

