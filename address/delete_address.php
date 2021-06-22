<?php 
include_once("../server.php");

$address_id = $_GET['address_id'];

$sql = "DELETE FROM address WHERE address_id='$address_id'";
if($DBconn->query($sql) === TRUE){
    header("location:../state/confirm.php");
}
else{
    header("location:../state/reject.php");
}


?>