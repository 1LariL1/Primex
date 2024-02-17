<?php
require_once 'connect.php';
// Параметры Google reCAPTCHA
$secretKey = '6LeJ5cYoAAAAAGg0Hb-NYQIEw6us3LYJNTd_GEeT';

// Проверка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Получение данных формы
  $email = $_POST['email'];
  $login = $_POST['login'];
  $password = $_POST['password'];
  $recaptchaResponse = $_POST['g-recaptcha-response'];

  // Валидация reCAPTCHA
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

  // Проверка результата reCAPTCHA
  if ($response->success) {
    // Выполнение регистрации пользователя
    if (!empty($email) && !empty($login) && !empty($password)) {      
        mysqli_query($connect, "INSERT INTO `user` (`id_user`, `login`, `full_name`, `email`, `password`, `telephone`) VALUES (NULL, '$login', '', '$email', '$password', '')");
    }
    // Ваш код для обработки регистрации пользователя
    // ...

    // Отправка ответа после успешной регистрации
    echo "Регистрация успешно выполнена!";
  } else {
    // Ответ, если проверка reCAPTCHA не пройдена
    echo "Проверка reCAPTCHA не пройдена.";
  }
}
?>