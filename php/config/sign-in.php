<?php

session_start(); //открытие сессии
require_once 'connect.php'; //подключение к бд

$login = $_POST['login']; //запись данных с полей ввода в переменные
$password = $_POST['password'];

$check_user = mysqli_query($connect, "SELECT * FROM user WHERE login = '$login'"); //проверка пользователя
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);

    $storedPassword = $user['password'];  

    
    if (password_verify($password, $storedPassword)) { //сравнение хэширование пароля с введенным паролем
        
        $_SESSION['user'] = [ //запись новых переменных в сессию
            "id_user" => $user['id_user'],
            "email" => $user['email'],
            "login" => $user['login'],
            "telephone" => $user ['telephone'],
            "password" => $user['password'],
            "full_name" => $user['full_name'],
            "access" => $user['access'],
        ];
        header('Location: ../../account.php');
    } else {
        
        header('Location: ../../auth-reg.php');
    }
} else {
    
    header('Location: ../../auth-reg.php');
}
?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
