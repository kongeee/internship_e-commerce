<?php

include_once("../server.php");
include_once("./user.php");
include_once("./userService.php");
include_once("./userManager.php");
include_once("./user_cookie.php");

if(!isset($_GET['cancel'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer Order</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    
    <table id="user_order_table">
        <tr><th>Sale ID</th><th>Computers</th><th>Price</th><th>State</th><th>Cancel</th></tr>
        <?php   
        $user_id = $_GET['user_id'];
        
        $sql = "SELECT * FROM sale WHERE user_id='$user_id' ORDER BY sale_id DESC";
        $result = $DBconn->query($sql);
        
        while($row = mysqli_fetch_assoc($result)){
           $cmptrs = explode(",", $row['computers']);
           foreach($cmptrs as $cmptr){
               $sql2 = "SELECT * FROM computer WHERE computer_id='$cmptr'";
               $result2 = $DBconn->query($sql2);
               $row2 = mysqli_fetch_assoc($result2);
               $computers = $row2['name'] . ",";
           }
           $computers = substr($computers, 0, -1);
        ?>
        
        <tr><td><?php echo $row['sale_id']; ?></td><td><?php echo $computers; ?></td><td><?php echo $row['price']; ?></td><td><?php echo $row['state']; ?></td>
            <td><?php if($row['state'] == "preparing"){
                $sale_id = $row['sale_id'];
                echo "<a href='?cancel=$sale_id'>Cancel</a>"; } ?></td></tr>

        <?php } ?>
    </table>
    <?php }
        else{   
            $sale_id = $_GET['cancel'];
            $sql = "SELECT * FROM sale WHERE sale_id='$sale_id'";
            $result = $DBconn->query($sql);
        
            $row = mysqli_fetch_assoc($result);
            $cmptrs = explode(",", $row['computers']);
            $sql = "DELETE FROM sale WHERE sale_id='$sale_id'";
            if($DBconn->query($sql) === TRUE){
                echo "Cancel";
                
                
                foreach($cmptrs as $cmptr){

                    $sql2 = "SELECT * FROM computer WHERE computer_id='$cmptr'";
                    $result2 = $DBconn->query($sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    
                    $stock = $row2['stock']+1;
                    
                    $sql = "UPDATE computer SET stock='$stock' WHERE computer_id='$cmptr'";
                    $DBconn->query($sql);
                }

             }
            
            else{
                echo "Cancel ERROR!";
            }
        }
        
    ?>
    
</body>
</html>