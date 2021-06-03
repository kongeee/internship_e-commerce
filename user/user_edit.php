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
    <title>Ekici Computer User Edit</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    
    <h2>Edit</h2>

    <?php
    
    $sql="SELECT * FROM user WHERE user_id='$user_id'";
    $result = $DBconn->query($sql);
    $row = mysqli_fetch_assoc($result);

    ?>
    
    <form action="" method="POST">
        E mail :<input type="email" name="email" value=<?php echo $row['email']; ?>> <br>
        First name : <input type="text" name="first_name" value=<?php echo $row['first_name']; ?>> <br>
        Last name : <input type="text" name="last_name" value=<?php echo $row['last_name']; ?>> <br>
       
        <input type="submit" value="Submit"> <input type="reset" value="Reset">
    </form>

    <a href="./reset_password.php?user_id=<?php echo $user_id; ?>">Reset password</a>

   
    
    
</body>
</html>

<?php
}else{
    echo $userService->edit($user, $user_id, $_POST['email'], $_POST['first_name'], $_POST['last_name']);
    header("Refresh: 3 ; url=user_edit.php?user_id=$user_id");
}
?>
