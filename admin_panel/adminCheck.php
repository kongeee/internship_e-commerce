<?php include_once("../server.php");

ob_start();
session_start();

$adminName = $_POST["adminName"];
$adminPassword = $_POST["adminPassword"];

$sql = "SELECT A.name, A.password
        FROM admin A
        WHERE A.name='$adminName' AND A.password=MD5('$adminPassword')
        ";

$result = $DBconn->query($sql);
$row = mysqli_fetch_assoc($result);

if($adminName == $row["name"] && md5($adminPassword) == $row["password"]){
    $_SESSION["login"] = true;
    $_SESSION["name"] = $adminName;
    $_SESSION["password"] = md5($adminPassword);

    header('Location:adminHomepage.php');
}else{

    
    header('Location:../sessionError.php'); 
}

?>

