<?php 
require_once '../config/connect.php';

$serviceId = $_POST['serviceId'];
$serviceName = $_POST['serviceName'];
$servicePrice = $_POST['servicePrice'];

mysqli_query($connect,  query:"UPDATE `service` SET `service` = '$serviceName', `price` = '$servicePrice' WHERE `service`.`id_service` = '$serviceId'");
header('Location:../../admin-service.php');
?>

