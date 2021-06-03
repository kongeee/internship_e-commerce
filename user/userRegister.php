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
    <h2>Register</h2>

    <form action="" method="POST">
        E mail :<input type="email" name="email"> <br>
        First name : <input type="text" name="first_name"> <br>
        Last name : <input type="text" name="last_name"> <br>
        Password : <input type="password" name="password"> <br>
        <input type="submit" value="Submit"> <input type="reset" value="Reset">
    </form>
    
    
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