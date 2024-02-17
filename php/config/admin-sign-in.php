<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = ($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'"); //AND `status` = 1
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

            $_SESSION['user'] = [
                // "id_user" => $user['id_user'],
                // "surname" => $user['surname'],
                // "telephone" => $user ['telephone'],
                // "email" => $user['email'],
            ];

            

        header('Location: ../../admin-user.php');


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
