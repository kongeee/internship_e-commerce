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
    
    <h2>Edit Address</h2>

   
    <form action="" method="POST">
        
        Locations: <select name="location" id="">
            <?php while($row = mysqli_fetch_assoc($result)){
                $location = $row['location'];
                echo "<option value='$location'>$location</option>";
            } ?>
            
        </select> <br> 
        
       
        <input type="submit" value="Submit"> <input type="reset" value="Reset">
    </form>

    
    
</body>
</html>

<?php }
else{
    $location = $_POST['location'];

    $sql = "SELECT * FROM address WHERE location='$location'";
    if($DBconn->query($sql) === TRUE){
        echo "Address added";
    }
    else{
        echo "Address add ERROR!";
    }


    header("Refresh: 3 ; url=../user/user_menu.php?user_id=$user_id");
}  

?>
