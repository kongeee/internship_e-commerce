<?php 

include_once("../server.php");

ob_start();
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT *
        FROM user U
        WHERE U.email='$email' AND U.password=MD5('$password')";
$result = $DBconn->query($sql);
$row = mysqli_fetch_assoc($result);

if($email == $row['email'] && md5($password) == $row['password']){
    setcookie("user", $row['user_id'], time()+3600, "/", $serverName);
    header("Location:../index.php");
    

    
}else{
    header("Location:../sessionError.php");
}

?>

