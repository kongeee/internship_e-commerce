<?php
include_once("../server.php");
include_once("../user/user.php");
include_once("../user/userService.php");
include_once("../user/userManager.php");
include_once("../user/user_cookie.php");

$user_id = $_GET['user_id'];
$address_id = $_GET['address_id'];

$sql = "SELECT * FROM address WHERE address_id='$address_id'";
$result = $DBconn->query($sql);
$row = mysqli_fetch_assoc($result);

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
        <table id="edit2_address_table">
            
        <input type="text" name="location" value="<?php echo $row['location'] ?>"> <br> 
        
       
        <input class="form_button" type="submit" value="Submit"> <input class="form_button" type="reset" value="Reset">
        </table>
    </form>

    
    
    <a class="user-link" href="./delete_address.php?address_id=<?php echo $address_id ?>">Delete it</a>
    </center>

    <?php }
    else{
        $location = $_POST['location'];
        $sql = "UPDATE address SET location='$location' WHERE address_id='$address_id'";
        if($DBconn->query($sql) === TRUE){
            header("location:../state/confirm.php");
        }
        else{
            header("location:../state/reject.php");
        }

    
    }

?>

    
    
</body>
</html>


