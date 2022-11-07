<?php
  require 'db.php';
  $lgn = $_POST['login'];
  $sql = "SELECT * FROM data WHERE userLogin = '$lgn';";
  if (sizeof($db->query($sql)->fetch_array() > 0)
  {
    echo('Пользователь уже существует');
    include 'signUp.php';
  }
  else if ($_POST['password1'] == $_POST['password2'])
  {    
    $pswrd = $_POST['password1'];
    include 'index.php';
    include 'index_generator.php';
    $db->query("INSERT INTO data VALUES ('$lgn', '$pswrd', generate_index());");
  }
  else
  {
    echo('Пароли не совпадают');
    include 'signUp.php';
  }
?>
