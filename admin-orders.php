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
    <title>Заказы</title>
</head>
<body style="background-color: #252525">
    <header class="header-main">
        <div class="container">
            <div class="header-main__nav"  style="justify-content: center;">
                <ul class="header-main__ul">
                    <li><a href="admin-user.php" class="li-inactive">ПОЛЬЗОВАТЕЛИ</a></li>

                    <li><a href="#" class="li-active">ЗАКАЗЫ</a></li>

                    <li><a href="main.php" class="li-inactive"><img src="/img/logo-primex-menu.png" alt="Логотип Primex" ></a></li>

                    <li><a href="admin-service.php" class="li-inactive">УСЛУГИ</a></li>

                    <li><a href="admin-message.php" class="li-inactive li-inactive-last">ЗАЯВКИ</a></li>
                </ul>
            </div>                
        </div>
    </header>

    <main>
        <div class="container container1">
            <table class="admin__table">
                <tr class="admin__tr">
                    <th class="admin__th admin__th-left">ID</th>
                    <th class="admin__th">Пользователь</th>
                    <th class="admin__th">Услуга</th>
                    <th class="admin__th">Цена</th>
                    <th class="admin__th">Статус</th>
                    <th class="admin__th">Дата</th>
                    <th class="admin__th">Время</th>
                    <th class="admin__th admin__th-right">Адрес</th>
                </tr>

                <?php
                    $orders = mysqli_query($connect, query:"SELECT orders.id_orders, user.login, service.service, orders.price, orders.status, orders.date, orders.time, orders.address 
                    FROM orders 
                    JOIN user on orders.id_user=user.id_user 
                    JOIN service ON orders.id_service=service.id_service;");
                    $orders = mysqli_fetch_all($orders);
                    foreach ($orders as $order) {
                        ?>
                            <tr class="admin__tr">
                                <td class="admin__td"><?= $order[0] ?></td>
                                <td class="admin__td"><?= $order[1] ?></td>
                                <td class="admin__td"><?= $order[2] ?></td>
                                <td class="admin__td"><?= $order[3] ?></td>
                                <td class="admin__td"><?= $order[4] ?></td>
                                <td class="admin__td"><?= $order[5] ?></td>
                                <td class="admin__td"><?= $order[6] ?></td>
                                <td class="admin__td"><?= $order[7] ?></td>
                                <td><a href="admin-orders-update.php?id=<?= $order[0] ?>"  class="admin__td1">Изменить</a></td>
                                <td><a href="php/delete/delete-orders.php?id=<?= $order[0] ?>"  class="admin__td1">Удалить</a></td>
                            </tr>

                        <?php
                    }
                ?>
                
            </table>
            <a href="admin-orders-add.php" class="main-about-primex__button">Добавить запись</a>
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