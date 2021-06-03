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
    <title>Ekici Computer Admin Home Page</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    <h2>Welcome<?php 
        $user_id = $_COOKIE['user'];
        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);

        echo " " . $row['first_name'] . " " . $row['last_name'];
    ?>
    </h2>
    <table id="user_menu_table">
        <tr><td>Edit user informations</td><td><button>Edit</button></td></tr>
        <tr><td>Add address</td><td><button>Add address</button></td></tr>
        <tr><td>Edit Addresses</td><td><button>Edit Address</button></td></tr>
        <tr><td>Delete me</td><td><button>Delete</button></td></tr>
        <tr><td>Safe Exit</td><td><a href="./user_exit.php?user_id=<?php echo $user_id; ?>">Safe Exit</a></td></tr>

    </table>
    
    
</body>
</html>