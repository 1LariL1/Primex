<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Вход в административную панель</title>
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
                            <p class="form__p">Административная панель</p>
                        </div>

                        <h3 class="login__h3">Добро пожаловать!</h3>
                        <p class="login__p">Войдите, чтобы продолжить</p>

                        <form class="login__input" method="POST" action="php/config/admin-sign-in.php">
                            <input type="text" id="loginInput" name="login" class="input__login" placeholder="Логин" required>
                            <input type="password" id="passwordInput" name="password" class="input__password" placeholder="Пароль" required>
                            <input type="submit" id="3"  class="login__button" value="Войти"> 
                        </form> 
                    </div>

                </div>
            </div>
    </header>
</body>
</html>