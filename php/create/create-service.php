<?php

require_once '../config/connect.php';

$serviceName = $_POST['serviceName'];
$servicePrice = $_POST['servicePrice'];

mysqli_query($connect, query:"INSERT INTO `service` (`id_service`, `service`, `price`) VALUES (NULL, '$serviceName', '$servicePrice')");

header('Location:../../admin-service.php');

?>