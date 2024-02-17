<?php

require_once '../config/connect.php';

$userId = $_POST['userId'];
$messageService = $_POST['messageService'];
$messageAddress = $_POST['messageAddress'];
$messageComment = $_POST['messageComment'];
$messageTime = $_POST['messageTime'];
$messageDate = $_POST['messageDate'];

mysqli_query($connect, query:"INSERT INTO `message` (`id_message`, `id_service`, `id_user`, `address`, `comment`, `time`, `date`) VALUES (NULL, '$messageService', '$userId', '$messageAddress', '$messageComment', '$messageTime', '$messageDate')");

header('Location:../../account.php');

?>