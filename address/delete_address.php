<?php 
include_once("../server.php");

$address_id = $_GET['address_id'];

$sql = "DELETE FROM address WHERE address_id='$address_id'";
if($DBconn->query($sql) === TRUE){
    echo "Delete success";
}
else{
    echo "Delete ERROR!";
}


?>