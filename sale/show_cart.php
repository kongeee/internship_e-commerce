<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE); 

include_once("../server.php"); 
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");
include_once("../sale/cart_functions.php");





$total = 0;    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ekici Computer CART</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <meta name="description" content="A computer vendor that offers quality and cheap products">
        <meta name="keywords" content="Computer, PC, Laptop, CPU, RAM, HDD, SSD, motherboards, keyboard, mouse, graphic cards, power supply, computer cases, fans">
        <meta name="author" content="Furkan Ekici">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <!--CSS and JS connections-->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <link rel="stylesheet" href="../css/computer.css" type="text/css">
        <link rel="stylesheet" href="../css/sale.css" type="text/css">
        
        

    </head>

    <body>

        <!--container div contains all page elements-->
        <div id="container">
            <!--header contains logo and social media icons-->
            <header id="banner">
                
                <!--Logo div is here-->
                <div id="logo">
                    <a href="../index.php"><img id="logoimage" src="../images/logos/ekici-logo.png" alt="Logo"></a>
                </div>

                <div id="slogan">
                <?php 
                $sql = "SELECT * FROM text WHERE text_name='slogan'";
                $result = $DBconn->query($sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['text_content'];
                ?>
                </div>
                
                <!--social media icons-->
                <div class="socialMedia">
                    <a href="<?php 
                        $sql = "SELECT * FROM text WHERE text_name='facebook'";
                        $result = $DBconn->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['text_content'];
                        ?>" target="_blank"><img class="mediaicon" src="../images/icons/facebook.png" alt=""></a>
                </div>
                <div class="socialMedia">
                    <a href="<?php 
                $sql = "SELECT * FROM text WHERE text_name='twitter'";
                $result = $DBconn->query($sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['text_content'];
                ?>" target="_blank"><img class="mediaicon" src="../images/icons/twitter.png" alt=""></a>
                </div>
                <div class="socialMedia">
                    <a href="<?php 
                $sql = "SELECT * FROM text WHERE text_name='instagram'";
                $result = $DBconn->query($sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['text_content'];
                ?>" target="_blank"><img class="mediaicon" src="../images/icons/instagram.png" alt=""></a>
                </div>
                
                
                
                
            </header>
            
            <nav id="menu-bar">
                <ul id="menu-list">
                    <li class="menu-element"><a class="menu-link" href="../index.php">Home</a></li>
                    <li class="menu-element"><a class="menu-link" href="../text/about_us.php">About Us</a></li>
                    <li class="menu-element"><a class="menu-link" href="../computer/computer_deals.php">New Computers</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">Compare Computers</a></li>
                    <?php 
                    if(isset($_COOKIE['user'])){//if user is logged in
                       
                        $user_id = $_COOKIE['user'];
                        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
                        $result = $DBconn->query($sql);
                        $row = mysqli_fetch_assoc($result);

                    
                        echo "<li class='menu-element'><a class='menu-link' href='../user/user_menu.php'>" .$row['first_name']. " " . $row['last_name'] . "</a></li>";
                    }
                    
                    else{//if user is not logged in
                        echo "<li class='menu-element'><a class='menu-link' href='../user/userLogin.php'>USER</a></li>";
                        
                    }
                     ?>
                    <li class="menu-element"><a class="menu-link" href="../sale/show_cart.php?cart=true">CART(<?php 
                    
                    //?Number of computers in the cart
                    if(isset($_COOKIE['computer'])){
                        echo count($_COOKIE['computer']);
                    }else{
                        echo "0";
                    }
                    ?>)</a></li>
                    
                    
                    
                </ul>
                
                
            </nav>
            
            <article id="content" style="width: 99%; min-height:500px;">
                
                <?php if(isset($_COOKIE['computer'])){//if computer cookie exists ?>

                <table id="cart_table">
                    <tr><th>Image</th><th>Name</th><th>Stock</th><th>Price</th><th>Discount</th><th>Final Price</th><th>Delete From Cart</th></tr>

                    <?php
                    $computer = new Computer();
                    $computerService = new ComputerManager();
                    foreach($_COOKIE['computer'] as $id){
                        $sql = "SELECT * FROM computer C WHERE C.computer_id = '$id'";
                        $result = $DBconn->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        $id = $row['computer_id'];

                        //img
                        $img_paths = $computerService->getImages($id);

                        $computerService->connectionWithDBorForm($computer, $row);
                        $total += $computer->getPriceAfterDiscount();
                
                        echo "<tr><td><a href='../computer/computer_show.php?id=$id'><img src='..$img_paths[0]' alt='computer_img' width='100' height='100'></a></td><td>". $computer->getName() . "</td><td>". $computer->getStock() . "</td><td>". $computer->getPrice() . "</td><td>". $computer->getDiscount() . "%</td><td>". $computer->getPriceAfterDiscount() . "</td><td><a class='delete_cart' href='?delete=$id'>Delete from cart</a></td></tr>";
                        
                     } ?>

                   

                </table>

                <?php }else{
                            echo "Cart is empty<br>";
                        }
                    
                    echo "TOTAL PRICE = " . $total . " $<br><br>";
                    echo "<a class='delete_cart' href='?deleteall=true'>Delete all elements in the cart</a>";

                    
                ?>
                <br>

                <a class="buy" href="./sale.php">BUY</a>

            </article>

            

            <footer id="footer">
                <a href="../index.php">Home</a>|
                <a href="../text/about_us.php">About Us</a> |
                <a href="#">Contact</a>
                <br>
                <p>All rights reserved</p>

            </footer>

            <?php //delete and delete all operations
            if(isset($_GET['deleteall'])){
    
                cart_delete_all();
            }
            
            if(isset($_GET['delete'])){
                $id = $_GET['delete'];
                cart_delete($id);
                
            }
            
            ?>
            


        </div>
        <script src="../js/main.js" type="text/javascript"></script>
    </body>
    
</html>