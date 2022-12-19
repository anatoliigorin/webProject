<!DOCTYPE html>
<html>
    <head> 
        <link rel="stylesheet" href="css/pageStyle.css">
        <title>Блокнот</title>       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>        
    </head>

    <body class="body">
        <form action="../index.php">
            <p>
                <button class="return-btn" type="submit">Вернуться</button>
            </p> 
        </form>       
        <p align="left">
            <textarea class="text-area" cols="50" maxlenght="10000" rows="10" id="txtArea"><?php                
                require '../include/db.php';
                $lgn = $_POST['login'];
                $sql = "SELECT userIndex FROM data WHERE userLogin = '$lgn';";
                $result = $db->query($sql)->fetch_array();
                $data = htmlspecialchars(file_get_contents('data/' . $result[0] . '.txt'));                               
                echo $data;                
            ?></textarea>
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