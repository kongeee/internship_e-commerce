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
    
    <h2>Edit Address</h2>

   
    <form action="" method="POST">
        
            
        <input type="text" name="location" value="<?php echo $row['location'] ?>"> <br> 
        
       
        <input type="submit" value="Submit"> <input type="reset" value="Reset">
    </form>
    
    <a href="./delete_address.php?address_id=<?php echo $address_id ?>">Delete it</a>

    <?php }
    else{
        $location = $_POST['location'];
        $sql = "UPDATE address SET location='$location' WHERE address_id='$address_id'";
        if($DBconn->query($sql) === TRUE){
            echo "Edit Successful";
        }
        else{
            echo "Edit ERROR";
        }

    
    }

?>

    
    
</body>
</html>


