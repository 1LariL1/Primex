<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: auth-reg.php');
}
?>


<?php 
require_once '../config/connect.php';


$userId = $_POST['userId'];
$userLogin = $_POST['userLogin'];
$userFIO = $_POST['userFIO'];
$userEmail = $_POST['userEmail'];
$userPass = $_POST['userPass'];
$userTel = $_POST['userTel'];

mysqli_query($connect,  query:"UPDATE `user` SET `login` = '$userLogin', `full_name` = '$userFIO', `email` = '$userEmail', `password` = '$userPass', `telephone` = '$userTel' WHERE `user`.`id_user` = '$userId'");

$_SESSION['user']['login'] = $userLogin;
$_SESSION['user']['full_name'] = $userFIO;
$_SESSION['user']['email'] = $userEmail;
$_SESSION['user']['password'] = $userPass;
$_SESSION['user']['telephone'] = $userTel;

header('Location:../../account.php');
?>

