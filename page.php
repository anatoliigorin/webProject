<!DOCTYPE html>
<html>
    <head> 
        <link rel="stylesheet" href="css/style2.css">
        <title>Блокнот</title> 
        <style>
            .text-area
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
            .save-btn
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>        
    </head>

    <body>
        <form action="index.php">
            <p>
                <button class="return-btn" type="submit">Вернуться</button>
            </p> 
        </form>       
        <p align="left">
            <textarea class="text-area" cols="50" maxlenght="10000" rows="10" id="txtArea">
                <?php
                    require 'db.php';
                    $lgn = $_POST['login'];
                    $sql = "SELECT userIndex FROM data WHERE userLogin = '$lgn';";
                    $result = $db->query($sql)->fetch_array();
                    $data = htmlspecialchars(file_get_contents('data/' . $result[0] . '.txt'));                               
                    echo $data;
                ?>
            </textarea>
        </p>
        <button id="saveButton" class="save-btn">Сохранить</button>    
        <script>
            var data = <?php echo json_encode($_POST) ?>;
            document.getElementById("saveButton").addEventListener("click", function() {sendToSave(data["login"]);}, false);

            function sendToSave(loginValue)
            {   
                var dataValue = document.getElementById("txtArea").value;
                $.ajax({
                    method: "POST",  
                    url: "save.php",
                    data: {
                        data: dataValue,                        
                        login: loginValue
                    }                                       
                })                    
            }
        </script>
    </body>
</html>
