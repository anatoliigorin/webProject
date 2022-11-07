<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Регистрация</title>
    </head>
    <body>
        <h1 align="center">Регистрация пользователя</h1>
        <form action="new_user.php" method="post">
            <p align="center"><input type="text" name="login" placeholder="Введите логин" size="28" /></p>
            <p align="center"><input type="password" name="password1" placeholder="Введите пароль" size="28" /></p>
            <p align="center"><input type="password" name="password2" placeholder="Пароль еще раз" size="28" /></p>
            <p align="center"><button type="submit">Зарегистрироваться</button></p>            
        </form>
        <form action="index.php">
            <p align="center"><button type="submit">Вернуться на главную страницу</button></p>
        </form>
    </body>
</html>
