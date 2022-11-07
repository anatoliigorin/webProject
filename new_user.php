<?php
  require 'db.php';
  if (db->query("SELECT * FROM data WHERE userLogin = {$_POST['login']}"))
  {
    echo('Пользователь уже существует');
    include 'signUp.php';
  }
  else if ($_POST['password1'] == $_POST['password2'])
  {    
    include 'index_generator';
    $db->query("INSERT INTO data VALUES ({$_POST['login']}, {$_POST['password1']}, generate_index());");
  }
  else
  {
    echo('Пароли не совпадают');
    include 'signUp.php';
  }
?>
