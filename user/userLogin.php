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
    <center>
    <h2>Login</h2>
    
    <form action="user_check.php" method="POST">
        <table>
       <tr> <td class="text">E mail</td><td><input type="email" name="email"></td> </tr>
        <tr><td class="text">Password</td><td><input type="password" name="password"></td> </tr>
        <tr><td><input class="form_button" type="submit" value="Submit"></td> <td><input class="form_button" type="reset" value="Reset"></td></tr>
        </table>
    </form>

    <a class="user-link" href="./userRegister.php">Register</a>
    
    </center>
</body>
</html>

<?php }else{

    header("location:../state/reject.php");
} ?>