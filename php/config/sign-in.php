<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = ($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'"); //AND `status` = 1
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

            $_SESSION['user'] = [
                "id_user" => $user['id_user'],
                "email" => $user['email'],
                "login" => $user['login'],
                "telephone" => $user ['telephone'],
                "password" => $user['password'],
                "full_name" => $user['full_name'],
            ];

            

        header('Location: ../../account.php');


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
