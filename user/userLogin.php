<?php

ob_start();

if(!isset($_COOKIE['user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer User Login</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    
    <h2>Login</h2>
    
    <form action="user_check.php" method="POST">
        E mail :<input type="email" name="email"> <br>
        Password : <input type="password" name="password"> <br>
        <input type="submit" value="Submit"> <input type="reset" value="Reset">
    </form>

    <a href="./userRegister.php">Register</a>
    
    
</body>
</html>

<?php }else{

    echo "Alreadey log in";
} ?>