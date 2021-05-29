<?php 
include_once("../server.php");

foreach($_COOKIE['computer'] as $id){
    $sql = "SELECT * FROM computer C WHERE C.computer_id = '$id'";
    $result = $DBconn->query($sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['name']."<br>";
}

?>