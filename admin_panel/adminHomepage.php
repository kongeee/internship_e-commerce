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
        
        <tr><td><a href="../computer/computer_menu.php">Computer Menu</a></td></tr>
        <tr><td><a href="../text/text_edit.php?text=guide">Edit Buying Guide</a></td></tr>
        <tr><td><a href="../text/text_edit.php?text=facebook">Edit Facebook</a></td></tr>
        <tr><td><a href="../text/text_edit.php?text=twitter">Edit Twitter</a></td></tr>
        <tr><td><a href="../text/text_edit.php?text=instagram">Edit Instagram</a></td></tr>
        <tr><td><a href="../text/text_edit.php?text=slogan">Edit Slogan</a></td></tr>
        <tr><td><a href="../text/text_edit.php?text=aboutus">Edit About Us</a></td></tr>
        <tr><td><a href="../sale/edit_sale_stat.php">Edit Order Status</a></td></tr>
        
        <tr><td><a style="background-color: red;" href="safeExitAdmin.php">Safe Exit</a></td></tr>

    </table>
    
    
</body>
</html>