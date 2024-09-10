<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Primex | Войти в аккаунт</title>
</head>
<body class="auth-bg">
    <header class="auth-reg-header">

            <div class="heading__login">
                <div class="heading__wrapper">

                    <div class="photo__form">
                        <img src="img/auth-reg-photo.png" class="photo__form-settings" alt="Средства для уборки">
                    </div>

                    <div class="login__form">
                        <div class="form__buttons">
                            <p class="form__p">Вход</p>
                            <button class="form__reg">Регистрация</button>
                        </div>

                        <h3 class="login__h3">Добро пожаловать!</h3>
                        <p class="login__p">Войдите, чтобы продолжить</p>

                        <!-- форма авторизации -->
                        <form class="login__input" method="POST" action="php/config/sign-in.php"> 
                            <input type="text" id="loginInput" name="login" class="input__login" placeholder="Логин" required>
                            <input type="password" id="passwordInput" name="password" class="input__password" placeholder="Пароль" required>
                            <input type="submit" id="3"  class="login__button" value="Войти"> 
                        </form> 

                        <button class="login__reg">Нет аккаунта? Зарегистрироваться</button>
                    </div>

                </div>
            </div>

            <div class="heading__reg">
                <div class="heading__wrapper-reg">

                    <div class="photo__form">
                        <img src="img/auth-reg-photo.png" class="photo__form-settings" alt="Средства для уборки">
                    </div>

                    <div class="reg__form">
                        <div class="form__buttons">
                            <button class="form__log">Вход</button>
                            <p class="form__p-reg">Регистрация</p>
                        </div>

                        <h3 class="reg__h3">Добро пожаловать!</h3>
                        <p class="reg__p">Зарегистируйтесь, чтобы продолжить</p>

                        <!-- форма регистрации -->
                        <form class="reg__input" method="POST" action="php/config/sign-up.php">
                            <input type="email" id="emailInputReg" name="email" class="input__email-reg" placeholder="Email" required>
                            <input type="text" id="loginInput" name="login" class="input__login-reg" placeholder="Логин" required>
                            <input type="password" id="passRegInput" name="password" class="input__password-reg" placeholder="Пароль" required minlength="8">
                            <!-- капча -->
                            <div class="g-recaptcha" data-sitekey="6LeJ5cYoAAAAAGBZW9D_lPJyx-ovlP5q1U2DQnl5" style="margin-top: 54px;"></div> 
                            <input type="submit" id="8"  class="reg__button" value="Создать аккаунт" name="REG-BUT-SUBMIT"> 
                        </form> 

                        <button class="reg__login">У меня уже есть аккаунт</button>
                    </div>
                </div>
            </div>
    </header>

    <script src="js/script.js"></script>
</body>
</html>