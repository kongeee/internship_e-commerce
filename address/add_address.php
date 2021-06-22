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
    <center>
    <h2 class="header2">Add Address</h2>

   
    <form action="" method="POST">

        <table id="add_address_table">
            <tr><td class="text">Location :</td><td><input type="text" name="location"></td></tr>
            <tr style='text-align:center'><td colspan="2"><input class="form_button" type="submit" value="Submit"><input class="form_button" type="reset" value="Reset"></td></tr>

        </table>
        
    </form>

    </center>
    
</body>
</html>

<?php }
else{
    $location = $_POST['location'];

    $sql = "INSERT INTO address (user_id, location) VALUES ('$user_id', '$location')";
    if($DBconn->query($sql) === TRUE){
        header("location:../state/confirm.php");
    }
    else{
        header("location:../state/reject.php");
    }


    
}  

?>
