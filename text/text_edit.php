<?php

include_once("../server.php"); 
include_once("../admin_panel/sessionAdmin.php");


if(isset($_GET['text'])){
    $text = $_GET['text'];

    $sql = "SELECT * FROM text WHERE text_name='$text'";
    $result = $DBconn->query($sql);
    $row = mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer Edit Text</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">
        

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="../css/sale.css">

        
        
</head>
<body>
    <center>

    <form action="" action="GET">
        <input type="hidden" name="text_id" value="<?php echo $row['text_id']; ?>">
        <textarea name="text_content" id="" cols="30" rows="10"><?php echo $row['text_content'] ?></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>

    </center>
    
</body>
</html>
<?php 

}
else{
    $content = $_GET['text_content'];
    $text_id = $_GET['text_id'];

    $sql = "UPDATE text SET text_content='$content' WHERE text_id='$text_id'";
    if($DBconn->query($sql) === TRUE){
        header("location:../state/confirm.php");
    }
    else{
        header("location:../state/reject.php");
    }
}
?>
