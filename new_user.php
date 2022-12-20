<?php  
  require 'include/db.php';
  $lgn = $_POST['login'];
  $sql = "SELECT * FROM data WHERE userLogin = '$lgn';";  
  if ($_POST['login']=='' || $_POST['password1']=='' || $_POST['password2']=='')
  {
    include 'index.php';
    echo '<html><p align="center"><font color="red">Все поля должны быть заполнены</font></p></html>';
  }
  else if (@sizeof($db->query($sql)->fetch_array()) > 0)
  {
    include 'index.php';
    echo'<html><p align="center"><font color="red">Пользователь уже существует</font></p></html>';
  }
  else if ($_POST['password1'] == $_POST['password2'])
  {    
    $pswrd = $_POST['password1'];
    $pswrd = hash("sha256", $pswrd);
    include 'rand_generate.php';
    do
    {
        $genIndex = generate_index();
    }
    while (@sizeof($db->query("SELECT * FROM data WHERE userIndex = '$genIndex';")->fetch_array()) > 0);

    file_put_contents('data/' . $genIndex . '.txt', '');
    
    $sql = "INSERT INTO data VALUES ('$lgn', '$pswrd', '$genIndex');";
    $db->query($sql);

    include 'page.php';
  }
  else
  {
    include 'index.php';
    echo '<html><p align="center"><font color="red">Пароли не совпадают</font></p></html>';
  }
?>