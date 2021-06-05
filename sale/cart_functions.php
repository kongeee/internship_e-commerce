<?php

include_once("../server.php");
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");

ob_start();


$computer = new Computer();
$computerService = new ComputerManager();

function cart_add($id){
    global $DBconn, $computer, $computerService, $serverName;

    $sql = "SELECT * FROM computer C WHERE C.computer_id='$id'";
    $result = $DBconn->query($sql);
    $row = mysqli_fetch_assoc($result);

    $computerService->connectionWithDBorForm($computer, $row);

    if($computer->getStock() > 0 && !$_COOKIE['computer'][$id]){ //if in stock and not added to cart
        $computer->setStock($computer->getStock() - 1);
        
        $newStock = $computer->getStock();
        $sql = "UPDATE computer SET stock=$newStock WHERE computer_id='$id'";
        $DBconn->query($sql);
        setcookie('computer['.$id.']', $id, time() + 3600, "/", $serverName);
        

    }
    
    header('Location:'.$_SERVER['HTTP_REFERER']);//go to last page
    

}

function cart_delete($id){
    global $DBconn, $computer, $computerService, $serverName;

    $sql = "SELECT * FROM computer WHERE computer_id=$id";
    $result = $DBconn->query($sql);
    $row = mysqli_fetch_assoc($result);

    $computerService->connectionWithDBorForm($computer, $row);
    $computer->setStock($computer->getStock() + 1);

    $newStock = $computer->getStock();
    $sql = "UPDATE computer SET stock=$newStock WHERE computer_id=$id";
    $DBconn->query($sql);

    setcookie('computer['.$id.']', $id, time() - 3600, "/", $serverName);
    header('Location:'.$_SERVER['HTTP_REFERER']);//go to last page

}

function cart_delete_all(){
    global $DBconn, $computer, $computerService, $serverName;

    foreach($_COOKIE['computer'] as $id){
        $sql = "SELECT * FROM computer WHERE computer_id=$id";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);

        $computerService->connectionWithDBorForm($computer, $row);
        $computer->setStock($computer->getStock() + 1);

        $newStock = $computer->getStock();
        $sql = "UPDATE computer SET stock=$newStock WHERE computer_id=$id";
        $DBconn->query($sql);


        setcookie('computer['.$id.']', "", time() - 3600, "/", $serverName);
        
    }
    header('Location:'.$_SERVER['HTTP_REFERER']);

}

function buy_cart(){//Same as cart_delete_all but the number of products is not increased

    global $DBconn, $computer, $computerService, $serverName;

    foreach($_COOKIE['computer'] as $id){
        $sql = "SELECT * FROM computer WHERE computer_id=$id";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);

        $computerService->connectionWithDBorForm($computer, $row);
        

        $newStock = $computer->getStock();
        $sql = "UPDATE computer SET stock=$newStock WHERE computer_id=$id";
        $DBconn->query($sql);


        setcookie('computer['.$id.']', "", time() - 3600, "/", $serverName);
        
    }
    header('Location:'.$_SERVER['HTTP_REFERER']);

}


?>