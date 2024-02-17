<?php
require_once '../config/connect.php';

$userId = $_GET['id'];

mysqli_query($connect, query:"DELETE FROM user WHERE `user`.`id_user` = '$userId'");
header('Location:../../admin-user.php');
?>