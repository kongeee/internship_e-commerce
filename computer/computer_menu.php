
<?php include_once("../admin_panel/sessionAdmin.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ekici Computer MENU</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <link rel="stylesheet" href="../css/computer.css">
</head>
<body>
    
<center>
    
    <h1>Computer Menu</h1>
    <h2>Edit</h2>
    <form action="computer_edit.php" method="GET">
        
            
            Computer ID :<input name="id" type="text">
            <input class="form_button" type="submit" value="Get it">
        
    </form>
        <h2>Add</h2>
        <span id="add_text">Add a new computer</span> <br>
        <a href="./computer_add.php"><img id="add_img" src="../images/icons/add.png" alt="add.png" width="25" height="25"></a>

        </center>
    
    
</body>
</html>