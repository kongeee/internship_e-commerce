<?php
error_reporting(E_ALL ^ E_WARNING); 

include_once("../server.php"); 
include_once("../computer/computer.php");
include_once("../computer/computerService.php");
include_once("../computer/computerManager.php");
include_once("../sale/cart_functions.php");




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
                    <li class="menu-element"><a class="menu-link" href="../computer/computer_deals.php">Best Computers</a></li>
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
            
            <article id="content" style="width: 99%; min-height: 200px">
                    <?php if(!isset($_GET['computer1'])){ ?>
                    <center>
                    <form action="" method="GET">
                        <select name="computer1" id="">

                            <?php
                            
                            $sql = "SELECT * FROM computer";
                            $result = $DBconn->query($sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $name = $row['name'];
                            
                                echo "<option value='$name'>$name</option>";
                            }?>
                        </select>
                        <select name="computer2" id="">

                            <?php
                            
                            $sql = "SELECT * FROM computer";
                            $result = $DBconn->query($sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $name = $row['name'];
                            
                                echo "<option value='$name'>$name</option>";
                            }?>
                        </select>
                            <br>
                        <input type="submit" value="Compare">
                    </form>
                    </center>
                    
                <?php }
                    else{
                    $computer1 = $_GET['computer1'];
                    $computer2 = $_GET['computer2'];

                    $sql = "SELECT * FROM computer WHERE name='$computer1'";
                    $result = $DBconn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                    $cpu1 = $row['cpu_bench'];
                    $gpu1 = $row['gpu_bench'];

                
                ?>
                  <div class="computer" style="left:350px; position:relative;">
                    <div class="computer_img"></div>
                    <div class="computer_info">
                        <ul id="computer-list">
                            <li><?php echo $row['name'] ?></li>
                            <li><?php echo $row['stock'] ?> in stock</li>
                            <li><?php echo $row['rate'] ?> rate</li>
                            <li><?php echo $row['cpu'] ?></li>
                            <li><?php echo $row['gpu'] ?></li>
                            <li><?php echo $row['ram'] ?></li>
                            <li><?php echo $row['storage'] ?></li>
                            <li class="price"><?php echo $row['price'] ?></li>
                            <li class="discount"><?php echo $row['discount'] ?>%</li>
                            <li><?php echo $computer->getPriceAfterDiscount(); ?></li>
                            <a href="?add=<?php echo $row['computer_id']; ?>">Add to Cart</a> | 
                            <a href="../computer/computer_show.php?id=<?php echo $row['computer_id']; ?>">More Detail</a>
                            


                        </ul>
                    </div>
                </div>
                <?php 

                    $sql = "SELECT * FROM computer WHERE name='$computer2'";
                    $result = $DBconn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                    $cpu2 = $row['cpu_bench'];
                    $gpu2 = $row['gpu_bench'];
                
                
                ?>
                <div class="computer" style="left:350px; position:relative;">
                    <div class="computer_img"></div>
                    <div class="computer_info">
                        <ul id="computer-list">
                            <li><?php echo $row['name'] ?></li>
                            <li><?php echo $row['stock'] ?> in stock</li>
                            <li><?php echo $row['rate'] ?> rate</li>
                            <li><?php echo $row['cpu'] ?></li>
                            <li><?php echo $row['gpu'] ?></li>
                            <li><?php echo $row['ram'] ?></li>
                            <li><?php echo $row['storage'] ?></li>
                            <li class="price"><?php echo $row['price'] ?></li>
                            <li class="discount"><?php echo $row['discount'] ?>%</li>
                            <li><?php echo $computer->getPriceAfterDiscount(); ?></li>
                            <a href="?add=<?php echo $row['computer_id']; ?>">Add to Cart</a> | 
                            <a href="../computer/computer_show.php?id=<?php echo $row['computer_id']; ?>">More Detail</a>
                            


                        </ul>
                    </div>
                </div>

                <div id="compare_result">
                    
                    <?php echo $cpu1>$cpu2 ? $computer1 : $computer2;
                    echo " has better CPU performance : " . comparePerformance($cpu1, $cpu2) . "<br>";
                    
                    echo $gpu1>$gpu2 ? $computer1 : $computer2;
                    echo " has better GPU performance : " . comparePerformance($gpu1, $gpu2);
                    ?>


                </div>

               <?php } ?>
                    

                



                

            </article>

            

            <footer id="footer">
                <a href="../index.php">Home</a>|
                <a href="../text/about_us.php">About Us</a> |
                <a href="#">Contact</a>
                <br>
                <p>All rights reserved</p>

            </footer>

            <?php
             if(isset($_GET['add'])){
                $id = $_GET['add'];
                cart_add($id);
            }

            function comparePerformance($value1, $value2){
                $better = $value1>$value2 ? $value1:$value2;
                $other = $value1<$value2 ? $value1:$value2;

                return ceil(($better-$other)/$other * 100) . " %";



                return $better . " %";
            
            }
            
            ?>
            


        </div>
        <script src="../js/main.js" type="text/javascript"></script>
    </body>
    
</html>