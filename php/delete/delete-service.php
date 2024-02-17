<?php
require_once '../config/connect.php';

$serviceId = $_GET['id'];

mysqli_query($connect, query:"DELETE FROM service WHERE `service`.`id_service` = '$serviceId'");
header('Location:../../admin-service.php');
?>