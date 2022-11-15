
<html>
    <form action="index.php">
        <p>
            <button type="submit">Вернуться</button>
        </p>
    </form>
    <form action="save.php" method="POST">
        <p><input type="text" name="login" value="<?php $lgn = $_POST['login']; echo $lgn; ?>" readonly /></p>
        <p align="center"><textarea cols="200" maxlenght="10000" rows="50" name="data"><?php
            require 'db.php';
            $lgn = $_POST['login'];
            $sql = "SELECT userIndex FROM data WHERE userLogin = '$lgn';";
            $result = $db->query($sql)->fetch_array();
            $data = htmlentities(file_get_contents('data/' . $result[0] . '.txt'));
            echo $data;
        ?></textarea></p>
        <button type="submit">Сохранить</button>
    </form>
</html>
