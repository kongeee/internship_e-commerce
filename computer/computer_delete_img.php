
<?php 

include_once("../server.php");
include_once("../admin_panel/sessionAdmin.php");
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer Delete Img</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/computer.css">
</head>
<body>
    
    
    <?php

        if(!isset($_GET['delete_complete'])){

            $computer_id = $_GET['id'];
            $sql = "SELECT * FROM image WHERE computer_id='$computer_id'";
            $result = $DBconn->query($sql);
            while($row = mysqli_fetch_assoc($result)){
                $path = $row['path']; 
                ?>
                <div class='delete_img_card'>
                    <img src="..<?php echo $path; ?>" alt="#" height="200" width="200"><br>
                    <a class="computer-link link-red" href="./computer_delete_img.php?delete_complete=<?php echo $row['img_id'] ?>">Delete</a>
                </div>

                <?php
            }
        }
        else{
            $img_id = $_GET['delete_complete'];
            $sql = "DELETE FROM image WHERE img_id='$img_id'";
            if($result = $DBconn->query($sql) === TRUE){
                header("location:../state/confirm.php");

            }
            else{
                header("location:../state/reject.php");
            }
            


        }

    ?>

    
    
    
</body>
</html>