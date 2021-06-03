<?php
include_once("../server.php");
include_once("../user/user.php");
include_once("../user/userService.php");
include_once("../user/userManager.php");
include_once("../user/user_cookie.php");

$user_id = $_GET['user_id'];

if(!$_POST){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer Add Address</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    
    <h2>Add Address</h2>

   
    <form action="" method="POST">
        
        Location : <input type="text" name="location"> <br> 
        
       
        <input type="submit" value="Submit"> <input type="reset" value="Reset">
    </form>

    
    
</body>
</html>

<?php }
else{
    $location = $_POST['location'];

    $sql = "INSERT INTO address (user_id, location) VALUES ('$user_id', '$location')";
    if($DBconn->query($sql) === TRUE){
        echo "Address added";
    }
    else{
        echo "Address add ERROR!";
    }


    header("Refresh: 3 ; url=../user/user_menu.php?user_id=$user_id");
}  

?>
