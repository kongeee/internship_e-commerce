<?php

include_once("../server.php"); 
include_once("../sale/cart_functions.php");
include_once("../user/user_cookie.php");
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");

$total = 0;
$computers = "";

$computer = new Computer();
$computerService = new ComputerManager();
foreach($_COOKIE['computer'] as $id){
    $sql = "SELECT * FROM computer C WHERE C.computer_id = '$id'";
    $result = $DBconn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['computer_id'];
    $computers = $computers . $id . ",";
    $computerService->connectionWithDBorForm($computer, $row);
    $total += $computer->getPriceAfterDiscount();
}

$computers = substr($computers, 0, -1); //remove the last element

$user_id = $_COOKIE['user'];


$sql = "INSERT INTO sale (computers, user_id, price, state) VALUES ('$computers', '$user_id', '$total', 'preparing')";
if($DBconn->query($sql) === TRUE){
    echo "sale confirmed";
}
else{
    echo "sale ERROR!";
}


?>