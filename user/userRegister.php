<?php
include_once("../server.php");
include_once("./user.php");
include_once("./userService.php");
include_once("./userManager.php");

if(!$_POST){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer User Register</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    <center>
    <h2>Register</h2>

    <form action="" method="POST">
        <table>
            <tr><td class="text">E mail</td><td><input type="email" name="email"></td></tr>
            <tr><td class="text">First name</td><td><input type="text" name="first_name"></td></tr>
            <tr><td class="text">Last name</td><td><input type="text" name="last_name"></td></tr>
            <tr><td class="text">Password</td><td><input type="password" name="password"></td></tr>
            <tr><td><input class="form_button" type="submit" value="Submit"></td><td><input class="form_button" type="reset" value="Reset"></td></tr>
         
        </table>
    </form>
    
    </center>
</body>
</html>

<?php 
}else{

    $user = new User();
    $userService = new UserManager();

    $userService->connectionWithDBorForm($user, $_POST);
    $userService->add($user);
}




?>