<?php

require_once '../config/connect.php';

$userLogin = $_POST['userLogin'];
$userFIO = $_POST['userFIO'];
$userEmail = $_POST['userEmail'];
$userPass = $_POST['userPass'];
$userTel = $_POST['userTel'];

mysqli_query($connect, query:"INSERT INTO `user` (`id_user`, `login`, `full_name`, `email`, `password`, `telephone`) VALUES (NULL, '$userLogin', '$userFIO', '$userEmail', '$userPass', '$userTel')");

header('Location:../../admin-user.php');

?>