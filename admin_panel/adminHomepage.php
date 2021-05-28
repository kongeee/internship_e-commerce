<?php
include_once("../server.php");
include_once("sessionAdmin.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer Admin Home Page</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
    <table id="adminProcessTable">
        <tr><th class="process_header">Processes</th></tr>
        
        <tr><td><a href="../computer/computer_add.php">Create New Computer</a></td></tr>
        <tr><td><a href="#">Create New Discount</a></td></tr>
        <tr><td><a href="#">Create New Admin</a></td></tr>
        <tr><td><a href="#">Edit Computer</a></td></tr>
        <tr><td><a href="#">Edit Buying Guide</a></td></tr>
        <tr><td><a href="#">Edit Facebook</a></td></tr>
        <tr><td><a href="#">Edit Twitter</a></td></tr>
        <tr><td><a href="#">Edit Instagram</a></td></tr>
        <tr><td><a href="#">Edit Slogan</a></td></tr>
        <tr><td><a href="#">Edit About Us</a></td></tr>
        <tr><td><a href="#">Edit Sale Status</a></td></tr>
        <tr><td><a href="#">Delete Product</a></td></tr>
        <tr><td><a style="background-color: red;" href="safeExitAdmin.php">Safe Exit</a></td></tr>

    </table>
    
    
</body>
</html>