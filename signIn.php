
<?php
    require 'db.php';
    if(!empty($_POST))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];        
        $password = hash("sha256", $password);
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
                include 'index.php';
                echo '<html><p align="center"><font color="red">Неправильный пароль</font></p></html>';
            }
        }
        else
        {
            include 'index.php';
            echo '<html><p align="center"><font color="red">Логин не введен</font></p></html>';
        }
    }    
?>