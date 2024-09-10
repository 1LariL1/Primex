<?php

require_once '../config/connect.php';

$userLogin = $_POST['userLogin'];
$userFIO = $_POST['userFIO'];
$userEmail = $_POST['userEmail'];
$userPass = $_POST['userPass'];
$userTel = $_POST['userTel'];
$userRole = $_POST['userRole'];

$hashedPassword = password_hash($userPass, PASSWORD_DEFAULT); //хэширование пароля

mysqli_query($connect, query:"INSERT INTO `user` (`id_user`, `login`, `full_name`, `email`, `password`, `telephone`, `access`) VALUES (NULL, '$userLogin', '$userFIO', '$userEmail', '$hashedPassword', '$userTel', '$userRole')");

header('Location:../../admin-user.php');

?>