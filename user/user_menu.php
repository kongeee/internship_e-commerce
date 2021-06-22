<?php

include_once("../server.php");
include_once("./user.php");
include_once("./userService.php");
include_once("./userManager.php");
include_once("./user_cookie.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer User Menu</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    <center>
    <h2>Welcome<?php 
        $user_id = $_COOKIE['user'];
        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);

        echo " " . $row['first_name'] . " " . $row['last_name'];
    ?>
    </h2>
    
    <table id="user_menu_table">
        <tr><td class="text">Edit user informations</td><td><a class="user-link" href="./user_edit.php?user_id=<?php echo $user_id; ?>">Edit</a></td></tr>
        <tr><td class="text">Show orders</td><td><a class="user-link" href="./user_order.php?user_id=<?php echo $user_id; ?>">Orders</a></td></tr>
        <tr><td class="text">Add address</td><td><a class="user-link" href="../address/add_address.php?user_id=<?php echo $user_id; ?>">Add Address</a></td></tr>
        <tr><td class="text">Edit Addresses</td><td><a class="user-link" href="../address/edit_address.php?user_id=<?php echo $user_id; ?>">Edit Address</a></td></tr>
        <tr><td class="text">Delete me</td><td><a class="user-link" href="./user_delete.php?user_id=<?php echo $user_id; ?>">Delete</a></td></tr>
        <tr><td class="text">Safe Exit</td><td><a class="user-link" href="./user_exit.php?user_id=<?php echo $user_id; ?>">Safe Exit</a></td></tr>

    </table>
    </center>
    
    
</body>
</html>