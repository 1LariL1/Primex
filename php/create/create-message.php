<?php
//xfyprxlbwjjredjn
use PHPMailer\PHPMailer\PHPMailer; //подключение библиотеки
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../config/connect.php'; //подключение бд

$userId = $_POST['userId']; //запись данных с полей ввода в переменные
$userEmail = $_POST['userEmail'];
$userFI0 = $_POST['userFI0'];
$messageService = $_POST['messageService'];
$messageAddress = $_POST['messageAddress'];
$messageComment = $_POST['messageComment'];
$messageTime = $_POST['messageTime'];
$messageDate = $_POST['messageDate'];

//запрос на добавление заявки в базу данных
mysqli_query($connect, query:"INSERT INTO `message` (`id_message`, `id_service`, `id_user`, `address`, `comment`, `time`, `date`) VALUES (NULL, '$messageService', '$userId', '$messageAddress', '$messageComment', '$messageTime', '$messageDate')");

require_once('../../mail/vendor/autoload.php'); //подключение к функции библиотеки

$mail = new PHPMailer(true);   

//описание письма, которое будет отправлено пользователю
try {
    //Server settings
    $mail->CharSet = "UTF-8";
    $mail->setLanguage("ru", '../../mail/vendor/phpmailer/phpmailer/language');
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'isip_a.o.lopuhova@mpt.ru';                     //SMTP username
    $mail->Password   = 'xfyprxlbwjjredjn';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('isip_a.o.lopuhova@mpt.ru', 'Primex');
    $mail->addAddress($userEmail, $userFI0);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Ваша заявка была отправлена';
    $mail->Body    = 'В течение 10 минут оператор свяжется с Вами для уточнения информации.<br><br>С уважением, команда Primex<br><br><br>Это письмо было отправлено автоматически, не отвечайте на него';


    $mail->send();
    echo 'Проверьте почту';

} catch (Exception $e) {
  echo "Ошибка - >".$mail->ErrorInfo;
}


header('Location:../../account.php');

?>