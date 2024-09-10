<?php
//xfyprxlbwjjredjn
use PHPMailer\PHPMailer\PHPMailer; //подключение библиотеки
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../config/connect.php'; //подключение к бд

$ordersUser = $_POST['ordersUser']; //запись данных с полей ввода в переменные
$ordersService = $_POST['ordersService'];
$ordersPrice = $_POST['ordersPrice'];
$ordersStatus = $_POST['ordersStatus'];
$ordersDate = $_POST['ordersDate'];
$ordersTime = $_POST['ordersTime'];
$ordersAddress = $_POST['ordersAddress'];

//запрос на добавление записи
mysqli_query($connect, query:"INSERT INTO `orders` (`id_orders`, `id_user`, `id_service`, `price`, `status`, `date`, `time`, `address`) VALUES (NULL, '$ordersUser', '$ordersService', '$ordersPrice', '$ordersStatus', '$ordersDate', '$ordersTime', '$ordersAddress')");


$orders = mysqli_query($connect, query:"SELECT `orders`.`id_orders`, `orders`.`id_user`, `orders`.`id_service`, `orders`.`price`, `orders`.`status`, `orders`.`date`, `orders`.`time`, `orders`.`address`, `user`.`login`, `service`.`service`, `user`.`email`, `user`.`full_name` FROM `orders` JOIN `user` on `orders`.`id_user`=`user`.`id_user` join `service` on `orders`.`id_service`=`service`.`id_service` WHERE `orders`.`id_user` ='$ordersUser' AND `orders`.`id_service` = '$ordersService' AND `orders`.`price` = '$ordersPrice' AND `orders`.`status` = '$ordersStatus' AND `orders`.`date` = '$ordersDate' AND `orders`.`time` = '$ordersTime' AND `orders`.`address` = '$ordersAddress'");
$orders = mysqli_fetch_assoc($orders);  

require_once('../../mail/vendor/autoload.php'); //подключение библиотеки 

$mail = new PHPMailer(true);   

//описание письма
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
    $mail->addAddress($orders['email'], $orders['full_name']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Ваша заявка принята';
    $mail->Body    = $mail->Body = 'Номер Вашей заявки: №' . $orders['id_orders'] . '<br><br>Услуга: ' . $orders['service'] . '<br><br>Время и дата: ' . $orders['time'] . ' ' .$orders['date'] . '<br><br>Адрес: ' . $orders['address'] . '<br><br>Цена: ' . $orders['price'] . '<br><br>Статус Вашей заявки: "' . $orders['status']. '"<br><br>С уважением, команда Primex<br><br><br>Это письмо было отправлено автоматически, не отвечайте на него';


    $mail->send();
    echo 'Проверьте почту'; 

} catch (Exception $e) {
  echo "Ошибка - >".$mail->ErrorInfo;
}

header('Location:../../admin-orders.php');

?>