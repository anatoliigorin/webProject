<?php  
  require 'include/db.php';
  
  $data = $_POST["data"];
  $lgn = $_POST["login"];
  $sql = "SELECT userIndex FROM data WHERE userLogin = '$lgn';";
  $result = $db->query($sql)->fetch_array();
  file_put_contents('data/' . $result[0] . '.txt', $data);
?>