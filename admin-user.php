<? require_once 'php/config/connect.php'; //подключение к бд
?>

<?php
session_start(); //проверка на открытую сессию
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
    <title>Пользователи</title>
</head>
<body style="background-color: #252525">
    <header class="header-main">
        <div class="container">
            <div class="header-main__nav" style="justify-content: center;">
                <ul class="header-main__ul">
                    <li><a href="#" class="li-active">ПОЛЬЗОВАТЕЛИ</a></li>

                    <li><a href="admin-orders.php" class="li-inactive">ЗАКАЗЫ</a></li>

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
                    <th class="admin__th">Логин</th>
                    <th class="admin__th">ФИО</th>
                    <th class="admin__th">Email</th>
                    <th class="admin__th">Телефон</th>
                    <th class="admin__th admin__th-right">Роль</th>
                </tr>

                <?php
                    $users = mysqli_query($connect, query:"SELECT * FROM `user`"); //запрос на возврат строк в таблице пользователей
                    $users = mysqli_fetch_all($users);
                    foreach ($users as $user) { //массив на вывод строк из таблицы пользователей
                        ?>
                            <tr class="admin__tr">
                                <td class="admin__td"><?= $user[0] ?></td>
                                <td class="admin__td"><?= $user[1] ?></td>
                                <td class="admin__td"><?= $user[2] ?></td>
                                <td class="admin__td"><?= $user[3] ?></td>
                                <td class="admin__td"><?= $user[5] ?></td>
                                <td class="admin__td"><?= $user[6] ?></td>
                                <!-- ссылка на кнопку изменения записи с определенным id -->
                                <td><a href="admin-user-update.php?id=<?= $user[0] ?>"  class="admin__td1">Изменить</a></td> 
                                <!-- ссылка на кнопку удаления записи с определенным id -->
                                <td><a href="php/delete/delete-user.php?id=<?= $user[0] ?>"  class="admin__td1">Удалить</a></td>
                            </tr>

                        <?php
                    }
                ?>
                
            </table>
            <a href="admin-user-add.php" class="main-about-primex__button">Добавить запись</a>
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