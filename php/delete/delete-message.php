<?php
require_once '../config/connect.php';

$messageId = $_GET['id'];

mysqli_query($connect, query:"DELETE FROM message WHERE `message`.`id_message` = '$messageId'");
header('Location:../../admin-message.php');
?>
