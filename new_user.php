<?php
  require 'db.php';
  $lgn = $_POST['login'];
  if (db->query("SELECT * FROM data WHERE userLogin = '$lgn'"))
  {
    echo('Пользователь уже существует');
    include 'signUp.php';
  }
  else if ($_POST['password1'] == $_POST['password2'])
  {    
    $pswrd = $_POST['password1'];
    include 'index_generator';
    $db->query("INSERT INTO data VALUES ('$lgn', '$pswrd', generate_index());");
  }
  else
  {
    echo('Пароли не совпадают');
    include 'signUp.php';
  }
?>
