<? require_once 'php/config/connect.php';
?>

<?php
session_start();
if (!$_SESSION['user'] || $_SESSION['user']['access'] != 'admin') {
    header('Location: admin-auth.php');

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Сообщения</title>
</head>
<body style="background-color: #252525">
    <header class="header-main">
        <div class="container">
            <div class="header-main__nav"  style="justify-content: center;">
                <ul class="header-main__ul">
                    <li><a href="admin-user.php" class="li-inactive">ПОЛЬЗОВАТЕЛИ</a></li>

                    <li><a href="admin-orders.php" class="li-inactive">ЗАКАЗЫ</a></li>

                    <li><a href="main.php" class="li-inactive"><img src="/img/logo-primex-menu.png" alt="Логотип Primex" ></a></li>

                    <li><a href="admin-service.php" class="li-inactive">УСЛУГИ</a></li>

                    <li><a href="#" class="li-active li-inactive-last">ЗАЯВКИ</a></li>
                </ul>
            </div>                
        </div>
    </header>

    <main>
        <div class="container container1">
            <table class="admin__table">
                <tr class="admin__tr">
                    <th class="admin__th admin__th-left">ID</th>
                    <th class="admin__th">Услуга</th>
                    <th class="admin__th">Пользователь</th>
                    <th class="admin__th">Адрес</th>
                    <th class="admin__th">Комментарий</th>
                    <th class="admin__th">Желаемое время</th>
                    <th class="admin__th admin__th-right">Желаемая дата</th>
                </tr>

                <?php
                    $messages = mysqli_query($connect, query:"SELECT message.id_message, service.service, user.login, message.address, message.comment, message.time, message.date
                    FROM message 
                    JOIN service ON message.id_service=service.id_service 
                    JOIN user ON message.id_user=user.id_user;");
                    $messages = mysqli_fetch_all($messages);
                    foreach ($messages as $message) {
                        ?>
                            <tr class="admin__tr">
                                <td class="admin__td"><?= $message[0] ?></td>
                                <td class="admin__td"><?= $message[1] ?></td>
                                <td class="admin__td"><?= $message[2] ?></td>
                                <td class="admin__td"><?= $message[3] ?></td>
                                <td class="admin__td"><?= $message[4] ?></td>
                                <td class="admin__td"><?= $message[5] ?></td>
                                <td class="admin__td"><?= $message[6] ?></td>
                                <td><a href="php/delete/delete-message.php?id=<?= $message[0] ?>"  class="admin__td1">Удалить</a></td>
                            </tr>

                        <?php
                    }
                ?>
                
            </table>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer__wrapper">
                <div class="footer__left">
                    <ul class="footer__ul">
                        <li><a href="about-primex.php" class="li-inactive">О КОМПАНИИ</a></li>
    
                        <li><a href="services.php" class="li-inactive">УСЛУГИ</a></li>

                        <li><a href="contacts.php" class="li-inactive">КОНТАКТЫ</a></li>

                        <li><a href="auth-reg.php" class="li-inactive li-inactive-last">ЛИЧНЫЙ КАБИНЕТ</a></li>
                    </ul>
                </div>
                <div class="footer__right">
                    <img src="img/ins.png" alt="Логотип Инстаграм" class="footer__img">
                    <img src="img/whatap.png" alt="Логотип Ватсап" class="footer__img">
                    <img src="img/telegram.png" alt="Логотип Телеграм" class="footer__img">
                    <img src="img/utb.png" alt="Логотип Ютуб" class="footer__img">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>