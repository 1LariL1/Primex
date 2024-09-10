<?php
require_once 'connect.php';

$secretKey = '6LeJ5cYoAAAAAGg0Hb-NYQIEw6us3LYJNTd_GEeT';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $email = $_POST['email'];
  $login = $_POST['login'];
  $password = $_POST['password'];
  $recaptchaResponse = $_POST['g-recaptcha-response'];


  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = [
    'secret' => $secretKey,
    'response' => $recaptchaResponse
  ];

  $options = [
    'http' => [
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query($data)
    ]
  ];

  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  $response = json_decode($result);

  if ($response->success) {

    if (!empty($email) && !empty($password) && !empty($login)) {    
      
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      mysqli_query($connect, "INSERT INTO `user` (`id_user`, `login`, `full_name`, `email`, `password`, `telephone`) VALUES (NULL, '$login', '', '$email', '$hashedPassword', '')");
    }


    header('Location: success.html');
  } else {

    header('Location: fail.html');
  }
}
?>