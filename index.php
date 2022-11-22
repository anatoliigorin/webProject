<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Блокнот</title>
  
  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Вход</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Регистрация</label>
		<div class="login-form">
			<form action="signIn.php" method="POST">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Логин</label>
					<input id="user" name="login" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Пароль</label>
					<input id="pass" type="password" name="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Войти">
				</div>
				<div class="hr"></div>
                
                <div class="error-msg">
                <label for="tab-2">
                    <?php
                    require 'db.php';
                    if(!empty($_POST))
                    {
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $table_name = "data";
                        $sqlLogin ="SELECT userIndex FROM $table_name WHERE userLogin = '$login';";
                        $resultLogin = $db->query($sqlLogin);
                        $valueLogin = $resultLogin->fetch_array();
                        if(!empty($valueLogin))
                        {
                            $sqlPassword ="SELECT userIndex FROM $table_name WHERE userLogin = '$login' AND userPassword = '$password';";
                            $resultPassword = $db->query($sqlPassword);
                            $valuePassword = $resultPassword->fetch_array();
                            if (!empty($valuePassword))
                            {
                                include 'page.php';
                            }
                            else
                            {
                            echo ("Пароль неправильный!");
                            }
                        }
                        else 
                            {
                            echo ("Такого пользователя не существует!");
                            }
                    }
                    ?></a>
                </div>
			</div>
		</form>
		<form action="new_user.php" method="POST">
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Введите логин</label>
					<input id="user" name="login" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Введите пароль</label>
					<input id="pass" name="password1" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Повторите пароль</label>
					<input id="pass" name="password2" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Зарегистрироваться">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Уже зарегистрированы?</a>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
  
  
</body>
</html>
