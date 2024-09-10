<? require_once 'php/config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Primex</title>
</head>
<body>
    <header class="header-main">
        <div class="container">
            <div class="header-main__nav">
                <ul class="header-main__ul">
                    <li><a href="about-primex.php" class="li-inactive li-inactive-first">О КОМПАНИИ</a></li>

                    <li><a href="services.php" class="li-inactive">УСЛУГИ</a></li>

                    <li><a href="#" class="li-inactive"><img src="/img/logo-primex-menu.png" alt="Логотип Primex" ></a></li>

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
        <section class="main-text">
            <div class="container">
                <p class="main-text__div"><span style="font-family: RalewayBold;">PRIMEX </span> оказывает услуги по уборке помещений <br>
                    <span style="font-family: RalewayBold;">на протяжении 27 лет</span></p>
            </div>
        </section>

        <section class="why-us">
            <div class="container">
                <h1 class="title1">Почему нас выбирают?</h1>

                <div class="why-us__wrapper">
                    <div class="why-us__left">
                        <img src="img/circle1.png" alt="27 лет">
                        <p class="paragraph1 why-us__paragraph why-us__paragraph-left">Оказание услуг по профессиональной уборке и <br>эксплуатации зданий с 1991 года</p>
                    </div>
                    <div class="why-us__right">
                        <p class="paragraph1 why-us__paragraph why-us__paragraph-right">Оказание клининговых услуг в соответствии со <br>стандартом качества ISO 9001:2014</p>
                        <img src="img/circle2.png" alt="Медаль">
                    </div>
                </div>
                <div class="why-us__wrapper">
                    <div class="why-us__left">
                        <img src="img/circle3.png" alt="Средство для уборки">
                        <p class="paragraph1 why-us__paragraph why-us__paragraph-left">Собственное производство грязезащитных <br>покрытий и химических средств для клининга</p>
                    </div>
                    <div class="why-us__right">
                        <p class="paragraph1 why-us__paragraph why-us__paragraph-right">Приемлемые цены</p>
                        <img src="img/circle4.png" alt="Монетки">
                    </div>
                </div>
                <div class="why-us__wrapper">
                    <div class="why-us__left">
                        <img src="img/circle5.png" alt="Персонал">
                        <p class="paragraph1 why-us__paragraph why-us__paragraph-left">Постоянное обучение линейного персонала в <br>собственном учебном центре</p>
                    </div>
                    <div class="why-us__right">
                        <p class="paragraph1 why-us__paragraph why-us__paragraph-right">Членство в СРО "Ассоциация клининовых и <br>фасилити операторов" АКФО</p>
                        <img src="img/circle6.png" alt="Офис">
                    </div>
                </div>
            </div>
        </section>

        <section class="main-about-primex">
            <div class="container">
                <h1 class="title1">Профессиональные клининговые услуги <br>для дома и офиса</h1>

                <div class="main-about-primex__wrapper">
                    <img src="img/cleaning-window.png" alt="Мойка окон" style="box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.50);">
                    <div class="main-about-primex__text">
                        <h3 class="title3 main-about-primex__text-space"><span style="color: #8960AF;">Идеальная чистота</span> в помещении любого размера <br>и назначения, <span style="color: #8960AF;">без вашего участия и переплат.</span> <br>Закажите клининговые услуги в компании <br><span style="color: #8960AF;">«Примекс»</span> и убедитесь в том, что это реально!</h3>
                        <p class="paragraph1 main-about-primex__text-space">Начиная с 1991-го года, мы берем на себя все вопросы, связанные с <br>созданием и поддержанием идеальной чистоты в помещении <br>жилого, офисного, производственного, любого другого назначения. 
                        <br><br>Результатами работы специалистов «Примекс» становится <br>настоящая чистота. А вы, ваши близкие, сотрудники, клиенты, <br>партнеры или гости не просто видите, а ощущаете ее.</p>
                        <a href="services.php" class="main-about-primex__button">Узнать больше</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="main-partners">
            <div class="container">
                <h1 class="title1">Наши клиенты</h1>
                <div class="main-partners-imgs">
                    <img src="/img/partner1.png" alt="Логотип Планета Суши" class="main-partners-img">
                    <img src="/img/partner2.png" alt="Логотип ФНС" class="main-partners-img">
                    <img src="/img/partner3.png" alt="Логотип Метро" class="main-partners-img">
                    <img src="/img/partner4.png" alt="Логотип SATORI CAPITAL" class="main-partners-img">
                    <img src="/img/partner5.png" alt="Логотип ПИК группа" class="main-partners-img">
                    <img src="/img/partner6.png" alt="Логотип Аэрофлот" class="main-partners-img">
                    <img src="/img/partner7.png" alt="Логотип ВТБ" class="main-partners-img">
                    <img src="/img/partner8.png" alt="Логотип РЖД">
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