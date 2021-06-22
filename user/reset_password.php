<?php
include_once("../server.php");
include_once("../user/user.php");
include_once("../user/userService.php");
include_once("../user/userManager.php");
include_once("../user/user_cookie.php");

$user_id = $_GET['user_id'];
$user = new User();

$userService = new UserManager();

 
$sql="SELECT * FROM user WHERE user_id='$user_id'";
$result = $DBconn->query($sql);
$row = mysqli_fetch_assoc($result);


$userService->connectionWithDBorForm($user, $row);
if(!$_POST){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer Reset Password</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    
    <h2>Reset Password</h2>

   
    <form action="" method="POST">
        
        New Password : <input type="password" name="pass1"> <br> 
        New Password(Again) : <input type="password" name="pass2"> <br>
       
        <input type="submit" value="Submit"> <input type="reset" value="Reset">
    </form>

    
    
</body>
</html>

<?php }
else{
    if($_POST['pass1'] == $_POST['pass2']){
       
        echo $userService->resetPassword($user, $_POST['pass1']);
    }
    else{
        header("location:../state/reject.php");
    }
    header("Refresh: 3 ; url=user_edit.php?user_id=$user_id");
}  

?>
