<?php

include_once("../server.php"); 
include_once("../sale/cart_functions.php");
include_once("../user/user_cookie.php");
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");
include_once("./cart_functions.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer Edit Order</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">
        

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="../css/sale.css">

        
        
</head>
<body>
<?php

if(isset($_GET['sale'])){
    $total = 0;
    $computers = "";

    $computer = new Computer();
    $computerService = new ComputerManager();
    foreach($_COOKIE['computer'] as $id){
        $sql = "SELECT * FROM computer C WHERE C.computer_id = '$id'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['computer_id'];
        $computers = $computers . $id . ",";
        $computerService->connectionWithDBorForm($computer, $row);
        $total += $computer->getPriceAfterDiscount();
    }

    $computers = substr($computers, 0, -1); //remove the last element

    $user_id = $_COOKIE['user'];
    $address_id = $_GET['address_id'];


    $sql = "INSERT INTO sale (computers, user_id, price, state, address_id) VALUES ('$computers', '$user_id', '$total', 'preparing', '$address_id')";
    if($DBconn->query($sql) === TRUE){
        
        buy_cart();
        header("location:../state/confirm.php");

    }
    else{
        header("location:../state/reject.php");
    }
}
else{
    $user_id = $_COOKIE['user'];
    $sql = "SELECT * FROM address WHERE user_id='$user_id'";
    $result = $DBconn->query($sql);

    echo "<center><h3>Select Address</h3>";
    echo "<form action='' method='GET'><select name='address' id='address'>";
    while($row = mysqli_fetch_assoc($result)){
        $location = $row['location'];
        $address_id = $row['address_id'];
        
        echo "<option value=$address_id>$location</option>";
    }
    echo "</select>";

    echo "<br><input type='submit' value='BUY'></form>";
    echo "<a class='edit' href='../address/add_address.php?user_id=$user_id'>ADD address </a>";

    echo "</center>";
    
    if(isset($_GET['address'])){
        header("Location:" . "?sale=true&address_id=" . $address_id);
    }
}

?>
    

    
</body>
</html>

