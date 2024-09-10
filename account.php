<? require_once 'php/config/connect.php'; //подключение к бд
?>
<?php
session_start(); //проверка на открытую сессию
if (!$_SESSION['user']) {
    header('Location: auth-reg.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Личный кабинет</title>
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
                <ul class="ul-button"> 
                    <button class="li-button">КАЛЬКУЛЯТОР</button>
                </ul>
            </div>   
            
            <div class="heading-calculater heading-calculater-close">
                <div class="calc_wrapper">
                    <div class="title-close">
                        <h4 class="title-calc">Примерный расчет стоимости</h4>
                        <button class="calc_close"><img src="img/x-close.png" alt="Закрыть">
                    </div>
                    <div class="calc-box">
                        <div class="calc-inputs">
                            
                                <p class="calc-label"><span class="calc-num">1</span> Площадь помещения, кв.м</p>
                                <input type="number" placeholder="100" class="calc-input" name="Square" id="Square" oninput="calculate()">
                                <p class="calc-label"><span class="calc-num">2</span> Услуга</p>
                                <select required class="calc-drop" name="Service" oninput="calculate()" id="Service">
                                <?php
                                    $services = mysqli_query($connect, query:"SELECT * FROM `service`"); //запрос на возвращение строк из таблицы услуг
                                    $services = mysqli_fetch_all($services);
                                    {
                                    ?>
                                    <option class="personal-form__option" value="">-- Выберите услугу --</option>
                                            <?php
                                            foreach ($services as $service) { //массив на вывод услуг в выпадающем списке
                                            echo "<option class=\"personal-form__option\" value='" . $service[2] . "'>" . $service[1] . "</option>";
                                        }
                                        ?>
                                        <?php
                                        }
                                        ?>
                                </select>
                                <p class="calc-label"><span class="calc-num">3</span> Время</p>
                                <select name="Time" class="calc-drop" style="margin-bottom: 0px;"required oninput="calculate()" id="Time">
                                    <option value="" class="personal-form__option">--Выберите время--</option>
                                    <option value="1" class="personal-form__option">Утро (9:00-12:00)</option>
                                    <option value="5" class="personal-form__option">День (13:00-16:00)</option>
                                    <option value="10" class="personal-form__option">Вечер (17:00-20:00)</option>
                                </select>
                            
                        </div>
                        <div class="calc-price">
                            <p class="calc-label"><span class="calc-num">4</span> День</p>
                                <select name="Day" class="calc-drop" required oninput="calculate()" id="Day">
                                    <option value="" class="personal-form__option">--Выберите день--</option>
                                    <option value="" class="personal-form__option">Будний день</option>
                                    <option value="5" class="personal-form__option">Выходной день</option>
                                </select>
                                <input type="submit" style="display: none;">
                           
                            <p class="calc-cost">Итоговая цена</p>
                            <div class="cost-box">
                                <p class="cost-font" id="result"></p>
                            </div>
                            <script>
                                function calculate() {
                                    var Square = document.getElementById("Square").value; //запись элементов html в переменные по id
                                    var Service = document.getElementById("Service").value;
                                    var Time = document.getElementById("Time").value;
                                    var Day = document.getElementById("Day").value;
                                    var sum = Square * Service; //далее идут переменные для расчета примерной стоимости калькулятора
                                    var percent_decimal = Time / 100; 
                                    var percent_decimal_day = Day / 100; 
                                    var percent_amount = sum * percent_decimal; 
                                    var percent_amount_day = sum * percent_decimal_day;
                                    var result = sum + percent_amount + percent_amount_day; 
                                    document.getElementById("result").innerHTML = result; //вывод конечной стоимости 
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


    </header>
    <main>
        <section class="info">
            <div class="container">
                <div class="logout">
                    <h1 class="title2 logout-title">Личный кабинет</h1>
                    <a href="php/config/logout.php" class="logout-button"><img src="img/logout.png" alt="Выход"></a>
                </div>

                <div class="personal-info">
                    <div style="display:flex; justify-content: space-between; align-items: center;">
                    <h2 class="title9">Личная информация</h2>
                        <!-- вывод id пользователя из сессии -->
                <a class="personal-info__button" href="account-user-update.php?id=<?= $_SESSION['user']['id_user'] ?>">Изменить</a> 
                        </div>

                    <div class="personal-info__wrapper">
                        <div class="personal-info__input">
                            <h3 class="title10">Логин</h3>
                        <!-- вывод логина пользователя из сессии -->
                                <p class="account-input2"><?= $_SESSION['user']['login'] ?></p>

                        </div>
                        <div class="personal-info__input">
                            <h3 class="title10">Email</h3>
                        <!-- вывод почты пользователя из сессии -->
                                <p class="account-input2"><?= $_SESSION['user']['email'] ?></p>

                        </div>

                    </div>

                    <div class="personal-info__wrapper">
                        <div class="personal-info__input">
                            <h3 class="title10">Телефон</h3>
                        <!-- вывод телефона пользователя из сессии -->
                                <p class="account-input2"><?= $_SESSION['user']['telephone'] ?></p>

                        </div>
                        <div class="personal-info__input">

                            <div class="personal-info__input-last">
                                <h3 class="title10">ФИО</h3>
                        <!-- вывод фио пользователя из сессии -->
                                    <p class="account-input2"><?= $_SESSION['user']['full_name'] ?></p>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="personal-orders">
            <div class="container">
                <h1 class="title2">История заказов</h1>
                <?php
                    //запрос на возврат строк из таблицы заказы где id пользователя = id пользователя из сессии
                    $orders = mysqli_query($connect, query:"SELECT orders.id_orders, user.login, service.service, orders.price, orders.status, orders.date, orders.time, orders.address 
                    FROM orders 
                    JOIN user on orders.id_user=user.id_user 
                    JOIN service ON orders.id_service=service.id_service WHERE user.id_user = '" . $_SESSION['user']['id_user'] . "'");
                    if (mysqli_num_rows($orders) == 0) { //если строки = 0
                        echo '<p class="title10">Вы еще не сделали заказ</p>';
                    } else { //в другом случае вывести все строки
                        $orders = mysqli_fetch_all($orders);
                        

                        
                    
                ?>
                <div class="personal-orders__wrapper">
                    <div class="personal-orders__attribute">
                        <div class="personal-orders__name-atr1">
                            <h3 class="title11">Номер</h3>
                        </div>
                        <?php
                            foreach ($orders as $order) { //массив на вывод id заказов
                            echo '<div class="personal-orders__atr"><p class="account-atr1">' . $order[0] . '</p></div>';
                        }
                        ?>

                    </div>

                    <div class="personal-orders__attribute">
                        <div class="personal-orders__name-atr2">
                            <h3 class="title11">Услуга</h3>
                        </div>
                        <?php
                            foreach ($orders as $order) { //массив на вывод услуг в заказах
                            echo '<div class="personal-orders__atr"><p class="account-atr2">' . $order[2] . '</p></div>';
                        }
                        ?>
                    </div>

                    <div class="personal-orders__attribute">
                        <div class="personal-orders__name-atr3">
                            <h3 class="title11">Стоимость</h3>
                        </div>
                        <?php
                            foreach ($orders as $order) { //массив на вывод стоимости заказов
                            echo '<div class="personal-orders__atr"><p class="account-atr3">' . $order[3] . '</p></div>';
                        }
                        ?>
                    </div>

                    <div class="personal-orders__attribute">
                        <div class="personal-orders__name-atr4">
                            <h3 class="title11">Статус</h3>
                        </div>
                        <?php
                            foreach ($orders as $order) { //массив на вывод статусов заказов
                            echo '<div class="personal-orders__atr"><p class="account-atr4">' . $order[4] . '</p></div>';
                        }
                        ?>
                    </div>

                    <div class="personal-orders__attribute">
                        <div class="personal-orders__name-atr5">
                            <h3 class="title11">Дата уборки</h3>
                        </div>
                        <?php
                            foreach ($orders as $order) { //массив на вывод даты уборки заказов
                            echo '<div class="personal-orders__atr"><p class="account-atr5">' . $order[5] . '</p></div>';
                        }
                        ?>
                    </div>

                    <div class="personal-orders__attribute">
                        <div class="personal-orders__name-atr6">
                            <h3 class="title11 title11-1">Время</h3>
                        </div>
                        <?php
                            foreach ($orders as $order) { //массив на вывод времени уборки заказов
                            echo '<div class="personal-orders__atr"><p class="account-atr6">' . $order[6] . '</p></div>';
                        }
                        ?>
                    </div>

                    <div class="personal-orders__attribute-last">
                        <div class="personal-orders__name-atr7">
                            <h3 class="title11">Адрес</h3>
                        </div>
                        <?php
                            foreach ($orders as $order) { //массив на вывод адресов заказов
                            echo '<div class="personal-orders__atr"><p class="account-atr7">' . $order[7] . '</p></div>';
                        }
                        ?>
                    </div>
                </div>
                <?php
                    }
                
                
                ?>
            </div>
        </section>

        <section class="personal-form">
            <div class="container">
                <h1 class="title2">Сделать заказ</h1>

                <div class="personal-form__wrapper">
                    <h2 class="title9">Оставить заявку</h2>
                    
                    <form action="/php/create/create-message.php" method="post">
                        <div class="personal-form__inputs">
                            <div class="personal-form__service-address">
                                <h3 class="title10">Услуга</h3>
                                <!-- вывод переменных из сессии -->
                                <input type="hidden" name="userId" value="<?= $_SESSION['user']['id_user'] ?>"> 
                                <input type="hidden" name="userEmail" value="<?= $_SESSION['user']['email'] ?>">
                                <input type="hidden" name="userFIO" value="<?= $_SESSION['user']['full_name'] ?>">
                                <select name="messageService" class="personal-form__dropdown account-input" required>
                                    <?php
                                    $services = mysqli_query($connect, query:"SELECT * FROM `service`");
                                    $services = mysqli_fetch_all($services);
                                    {
                                    ?>
                                    <option class="personal-form__option" value="">-- Выберите услугу --</option>
                                        <?php
                                        foreach ($services as $service) {
                                        echo "<option class=\"personal-form__option\" value='" . $service[0] . "'>" . $service[1] . "</option>";
                                    }
                                    ?>
                                    <?php
                                    }
                                    ?>
                                </select>

                                <h3 class="title10">Адрес уборки</h3>

                                <input type="text" class="account-input personal-form__address" placeholder="Ваш адрес" name="messageAddress" required>
                            </div>

                            <div class="personal-form__textarea">
                                <h3 class="title10">Комментарий к заказу</h3>

                                <div class="personal-form__comment-button">
                                    <textarea name="messageComment" class="personal-form__comment account-input" placeholder="Нужно вымыть окна" required></textarea>
                                </div>

                            </div>

                            <div class="personal-form__button-text">
                                <h3 class="title10">Желаемое время</h3>
                                <select name="messageTime" class="personal-form__dropdown account-input" required>
                                    <option value="" class="personal-form__option">--Выберите время--</option>
                                    <option value="Утро (9:00-12:00)" class="personal-form__option">Утро (9:00-12:00)</option>
                                    <option value="День (13:00-16:00)" class="personal-form__option">День (13:00-16:00)</option>
                                    <option value="Вечер (17:00-20:00)" class="personal-form__option">Вечер (17:00-20:00)</option>
                                </select>
                                <h3 class="title10">Желаемая дата</h3>
                                <input type="date" class="account-input personal-form__address" placeholder="Дата" name="messageDate" required>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <input type="submit" value="Отправить" name="form-button" class="personal-form__button">
                            <p class="account-paragraph">Оператор свяжется с вами в течение 10 минут</p>
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
    <script src="js/script2.js"></script>
</body>
</html>