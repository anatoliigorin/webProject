<?php
require 'db.php';
    

    if(!empty($_POST))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $table_name = "data";
        $sql ="SELECT userIndex FROM $table_name WHERE userLogin = '$login' AND userPassword = '$password';";
	    $result = $db->query($sql);
        $value = $result->fetch_array();
            echo $value[0];
        
    }
?>
<html>
    <form action="index.php">
        <p>
            <button type="submit">Вернуться</button>
        </p>
    </form>

</html>
