<?php
session_start(); //проверка на открытую сесссию
if (!$_SESSION['user']) {
    header('Location: auth-reg.php');
}
?>


<?php 
require_once '../config/connect.php'; //подключение к бд


$userId = $_POST['userId']; //запись данных из полей ввода в переменные
$userLogin = $_POST['userLogin'];
$userFIO = $_POST['userFIO'];
$userEmail = $_POST['userEmail'];
$userPass = $_POST['userPass'];
$userTel = $_POST['userTel'];
$userNewPass = $_POST['userNewPass'];

if (empty($userNewPass)) { //проверка: заполнинил ли пользователь поле "Новый пароль"
    $storedPassword = $_SESSION['user']['password']; 
    //проверка введенного пароля с паролем в бд
    if (password_verify($userPass, $storedPassword)) {
        //запрос на изменение данных
        mysqli_query($connect, "UPDATE `user` SET `login` = '$userLogin', `full_name` = '$userFIO', `email` = '$userEmail', `telephone` = '$userTel' WHERE `user`.`id_user` = '$userId'");
        //обновление переменных в сессии
        $_SESSION['user']['login'] = $userLogin;
        $_SESSION['user']['full_name'] = $userFIO;
        $_SESSION['user']['email'] = $userEmail;
        $_SESSION['user']['telephone'] = $userTel;
        header('Location: ../../account.php');

    } else {
        header('Location: ../config/access-denied.html'); //сообщение о неправильном пароле
    }

} else { //если новый пароль был введен
    $storedPassword = $_SESSION['user']['password']; 

    if (password_verify($userPass, $storedPassword)) { //проверка пароля
        $hashedPassword = password_hash($userNewPass, PASSWORD_DEFAULT);  //хэширование нового пароля
        mysqli_query($connect, "UPDATE `user` SET `login` = '$userLogin', `full_name` = '$userFIO', `email` = '$userEmail', `password` = '$hashedPassword', `telephone` = '$userTel' WHERE `user`.`id_user` = '$userId'");
        $_SESSION['user']['login'] = $userLogin;
        $_SESSION['user']['full_name'] = $userFIO;
        $_SESSION['user']['email'] = $userEmail;
        $_SESSION['user']['password'] = $hashedPassword;
        $_SESSION['user']['telephone'] = $userTel;

        header('Location: ../../account.php');
    } else {
        header('Location: ../config/access-denied.html');
    }
}
?>

