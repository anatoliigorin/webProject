<?php
  require 'db.php';
  $lgn = $_POST['login'];
  $sql = "SELECT * FROM data WHERE userLogin = '$lgn';";
  if (@sizeof($db->query($sql)->fetch_array()) > 0)
  {
    echo('Пользователь уже существует');
    include 'signUp.php';
  }
  else if ($_POST['password1'] == $_POST['password2'])
  {    
    $pswrd = $_POST['password1'];
    include 'rand_generate.php';
    include 'index.php';
    do{
        $genIndex = generate_index();
    } while (@sizeof($db->query("SELECT * FROM data WHERE userIndex = '$genIndex';")->fetch_array()) > 0);
    
    $sql = "INSERT INTO data VALUES ('$lgn', '$pswrd', '$genIndex');";
    $db->query($sql);
  }
  else
  {
    echo '<html><p align="center"><font color="red">Пароли не совпадают</font></p></html>';
    include 'signUp.php';
  }
?>
