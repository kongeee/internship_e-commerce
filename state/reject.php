<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer Delete Img</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <style type="text/css">

            body{
                background-color: #12232E;
            }

            #confirm_message{
                color: red;
                font-size: 36px;
            }
        </style>
</head>
<body>

    <center>
    
        <p id="confirm_message">Process is not done</p>
        <br>
        
        <img src="../images/icons/reject.png" alt="#" width="250" height="250">
    </center>


    <?php 
    
        $previous_page = $_SERVER['HTTP_REFERER'];
        header("Refresh: 3; url=$previous_page");

    ?>
    
</body>
</html>