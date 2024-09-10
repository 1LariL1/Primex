<? require_once 'php/config/connect.php';
?>
<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: auth-reg.php');
}
?>

<?php

require_once 'php/config/connect.php';

$id_user = $_GET['id'];
$user = mysqli_query($connect, query:"SELECT * FROM `user` WHERE `id_user` = '$id_user'");
$user = mysqli_fetch_assoc($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Изменить личные данные</title>
</head>
<body>
    <header class="header-main">
        <div class="container">
            <div class="header-main__nav">
                <ul class="header-main__ul">
                    <li><a href="about-primex.php" class="li-inactive li-inactive-first">О КОМПАНИИ</a></li>

                    <li><a href="services.php" class="li-inactive">УСЛУГИ</a></li>

                    <li><a href="main.php" class="li-inactive"><img src="/img/logo-primex-menu.png" alt="Логотип Primex" ></a></li>

                    <li><a href="contacts.php" class="li-inactive">КОНТАКТЫ</a></li>

                    <li><a href="#" class="li-active li-inactive-last">ЛИЧНЫЙ КАБИНЕТ</a></li>

                </ul>
            </div>  
    </header>
    <main>
        <section class="info">
            <div class="container" style="min-height:1100px;">
                <div class="logout">
                    <h1 class="title2 logout-title">Личный кабинет</h1>
                    <a href="php/config/logout.php" class="logout-button"><img src="img/logout.png" alt="Выход"></a>
                </div>

                <div class="personal-info">
                    <div style="display:flex; justify-content: space-between; align-items: center;">
                        <h2 class="title9">Изменить личные данные</h2>
                        <form method="post" action="php/update/update-account-user.php">
                        <input type="submit" class="personal-info__button" value="Изменить">
                    </div>
                    
                        <input type="hidden" name="userId" value="<?= $user['id_user']?>">
                        <div class="personal-info__wrapper">
                            <div class="personal-info__input">
                                <h3 class="title10">Логин</h3>
                                <div class="personal-info__input-div">
                                    <input type="text" class="account-input" name="userLogin" value="<?= $user['login']?>">
                                </div>
                            </div>
                            <div class="personal-info__input">
                                <h3 class="title10">Email</h3>
                                <div class="personal-info__input-div">
                                    <input type="email" class="account-input" name="userEmail" value="<?= $user['email']?>">
                                </div>
                            </div>
                            <div class="personal-info__input-last">
                                <h3 class="title10">ФИО</h3>
                                <div class="personal-info__input-div">
                                    <input type="text" class="account-input" name="userFIO" value="<?= $user['full_name']?>">
                                </div>
                            </div>
                        </div>

                        <div class="personal-info__wrapper">
                            <div class="personal-info__input">
                                <h3 class="title10">Телефон</h3>
                                <div class="personal-info__input-div">
                                    <input type="tel" class="account-input" name="userTel" value="<?= $user['telephone']?>">
                                </div>
                            </div>
                            <div class="personal-info__input">
                                <h3 class="title10">Введите пароль</h3>
                                <div class="personal-info__input-button-div">
                                    <div class="personal-info__input-div">
                                        <input type="text" class="account-input" name="userPass" required>
                                    </div>
                                </div>
                            </div>
                            <div class="personal-info__input-last">
                                <h3 class="title10">Новый пароль</h3>
                                <div class="personal-info__input-div">
                                    <input type="text" class="account-input" name="userNewPass" value="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer__wrapper">
                <div class="footer__left">
                    <ul class="footer__ul">
                        <li><a href="about-primex.php" class="li-inactive">О КОМПАНИИ</a></li>
    
                        <li><a href="services.php" class="li-inactive">УСЛУГИ</a></li>
    
                        <li><a href="contacts.php" class="li-inactive">КОНТАКТЫ</a></li>
    
                        <li><a href="#" class="li-inactive li-inactive-last">ЛИЧНЫЙ КАБИНЕТ</a></li>
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
    <script src="js/script.js"></script>
</body>
</html>