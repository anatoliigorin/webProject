
<html>
    <form action="index.php">
        <div class="return-btn">
            <p>
                <button type="submit">Вернуться</button>
            </p>
        </div>
    </form>
    <form action="save.php" method="POST">
        <div class="login_label">
            <p><input type="text" name="login" value="<?php $lgn = $_POST['login']; echo $lgn; ?>" readonly /></p>
        </div>
        <div class="text_area">
            <p align="center"><textarea cols="200" maxlenght="10000" rows="50" name="data"><?php
                require 'db.php';
                $lgn = $_POST['login'];
                $sql = "SELECT userIndex FROM data WHERE userLogin = '$lgn';";
                $result = $db->query($sql)->fetch_array();
                $data = htmlentities(file_get_contents('data/' . $result[0] . '.txt'));
                echo $data;
            ?></textarea></p>
        </div>
        <div class="save_btn">
            <button type="submit">Сохранить</button>
        </div>
    </form>
</html>
