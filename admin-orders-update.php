<?php

    require_once 'php/config/connect.php';

    $id_orders = $_GET['id'];
    $orders = mysqli_query($connect, query:"SELECT `orders`.`id_orders`, `orders`.`id_user`, `orders`.`id_service`, `orders`.`price`, `orders`.`status`, `orders`.`date`, `orders`.`time`, `orders`.`address`, `user`.`login`, `service`.`service`, `user`.`email`, `user`.`full_name` FROM `orders` JOIN `user` on `orders`.`id_user`=`user`.`id_user` join `service` on `orders`.`id_service`=`service`.`id_service` WHERE `id_orders` = '$id_orders'");
    $orders = mysqli_fetch_assoc($orders);
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
    <title>Изменить запись</title>
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
            <a href="admin-orders.php" class="title3"> <- Вернуться назад </a>
            <form action="/php/update/update-orders.php" method="post">
                <div class="admin-box">
                    <input type="hidden" name="ordersId" value="<?= $orders['id_orders']?>">
                    <input type="hidden" name="ordersEmail" value="<?= $orders['email']?>">
                    <input type="hidden" name="ordersFIO" value="<?= $orders['full_name']?>">
                    <input type="hidden" name="ordersServ" value="<?= $orders['service']?>">
                    <input type="hidden" name="ordersOldStatus" value="<?= $orders['status']?>">
                    <div class="admin-wrap">
                        <div class="admin-label admin-label-left">
                            <label>Пользователь</label>
                        </div>
                        <select name="ordersUser" class="admin-input" required style="border: none; padding-right: 70px;">
                        <?php
                        $users = mysqli_query($connect, query:"SELECT * FROM `user`");
                        $users = mysqli_fetch_all($users);
                        {
                        ?>
                        <option value="<?= $orders['id_user'] ?>" style="background-color: #5A3A79;"><?= $orders['login'] ?></option>
                            <?php
                            foreach ($users as $user) {
                            echo "<option value='" . $user[0] . "'>" . $user[1] . "</option>";
                        }
                        ?>
                        <?php
                        }
                        ?>
                        </select>
                    </div>

                    <div class="admin-wrap">
                        <div class="admin-label">
                            <label>Услуга</label>
                        </div>
                        <select name="ordersService" class="admin-input" required style="border: none; padding-right: 30px;">
                            <?php
                            $services = mysqli_query($connect, query:"SELECT * FROM `service`");
                            $services = mysqli_fetch_all($services);
                            {
                            ?>
                            <option value="<?= $orders['id_service'] ?>" style="background-color: #5A3A79;"><?= $orders['service'] ?></option>
                                <?php
                                foreach ($services as $service) {
                                echo "<option value='" . $service[0] . "'>" . $service[1] . "</option>";
                            }
                            ?>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="admin-wrap">
                        <div class="admin-label">
                            <label>Цена</label>
                        </div>
                        <input type="number" name="ordersPrice" class="admin-input" required  value="<?= $orders['price']?>">
                    </div>

                    <div class="admin-wrap">
                        <div class="admin-label">
                            <label>Статус</label>
                        </div>
                        <select name="ordersStatus" class="admin-input" required style="border: none; padding-right: 70px;">
                            <option value="<?= $orders['status'] ?>" style="background-color: #5A3A79;"><?= $orders['status'] ?></option>
                            <option value="В обработке">В обработке</option>
                            <option value="Готов">Готов</option>
                            <option value="Выполнен">Выполнен</option>
                            <option value="Отменен">Отменен</option>
                        </select>
                    </div>

                    <div class="admin-wrap">
                        <div class="admin-label">
                            <label>Дата</label>
                        </div>
                        <input type="date" name="ordersDate" class="admin-input" required style="padding-bottom: 18px;" value="<?= $orders['date']?>">
                    </div>

                    <div class="admin-wrap">
                        <div class="admin-label">
                            <label>Время</label>
                        </div>
                        <input type="time" name="ordersTime" class="admin-input" required style="border: none; padding-bottom: 16px;" value="<?= $orders['time']?>">
                    </div>

                    <div class="admin-wrap">
                        <div class="admin-label admin-label-right">
                            <label>Адрес</label>
                        </div>
                        <input type="text" name="ordersAddress" class="admin-input" required  value="<?= $orders['address']?>">
                    </div>


                </div>
                <button type="submit" class="main-about-primex__button">Изменить</button>
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