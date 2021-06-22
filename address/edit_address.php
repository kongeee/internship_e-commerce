<?php
include_once("../server.php");
include_once("../user/user.php");
include_once("../user/userService.php");
include_once("../user/userManager.php");
include_once("../user/user_cookie.php");

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM address WHERE user_id='$user_id'";
$result = $DBconn->query($sql);


if(!$_POST){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer Edit</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    <center>
    <h2 class="header2">Edit Address</h2>

    
   
    <form action="" method="POST">
        
        <table id="edit_address_table">
            <tr><td class="text">Locations: </td> <td><select name="location" id="">
            <?php while($row = mysqli_fetch_assoc($result)){
                $location = $row['location'];
                echo "<option value='$location'>$location</option>";
            } ?>
            
        </select></td></tr>
        
        
       
        <tr><td colspan="2"><input class="form_button" type="submit" value="Submit"> <input class="form_button" type="reset" value="Reset"></td></tr>
        </table>

    </form>
    </center>
    

    <?php }
    else{
        $location = $_POST['location'];
        $sql = "SELECT * FROM address WHERE location='$location'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);

        $address_id = $row['address_id'];
        header("Location:./edit2_address.php?user_id=$user_id&address_id=$address_id");
    
    }

?>

    
    
</body>
</html>


