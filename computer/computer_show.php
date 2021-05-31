<?php
error_reporting(E_ALL ^ E_WARNING); 

include_once("../server.php"); 
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");
include_once("../sale/cart_functions.php");





$cart = 0;    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ekici Computer SHOW</title>
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

                <div id="slogan">SLOGAN</div>
                
                <!--social media icons-->
                <div class="socialMedia">
                    <a href="https://www.facebook.com" target="_blank"><img class="mediaicon" src="../images/icons/facebook.png" alt=""></a>
                </div>
                <div class="socialMedia">
                    <a href="https://www.twitter.com" target="_blank"><img class="mediaicon" src="../images/icons/twitter.png" alt=""></a>
                </div>
                <div class="socialMedia">
                    <a href="https://www.instagram.com" target="_blank"><img class="mediaicon" src="../images/icons/instagram.png" alt=""></a>
                </div>
                
                
                
                
            </header>
            
            <nav id="menu-bar">
                <ul id="menu-list">
                    <li class="menu-element"><a class="menu-link" href="../index.php">Home</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">About Us</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">Best Computers</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">Compare Computers</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">USER</a></li>
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
            
            <article id="content" style="width: 100%;">
                
                <?php
                    $id = $_GET['id'];
                   
                    $sql = "SELECT * FROM computer WHERE computer_id=$id";
                    $result = $DBconn->query($sql);
                    $computer = new Computer();
                    $computerService = new ComputerManager();
                    $row = mysqli_fetch_assoc($result);
                    $computerService->connectionWithDBorForm($computer, $row);

                    
                ?>
                
                <div id="show_computer">
                    <div id="show_computer_img"></div>
                    <div id="show_computer_info">
                        
                        <table id="show_computer_attributes">
                            <tr class="show_computer_table_element"><th>Attribute</th><th>Value</th></tr>
                            
                            <tr class="show_computer_table_element"><td>ID</td><td><?php echo $computer->getID(); ?></td></tr>
                            <tr class="show_computer_table_element"><td>Name</td><td><?php echo $computer->getName(); ?></td></tr>
                            <tr class="show_computer_table_element"><td>Stock</td><td><?php echo $computer->getStock(); ?></td></tr>
                            <tr class="show_computer_table_element"><td>CPU</td><td><?php echo $computer->getCpu(); ?></td></tr>
                            <tr class="show_computer_table_element"><td>GPU</td><td><?php echo $computer->getGpu(); ?></td></tr>
                            <tr class="show_computer_table_element"><td>Ram</td><td><?php echo $computer->getRam(); ?></td></tr>
                            <tr class="show_computer_table_element"><td>Storage</td><td><?php echo $computer->getStorage(); ?></td></tr>
                            <tr class="show_computer_table_element"><td>Type</td><td><?php echo $computer->gettype(); ?></td></tr>
                            <tr class="show_computer_table_element"><td colspan="2"><a href="?add=<?php echo $computer->getID(); ?>">Add to CART</a></td></tr>
                            
                           
                            
                        </table>

                    </div>

                    <div id="show_price">
                        <div id="show_real_price">Real Price  : <?php echo $computer->getPrice(); ?></div>
                        <div id="show_discount">Discount Rate :<?php echo $computer->getDiscount(); ?></div>
                        <div id="show_price_after_discount">After Discount :<?php echo $computer->getPriceAfterDiscount(); ?></div>
                    </div>

                    <p>Description :</p>
                    <p><?php echo $computer->getDescription(); ?></p>

                    <div id="images">

                    <ul>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                        <li class="image_element"></li>
                    </ul>

                </div>
                </div>
                
                
                <?php
                //TODO : Cart operations
                
                //?ADD
                if(isset($_GET['add'])){
                    $id = $_GET['add'];
                    cart_add($id);
                }

                
                
                ?>

                
                
                <div id="comments">
                    
                <form action="comment.php" method="POST">
                    <input type="text" name="caption">
                    <select name="rate" id="" required>
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <textarea name="comment" id="" cols="30" rows="10"></textarea>

                    <input type="submit" value="Comment">
                </form>

                </div>

            </article>

            

            

            

            <footer id="footer">
                <a href="#">Home</a>|
                <a href="#">About Us</a> |
                <a href="#">Contact</a>
                <br>
                <p>All rights reserved</p>

            </footer>
            

        </div>
        <script src="../js/main.js" type="text/javascript"></script>
    </body>
    
</html>