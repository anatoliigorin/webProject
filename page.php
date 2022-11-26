<html>
    <head> 
        <link rel="stylesheet" href="css/style2.css">
        <title>Блокнот</title> 
        <style>
            .comment
            {
                border: 3px solid #000000;
                color: #ffffff;
                font-size: 48px;
                margin:.3em;
                padding:.5em;
                transition:all .5s;
                border-radius: 48px;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
                background:#3A4454;
                background:-moz-linear-gradient(45deg,#3A4454 0,#53637A 100%);
                background:-webkit-gradient(left bottom,right top,color-stop(0,#3A4454),color-stop(100%,#53637A));
                background:-webkit-linear-gradient(45deg,#3A4454 0,#53637A 100%);
                background:-o-linear-gradient(45deg,#3A4454 0,#53637A 100%);
                background:-ms-linear-gradient(45deg,#3A4454 0,#53637A 100%);
                background:linear-gradient(45deg,#3A4454 0,#53637A 100%);

            }
            .return-btn
            {
                font-size: 24px;
                border-radius: 48px;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
                background:#ffc107;
                background:-moz-linear-gradient(45deg,#ffc107 0,#ff5722 100%);
                background:-webkit-gradient(left bottom,right top,color-stop(0,#ffc107),color-stop(100%,#ff5722));
                background:-webkit-linear-gradient(45deg,#ffc107 0,#ff5722 100%);
                background:-o-linear-gradient(45deg,#ffc107 0,#ff5722 100%);
                background:-ms-linear-gradient(45deg,#ffc107 0,#ff5722 100%);
                background:linear-gradient(45deg,#ffc107 0,#ff5722 100%);
                display:inline-block;
                margin:.5em;
                padding:.5em;
                transition:all .5s;
                filter:hue-rotate(0);color:#FFF;
                text-decoration:none
            }
            .save_btn
            {
                font-size: 24px;
                border-radius: 48px;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
                background:#ffc107;
                background:-moz-linear-gradient(45deg,#499bea 0,#1abc9c 100%);
                background:-webkit-gradient(left bottom,right top,color-stop(0,#499bea),color-stop(100%,#1abc9c));
                background:-webkit-linear-gradient(45deg,#499bea 0,#1abc9c 100%);
                background:-o-linear-gradient(45deg,#499bea 0,#1abc9c 100%);
                background:-ms-linear-gradient(45deg,#499bea 0,#1abc9c 100%);
                background:linear-gradient(45deg,#499bea 0,#1abc9c 100%);
                display:inline-block;
                margin:.5em;
                padding:.5em;
                transition:all .5s;
                filter:hue-rotate(0);color:#FFF;
                text-decoration:none
            }
            .to-hide
            {
                display: none;
            }
        </style>
    </head>

    <body>
        <form action="index.php">
            <p>
                <button class="return-btn" type="submit">Вернуться</button>
            </p>
        </form>
        <form action="save.php" method="POST">
            <p><input type="text" class="to-hide" name="login" value="<?php $lgn = $_POST['login']; echo $lgn; ?>" readonly /></p>
            <p align="left">
                <textarea class="comment" cols="50" maxlenght="10000" rows="10" name="data">
                    <?php
                        require 'db.php';
                        $lgn = $_POST['login'];
                        $sql = "SELECT userIndex FROM data WHERE userLogin = '$lgn';";
                        $result = $db->query($sql)->fetch_array();
                        $data = htmlentities(file_get_contents('data/' . $result[0] . '.txt'));
                        echo $data;
                    ?>
                </textarea>
            </p>
            <button class="save_btn" type="submit">Сохранить</button>
        </form>
    </body>
</html>
