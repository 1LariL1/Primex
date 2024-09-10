<?php

session_start(); //создаем сессию
require_once 'connect.php'; //подключение к базе данных

$login = $_POST['login']; //записываем значения в переменных из полей ввода
$password = $_POST['password'];

$check_user = mysqli_query($connect, "SELECT * FROM user WHERE login = '$login' AND access = 'admin'"); //проверяем пользователя на корректно введенные данные
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);

    $storedPassword = $user['password'];  //расшифровываем пароль

    
    if (password_verify($password, $storedPassword)) { //сравниваем пароли
        
        $_SESSION['user'] = [ //записываем переменные в сессию
            "id_user" => $user['id_user'],
            "email" => $user['email'],
            "login" => $user['login'],
            "telephone" => $user ['telephone'],
            "password" => $user['password'],
            "full_name" => $user['full_name'],
            "access" => $user['access'],
        ];
        header('Location: ../../admin-user.php');
    } else {
        
        header('Location: ../../admin-auth.php');
    }
} else {
    
    header('Location: ../../admin-auth.php');
}
?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
