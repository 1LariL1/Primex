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
    <title>Добавить запись</title>
</head>
<body style="background-color: #252525">
    <header class="header-main">
        <div class="container">
            <div class="header-main__nav"  style="justify-content: center;">
                <ul class="header-main__ul">
                    <li><a href="admin-user.php" class="li-inactive">ПОЛЬЗОВАТЕЛИ</a></li>

                    <li><a href="admin-orders.php" class="li-inactive">ЗАКАЗЫ</a></li>

                    <li><a href="main.php" class="li-inactive"><img src="/img/logo-primex-menu.png" alt="Логотип Primex" ></a></li>

                    <li><a href="#" class="li-active">УСЛУГИ</a></li>

                    <li><a href="admin-message.php" class="li-inactive li-inactive-last">ЗАЯВКИ</a></li>
                </ul>
            </div>                
        </div>
    </header>

    <main>
        <div class="container container1">
            <a href="admin-service.php" class="title3"> <- Вернуться назад </a>
            <form action="/php/create/create-service.php" method="post">
                <div class="admin-box">
                    <div class="admin-wrap">
                        <div class="admin-label admin-label-left">
                            <label>Услуга</label>
                        </div>
                        <input type="text" name="serviceName" class="admin-input" required>
                    </div>

                    <div class="admin-wrap">
                        <div class="admin-label">
                            <label>Цена за 1 кв.м.</label>
                        </div>
                        <input type="number" name="servicePrice" class="admin-input" required>
                    </div>

                    <div class="admin-wrap">
                        <div class="admin-label admin-label-right">
                            <label>Описание</label>
                        </div>
                        <input type="text" name="serviceDesc" class="admin-input" required>
                    </div>
                </div>
                <button type="submit" class="main-about-primex__button">Добавить</button>
            </form>
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