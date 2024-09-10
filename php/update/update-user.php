<?php 
require_once '../config/connect.php';

$userId = $_POST['userId'];
$userLogin = $_POST['userLogin'];
$userFIO = $_POST['userFIO'];
$userEmail = $_POST['userEmail'];
$userRole = $_POST['userRole'];
$userTel = $_POST['userTel'];

mysqli_query($connect,  query:"UPDATE `user` SET `login` = '$userLogin', `full_name` = '$userFIO', `email` = '$userEmail', `telephone` = '$userTel', `access` = '$userRole' WHERE `user`.`id_user` = '$userId'");
header('Location:../../admin-user.php');
?>

