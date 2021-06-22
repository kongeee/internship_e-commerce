<?php
include("../server.php");
include_once("../user/user_cookie.php");

$computer_id = $_POST['computer_id'];
$user_id = $_POST['user_id'];
$caption = $_POST['caption'];
$rate = $_POST['rate'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comment (computer_id, user_id, caption, rate, comment) VALUES ('$computer_id', '$user_id', '$caption', '$rate', '$comment')";

if($DBconn->query($sql)){
    

    $totalRate = 0;
    $counter = 0;
    $sql = "SELECT * FROM comment WHERE computer_id='$computer_id'";
    $result = $DBconn->query($sql);
    while($row=mysqli_fetch_assoc($result)){
        $totalRate += $row['rate'];
        $counter++;
    }

    $rateResult = $totalRate / $counter;

    $sql = "UPDATE computer SET rate='$rateResult' WHERE computer_id = '$computer_id'";
    $DBconn->query($sql);
    header("location:../state/confirm.php");
}
else{
    header("location:../state/reject.php");
}

?>