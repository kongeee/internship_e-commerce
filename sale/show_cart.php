<?php 
include_once("../server.php");
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");

ob_start();
session_start();

$total = 0;
if(isset($_COOKIE['computer'])){//if computer cookie exists
   
    
   print_r($_COOKIE['computer']);
   echo "<br>";
            
    $computer = new Computer();
    $computerService = new ComputerManager();
    foreach($_COOKIE['computer'] as $id){
        $sql = "SELECT * FROM computer C WHERE C.computer_id = '$id'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['computer_id'];
        $computerService->connectionWithDBorForm($computer, $row);

        echo $row['name'];
        $total += $computer->getPriceAfterDiscount();

        echo "<a href='?delete=$id'>Delete from cart</a> <br>";
        
    }
    echo "Price = ".$total."<br>";

echo "<a href='?deleteall=true'>Delete all elements in the cart</a>";
}
else{
    echo "Cart is empty<br>";
}



if(isset($_GET['deleteall'])){
    print_r($_COOKIE['computer']);
    foreach($_COOKIE['computer'] as $id){
        setcookie('computer['.$id.']', "", time() - 3600, "/", $serverName);
        
    }
    header('Location:'.$_SERVER['HTTP_REFERER']);
}

if(isset($_GET['delete'])){

    setcookie('computer['.$_GET['delete'].']', "", time() - 3600, "/", $serverName);
    header('Location:'.$_SERVER['HTTP_REFERER']);
}

?>