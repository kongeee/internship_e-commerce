<?php

include_once("../server.php");
include_once("../admin_panel/sessionAdmin.php");


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
    <?php if(!isset($_GET['sale_id']) && !isset($_GET['stat'])){ ?>
    <center>
    <table id="sale_edit_table">
        <tr><th>Sale ID</th><th>User</th><th>Computers</th><th>Price</th><th>Address</th><th>State</th><th>Edit State</th></tr>
        <?php

        $sql = "SELECT * FROM sale S, user U, address A WHERE S.user_id=U.user_id AND S.address_id=A.address_id ORDER BY S.sale_id DESC";
        $result = $DBconn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
        ?>


            <tr id="row"><td><?php echo $row['sale_id']; ?></td><td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td><td><?php echo $row['computers']; ?></td><td><?php echo $row['price']; ?></td><td><?php echo $row['location']; ?></td><td class="state"><?php echo $row['state']; ?></td><td><a class="edit" href="?sale_id=<?php echo $row['sale_id']; ?>">Edit</a></td></tr>
            <?php } ?>
    </table>
    </center>
    <?php 
    }
    else{

        $sale_id = $_GET['sale_id'];

        if(isset($_GET['stat'])){
            $stat = $_GET['stat'];

            $sql = "UPDATE sale SET state='$stat' WHERE sale_id='$sale_id'";
            if($result = $DBconn->query($sql)){
                header("location:../state/confirm.php");
            }
            else{
                header("location:../state/reject.php");
            }

            

        }
        else{
        ?>
            <center>
            <h2>Change Order Stat</h2>
            <form action="" method="GET">
                <input name="sale_id" type="hidden" value="<?php echo $sale_id; ?>">
                <select name="stat" id="">
                    <option value="preparing">preparing</option>
                    <option value="cargo">cargo</option>
                    <option value="delivered">delivered</option>
                </select>

                <input type="submit" value="Edit">
            </form>
            </center>
            
        <?php }

    }
    
    ?>

   
    
</body>
</html>