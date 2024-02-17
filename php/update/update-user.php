<?php 
require_once '../config/connect.php';

$userId = $_POST['userId'];
$userLogin = $_POST['userLogin'];
$userFIO = $_POST['userFIO'];
$userEmail = $_POST['userEmail'];
$userPass = $_POST['userPass'];
$userTel = $_POST['userTel'];

mysqli_query($connect,  query:"UPDATE `user` SET `login` = '$userLogin', `full_name` = '$userFIO', `email` = '$userEmail', `password` = '$userPass', `telephone` = '$userTel' WHERE `user`.`id_user` = '$userId'");
header('Location:../../admin-user.php');
?>

