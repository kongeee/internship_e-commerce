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
    <title>Ekici Computer EDIT</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/computer.css">
</head>
<body>

    <?php if(!isset($_FILES['files'])){ ?>
    <center>
    <form action="" method="POST" enctype="multipart/form-data" >
        <input required name="files[]" id="upfile" multiple="multiple" type="file" value="upload" /> <br>
        <input class="form_button" type="submit" value="Add">

    </form>
    </center>

    <?php }else{


            $destination = "../images/computers/";
            $size = count($_FILES['files']['name']);
            $computer_id = $_GET['id'];

            for($i=0 ; $i<$size ; $i++){
                $fileDestination = $destination . basename($_FILES['files']['name'][$i]);
                $result = move_uploaded_file($_FILES['files']['tmp_name'][$i], $fileDestination);


                $fileDestination = substr($fileDestination, 2);
                $sql = "INSERT INTO image (computer_id, path) VALUES ('$computer_id', '$fileDestination')";
                if($DBconn->query($sql) === TRUE && $result){
                    header("location:../state/confirm.php");

                }
                else{
                    header("location:../state/reject.php");
                }
                
            }

           
    } ?>
    
</body>
</html>

    

