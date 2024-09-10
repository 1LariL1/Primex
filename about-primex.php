<? require_once 'php/config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title> О Primex</title>
</head>
<body>
    <header class="header-main">
        <div class="container">
            <div class="header-main__nav">
                <ul class="header-main__ul">
                    <li><a href="#" class="li-active li-inactive-first">О КОМПАНИИ</a></li>

                    <li><a href="services.php" class="li-inactive">УСЛУГИ</a></li>

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
        <section class="about-primex-block">
            <div class="container">
                <h1 class="title2">О компании</h1>

                <div class="about-primex-block__wrapper">
                    <div class="about-primex-block__two-blocks">
                        <div class="about-primex-block__first-block">
                            <h4 class="title4">32 года</h4>
                            <p class="paragraph1 paragraph1-center">оказываем клининговые услуги</p>
                        </div>

                        <div class="about-primex-block__second-block">
                            <h4 class="title4">Собственное подразделение</h4>
                            <p class="paragraph1 paragraph1-center">по обслуживанию ворсовых <br>грязезащитных покрытий</p>
                        </div>
                    </div>

                    <div class="about-primex-block__tech">
                        <h4 class="title4">Современные технологии</h4>
                        <p class="paragraph1 paragraph1-center">адаптированные к российским 
                            <br>условиям уборки, а также самое 
                            <br>современное оборудование, богатый 
                            <br>опыт работы и 
                            <br>высококвалифицированный персонал. </p>
                    </div>

                    <img src="img/about-primex-photo1.png" alt="Сотрудник PRIMEX">
                </div>

                <div class="about-primex-block__wrapper">
                    <img src="img/about-primex-photo2.png" alt="Сотрудник PRIMEX">
                    <div class="about-primex-block__sert">
                        <h4 class="title4">Сертификат СМК ISO 9001:2008</h4>
                        <p class="paragraph1 paragraph1-center">который "Примекс" первой среди 
                            <br>отечественных клининовых компаний 
                            <br>получил от норвежского 
                            <br>сертификационного общества DNV в 
                            <br>апреле 2003 года.</p>
                    </div>

                    <div class="about-primex-block__security">
                        <h4 class="title4">Страховая защита</h4>
                        <p class="paragraph1 paragraph1-center">клининговых услуг, а также рисков 
                            <br>клиентов, связанных с клининговой 
                            <br>деятельностью.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-primex-achievements">
            <div class="container">
                <h1 class="title1">Наши достижения</h1>

                <div class="about-primex-achievements__wrapper">
                    <div class="about-primex-achievements__text">
                        <img src="/img/achievement-photo1.png" alt="Сотрудник PRIMEX" class="about-primex-achievements__photo1">
                        <h2 class="title5">В 2005 году</h2>
                        <p class="paragraph1 about-primex-achievements__text-bottom">клининговая компания "ПРИМЕКС" <span class="paragraph1-purple-bold">признана лучшей компанией на 
                            <br>потребительском рынке России и награждена национальной премией 
                            <br>"Золотой Бренд"</span> в номинации "Инновационный, эффективный и 
                            <br>устойчивый бренд на потребительском рынке России".</p>
                        <h2 class="title5">В 2007 году</h2>
                        <p class="paragraph1 about-primex-achievements__text-bottom">компания получила звание <span class="paragraph1-purple-bold">"Лидер клининговых услуг в России".</span></p>
                        <h2 class="title5">В 2008 году</h2>
                        <p class="paragraph1"><span class="paragraph1-purple-bold">журнал «Forbes» </span>выделил франшизу «ПРИМЕКС» <span class="paragraph1-purple-bold">в число пяти лучших 
                            <br>франшиз России в сфере производства и услуг.</span> При отборе лучших 
                            <br>франшиз журнал опирался на четыре критерия: перспективность рынка 
                            <br>клининговых услуг, стаж успешной работы, пакет услуг по поддержке 
                            <br>бизнеса, открытость для потенциальных партнеров информации об 
                            <br>экономике собственного предприятия и об уже действующих франчайзи.</p>

                    </div>

                    <div class="about-primex-achievements__text">
                        <h2 class="title5">В 2003 году</h2>
                        <p class="paragraph1 about-primex-achievements__text-bottom">за вклад в развитие новой клининговой индустрии в России, за внедрение 
                            <br>современных технологий по уборке, созданию импортозамещающей 
                            <br>продукции, уникальных экологически чистых материалов, поддержание 
                            <br>репутации российского поставщика клининговых услуг, соответствующих 
                            <br>мировым стандартам качества, личный вклад руководителя предприятия 
                            <br><span class="paragraph1-purple-bold">Рябичева Ю.В. в создание Ассоциации Русских Уборочных Компаний</span> и 
                            <br>развитие клининга как отрасли в России, компании «ПРИМЕКС» первой среди 
                            <br>клининговых компаний присуждено <span class="paragraph1-purple-bold">звание лауреата премии «Российский 
                            <br>Национальный Олимп».</span></p>
                        <h2 class="title5">В 2003 году</h2>
                        <p class="paragraph1">"ПРИМЕКС" начал развитие <span class="paragraph1-purple-bold">собственной филиальной сети в России</span> и 
                            <br><span class="paragraph1-purple-bold">распространение системы менеджмента качества в области клининга на 
                            <br>основе франчайзинга.</span></p>
                        <img src="/img/achievement-photo2.png" alt="Сотрудник PRIMEX" class="about-primex-achievements__photo2">
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
                        <li><a href="#" class="li-inactive">О КОМПАНИИ</a></li>
    
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