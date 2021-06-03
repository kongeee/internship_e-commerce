<?php 

include_once("../server.php");

if(isset($_POST)){

    $e_mail = $_POST['e_mail'];
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user U WHERE U.email='$e_mail'";
    $result = $DBconn->query($sql);
    $row = mysqli_fetch_assoc($result);
    
    if($row['email']){
        echo "This e mail already exists";
        header("location:".$_SERVER['HTTP_REFERER']);

    }
    else{
        $sql = "INSERT INTO user (email, first_name, last_name, password)
        VALUES($e_mail, $first, $last, $password)";

        $DBconn->query($sql);

        echo "AAA";
    }


    echo "<p style='text-align: center;'>Registiration is complete</p>";
}

else{
    ;
}


?>

