<?php 
include_once("../server.php");
include_once("./user_cookie.php");


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    setcookie("user", $id, time()-3600, "/", $serverName);
    header("Location:../index.php");

}
else{
    echo "Error";
}
?>