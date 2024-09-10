<? require_once 'php/config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Услуги Primex</title>
</head>
<body>
    <header class="header-main">
        <div class="container">
            <div class="header-main__nav">
                <ul class="header-main__ul">
                    <li><a href="about-primex.php" class="li-inactive li-inactive-first">О КОМПАНИИ</a></li>

                    <li><a href="#" class="li-active">УСЛУГИ</a></li>

                    <li><a href="main.php" class="li-inactive"><img src="/img/logo-primex-menu.png" alt="Логотип Primex" ></a></li>

                    <li><a href="contacts.php" class="li-inactive">КОНТАКТЫ</a></li>

                    <li><a href="auth-reg.php" class="li-inactive li-inactive-last">ЛИЧНЫЙ КАБИНЕТ</a></li>

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
                            <form method="post">
                                <p class="calc-label"><span class="calc-num">1</span> Площадь помещения, кв.м</p>
                                <input type="number" placeholder="100" class="calc-input" name="Square" id="Square" oninput="calculate()">
                                <p class="calc-label"><span class="calc-num">2</span> Услуга</p>
                                <select required class="calc-drop" name="Service" oninput="calculate()" id="Service">
                                <?php
                                    $services = mysqli_query($connect, query:"SELECT * FROM `service`");
                                    $services = mysqli_fetch_all($services);
                                    {
                                    ?>
                                    <option class="personal-form__option" value="">-- Выберите услугу --</option>
                                            <?php
                                            foreach ($services as $service) {
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
                                </from>
                            <p class="calc-cost">Итоговая цена</p>
                            <div class="cost-box">
                                <p class="cost-font" id="result"></p>
                            </div>
                            <script>
                                function calculate() {
                                    var Square = document.getElementById("Square").value;
                                    var Service = document.getElementById("Service").value;
                                    var Time = document.getElementById("Time").value;
                                    var Day = document.getElementById("Day").value;
                                    var sum = Square * Service;
                                    var percent_decimal = Time / 100; 
                                    var percent_decimal_day = Day / 100; 
                                    var percent_amount = sum * percent_decimal; 
                                    var percent_amount_day = sum * percent_decimal_day;
                                    var result = sum + percent_amount + percent_amount_day; 
                                    document.getElementById("result").innerHTML = result;
                                }
                            </script>
                            <a class="calc_button" href="auth-reg.php">Заказать услугу</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


    </header>

    <main>
        <section class="services">
            <div class="container" style="min-height: 1100px;">
                <h1 class="title2">Услуги</h1>

                <div class="services__wrapper">
                    <div class="services__order">
                        <h3 class="title6">Оказание клининговых услуг 
                            <br>и эксплуатация зданий 
                            <br>и сооружений.</h3>

                        <p class="paragraph1">Компания ПРИМЕКС работает с 1991 года.</p>
                        <p class="paragraph1 paragraph1-services">За это время мы открыли подразделение по 
                            <br>обслуживанию ворсовых грязезащитных 
                            <br>покрытий, начали производство сотовых ГЗП, 
                            <br>открыли собственную лабораторию и начали 
                            <br>поставки продукции за рубеж.</p>
                        <p class="paragraph1 paragraph1-services" >В своей работе мы используем передовые 
                            <br>технологии, последние научные разработки, 
                            <br>самое современное оборудование и высоко 
                            <br>эффективные химические средства, в том 
                            <br>числе и собственного производства.</p>

                        <a class="services__button paragraph1" href="auth-reg.php">Заказать услугу</a>
                    </div>

                    <div class="services__catalog">
                        <div class="services__catalog-one">
                            <div class="services__one">  
                                <?php
                                    $services = mysqli_query($connect, query:"SELECT * FROM `service` WHERE `id_service` = 2");
                                    $services = mysqli_fetch_all($services);
                                    foreach ($services as $service) {
                                    ?>
                                        <h3 class="title7"><?= $service[1] ?></h3>
                                        <p class="paragraph2" style="max-width: 160px;"><?= $service[3] ?></p>
                                <?php
                                    }
                                ?>
                            </div>
                                <div class="services__two">
                                <?php
                                    $services = mysqli_query($connect, query:"SELECT * FROM `service` WHERE `id_service` = 3");
                                    $services = mysqli_fetch_all($services);
                                    foreach ($services as $service) {
                                    ?>
                                        <h3 class="title7"><?= $service[1] ?></h3>
                                        <p class="paragraph2" style="max-width: 180px;"><?= $service[3] ?></p>
                                <?php
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="services__catalog-two">
                            <div class="services__three">
                                <?php
                                    $services = mysqli_query($connect, query:"SELECT * FROM `service` WHERE `id_service` = 1");
                                    $services = mysqli_fetch_all($services);
                                    foreach ($services as $service) {
                                    ?>
                                        <h3 class="title7"><?= $service[1] ?></h3>
                                        <p class="paragraph2" style="max-width: 140px;"><?= $service[3] ?></p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="services__four">
                            <?php
                                    $services = mysqli_query($connect, query:"SELECT * FROM `service` WHERE `id_service` = 4");
                                    $services = mysqli_fetch_all($services);
                                    foreach ($services as $service) {
                                    ?>
                                        <h3 class="title7"><?= $service[1] ?></h3>
                                        <p class="paragraph2" style="max-width: 170px;"><?= $service[3] ?></p>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
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
    
                        <li><a href="#" class="li-inactive">УСЛУГИ</a></li>
    
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
    <script src="js/script2.js"></script>
</body>
</html>