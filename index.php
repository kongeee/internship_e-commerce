<?php
include_once "server.php"; 
ob_start();
$cart = 0;    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ekici Computer</title>
        <meta http-equiv="Content-Type" content = "text/html">
        <meta http-equiv="Content-Language" content = "en"> 
        <meta charset="utf-8">

        <meta name="description" content="A computer vendor that offers quality and cheap products">
        <meta name="keywords" content="Computer, PC, Laptop, CPU, RAM, HDD, SSD, motherboards, keyboard, mouse, graphic cards, power supply, computer cases, fans">
        <meta name="author" content="Furkan Ekici">

        <!--responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <!--CSS and JS connections-->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        

    </head>

    <body>

        <!--container div contains all page elements-->
        <div id="container">
            <!--header contains logo and social media icons-->
            <header id="banner">
                
                <!--Logo div is here-->
                <div id="logo">
                    <a href="index.php"><img id="logoimage" src="images/logos/ekici-logo.png" alt="Logo"></a>
                </div>

                <div id="slogan">SLOGAN</div>
                
                <!--social media icons-->
                <div class="socialMedia">
                    <a href="https://www.facebook.com" target="_blank"><img class="mediaicon" src="images/icons/facebook.png" alt=""></a>
                </div>
                <div class="socialMedia">
                    <a href="https://www.twitter.com" target="_blank"><img class="mediaicon" src="images/icons/twitter.png" alt=""></a>
                </div>
                <div class="socialMedia">
                    <a href="https://www.instagram.com" target="_blank"><img class="mediaicon" src="images/icons/instagram.png" alt=""></a>
                </div>
                
                
                
                
            </header>
            
            <nav id="menu-bar">
                <ul id="menu-list">
                    <li class="menu-element"><a class="menu-link" href="index.php">Home</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">About Us</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">Best Computers</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">Compare Computers</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">Gaming</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">Normal</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">USER</a></li>
                    <li class="menu-element"><a class="menu-link" href="./sale/show_cart.php?cart=true">CART(<?php 
                    
                    //?Number of computers in the cart
                    if(isset($_COOKIE['computer'])){
                        echo count($_COOKIE['computer']);
                    }else{
                        echo "0";
                    }
                    ?>)</a></li>
                    
                    <li class="menu-element"><select name="order" id="">
                    <option value="price">Lowest Price</option>
                    <option value="type">Gaming First</option>
                    <option value="discount">Highest Discount</option>
                    </select></li>
                    
                    
                   
                    
                </ul>
                
                <form  id="searchForm" action="./search/search.php" method="GET">
                    <input id="searchInput" type="text" name="searchResult" placeholder="Search something ...">
                    
                    <div id="searchButton"><button onclick="searchSomething()"><img id="searchimage" src="images/icons/search.png" alt=""></button></div>
                   
                </form>
                
                             
                
            </nav>
            
            <article id="content">
                
                <?php 
                    $sql = "SELECT * FROM computer ORDER BY name";
                    $result = $DBconn->query($sql);
                    while($row = mysqli_fetch_assoc($result)){

                ?>
                
                <div class="computer">
                    <div class="computer_img"></div>
                    <div class="computer_info">
                        <ul id="computer-list">
                            <li><?php echo $row['name'] ?></li>
                            <li><?php echo $row['cpu'] ?></li>
                            <li><?php echo $row['gpu'] ?></li>
                            <li><?php echo $row['ram'] ?></li>
                            <li><?php echo $row['storage'] ?></li>
                            <li><?php echo $row['price'] ?></li>
                            <li class="discount"><?php echo $row['discount'] ?>%</li>
                            <li>price after discount</li>
                            <a href="?add=<?php echo $row['computer_id']; ?>">Add to Cart</a>


                        </ul>
                    </div>
                </div>
                <?php } ?>
                
                <?php
                //TODO : Cart operations
                
                //?ADD
                if(isset($_GET['add'])){
                    $id = $_GET['add'];
                    setcookie('computer['.$id.']', $id, time()+86400);
                    header('Location:'.$_SERVER['HTTP_REFERER']);//go to last page
                }
                
                

                
                ?>
                

            </article>

            <aside id="content2">
                <div>Step 1: Set your technology budget and optimize your shopping strategy.<br>Step 2: Choose an operating system. <br>Step 3: Choose a laptop design. <br>Step 4: Compare these three specs. </div>
            </aside>

            <footer id="footer">
                <a href="#">Home</a>|
                <a href="#">About Us</a> |
                <a href="#">Contact</a>
                <br>
                <p>All rights reserved</p>

            </footer>
            

        </div>
        <script src="js/main.js" type="text/javascript"></script>
    </body>
    
</html>