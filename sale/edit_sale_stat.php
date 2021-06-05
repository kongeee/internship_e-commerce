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
    <?php if(isset($_GET)){ ?>
    <table id="sale_edit_table">
        <tr><th>Sale ID</th><th>User</th><th>Computers</th><th>Price</th><th>Address</th><th>State</th><th>Edit State</th></tr>
        <?php

        $sql = "SELECT * FROM sale S, user U, address A WHERE S.user_id=U.user_id AND S.address_id=A.address_id ORDER BY S.sale_id DESC";
        $result = $DBconn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
        ?>


            <tr id="row"><td><?php echo $row['sale_id']; ?></td><td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td><td><?php echo $row['computers']; ?></td><td><?php echo $row['price']; ?></td><td><?php echo $row['location']; ?></td><td class="state"><?php echo $row['state']; ?></td><td><a href="?sale_id=<?php echo $row['sale_id']; ?>">Edit</a></td></tr>
            <?php } ?>
    </table>

    <?php 
    }
    else{



    }
    
    ?>

   
<script>
    if(document.getElementByClassName("state").value == "preparing"){
        document.getElementById("row").style.backgroundColor = "red";
    }
</script>
    
</body>
</html>