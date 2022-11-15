
<html>
    <form action="index.php">
        <p>
            <button type="submit">Вернуться</button>
        </p>
    </form>
    <form action="save.php" method="POST">
    <p align="center"><textarea cols="200" maxlenght="10000" rows="50" name="data">
        <?php
        require 'db.php';
        $lgn = $_POST['login'];
        $sql = "SELECT userIndex FROM data WHERE userLogin = '$lgn';";
        $result = $db->query($sql)->fetch_array();
        $data = file_get_contents('data/' . $result[0] . '.txt');
        echo $data;
    ?></textarea></p>
    <button type="submit">Сохранить</button>
    </form>
</html>
