<?php 
use PHPMailer\PHPMailer\PHPMailer; //подключение к библиотеке
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../config/connect.php'; //подключение к бд

$ordersId = $_POST['ordersId']; //запись данных с полей ввода в переменные
$ordersEmail = $_POST['ordersEmail'];
$ordersFIO = $_POST['ordersFIO'];
$ordersServ = $_POST['ordersServ'];
$ordersUser = $_POST['ordersUser'];
$ordersService = $_POST['ordersService'];
$ordersPrice = $_POST['ordersPrice'];
$ordersStatus = $_POST['ordersStatus'];
$ordersDate = $_POST['ordersDate'];
$ordersTime = $_POST['ordersTime'];
$ordersAddress = $_POST['ordersAddress'];
$ordersOldStatus = $_POST['ordersOldStatus'];

if ($ordersStatus != $ordersOldStatus) { //условие: если старый статус не совпадает с новым, введенным пользователем
  require_once('../../mail/vendor/autoload.php'); //подключение к библиотеке 

  $mail = new PHPMailer(true);   

  //описание письма
  try {

      $mail->CharSet = "UTF-8";
      $mail->setLanguage("ru", '../../mail/vendor/phpmailer/phpmailer/language');
      $mail->SMTPDebug = 0;                      
      $mail->isSMTP();                                            
      $mail->Host       = 'smtp.gmail.com';                    
      $mail->SMTPAuth   = true;                                   
      $mail->Username   = 'isip_a.o.lopuhova@mpt.ru';                     
      $mail->Password   = 'xfyprxlbwjjredjn';                               
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
      $mail->Port       = 587;                                    

      
      $mail->setFrom('isip_a.o.lopuhova@mpt.ru', 'Primex');
      $mail->addAddress($ordersEmail, $ordersFI0);     

      
      $mail->isHTML(true);                                  
      $mail->Subject = 'Статус Вашей заявки изменен';
      $mail->Body    = 'Статус Вашей заявки №'.$ordersId.' по услуге "'.$ordersServ.'" был изменен на "'.$ordersStatus.'".<br><br>С уважением, команда Primex<br><br><br>Это письмо было отправлено автоматически, не отвечайте на него';


      $mail->send();
      echo 'Проверьте почту';

  } catch (Exception $e) {
    echo "Ошибка - >".$mail->ErrorInfo;
  }

} else {

}
//запрос на изменение записи
mysqli_query($connect,  query:"UPDATE `orders` SET `id_user` = '$ordersUser', `id_service` = '$ordersService', `price` = '$ordersPrice', `status` = '$ordersStatus', `date` = '$ordersDate', `time` = '$ordersTime', `address` = '$ordersAddress' WHERE `orders`.`id_orders` = '$ordersId'");

header('Location:../../admin-orders.php');


?>

