<?php
error_reporting(E_ALL ^ E_WARNING); 

include_once("./server.php"); 
include_once("./computer/computer.php");
include_once("./computer/computerService.php");
include_once("./computer/computerManager.php");
include_once("./sale/cart_functions.php");





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
                    
                    <?php 
                    if(isset($_COOKIE['user'])){//if user is logged in
                       
                        $user_id = $_COOKIE['user'];
                        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
                        $result = $DBconn->query($sql);
                        $row = mysqli_fetch_assoc($result);

                    
                        echo "<li class='menu-element'><a class='menu-link' href='user/user_menu.php'>" .$row['first_name']. " " . $row['last_name'] . "</a></li>";
                    }
                    else{//if user is not logged in
                        echo "<li class='menu-element'><a class='menu-link' href='user/userLogin.php'>USER</a></li>";
                        
                    }
                     ?>
                    <li class="menu-element"><a class="menu-link" href="./sale/show_cart.php?cart=true">CART(<?php 
                    
                    //?Number of computers in the cart
                    if(isset($_COOKIE['computer'])){
                        echo count($_COOKIE['computer']);
                    }else{
                        echo "0";
                    }
                    ?>)</a></li>
                    
                    <form action="" method="GET">
                        <li class="menu-element"><select name="order" id="">
                        <option value="name" selected>Name</option>
                        <option value="price">Lowest Price</option>
                        <option value="gaming">Gaming First</option>
                        <option value="discount">Highest Discount</option>
                        </select></li>
                        <input type="submit" value="Order" style="position: relative; right:90px; top:30px; float:left">
                    </form>
                    
                   
                    
                </ul>
                
                <form  id="searchForm" action="./search/search.php" method="GET">
                    <input id="searchInput" type="text" name="searchResult" placeholder="Search something ...">
                    
                    <div id="searchButton"><button onclick="searchSomething()"><img id="searchimage" src="images/icons/search.png" alt=""></button></div>
                   
                </form>
                
                             
                
            </nav>
            
            <article id="content">
                
                <?php
                    //TODO: sort the computers
                    if(isset($_GET['order'])){
                        if($_GET['order'] == 'gaming'){
                            $order = "type";    //sort with type (gaming first)
                            $ascORdesc = "ASC";
                        }
                        else if($_GET['order'] == 'discount'){
                            $order = "discount"; //sort with discount rate
                            $ascORdesc = "DESC";
                        }
                        else if($_GET['order'] == 'price'){
                            $order = "price-((price * discount)/100)"; //sort with price after discount
                            $ascORdesc = "ASC";
                        }
                        
                    }
                    //order
                    if(!isset($order)){
                        $order = "name";   //sort with name
                        $ascORdesc = "ASC";

                    }
                    
                    
                    //page
                    if(isset($_GET['page'])){  //if there is page operation
                        $start = ($_GET['page']-1) * 9;  
                        $finish = $_GET['page'] * 9;
                    }else{
                        $start = 0;
                        $finish = 9;
                    }


                    $sql = "SELECT * FROM computer ORDER BY $order $ascORdesc LIMIT $start, $finish";
                    $result = $DBconn->query($sql);
                    $computer = new Computer();
                    $computerService = new ComputerManager();
                    while($row = mysqli_fetch_assoc($result)){
                        $computerService->connectionWithDBorForm($computer, $row);
                ?>
                
                <!-- computer card -->
                <div class="computer">
                    <div class="computer_img"></div>
                    <div class="computer_info">
                        <ul id="computer-list">
                            <li><?php echo $row['name'] ?></li>
                            <li><?php echo $row['stock'] ?> in stock</li>
                            <li><?php echo $row['cpu'] ?></li>
                            <li><?php echo $row['gpu'] ?></li>
                            <li><?php echo $row['ram'] ?></li>
                            <li><?php echo $row['storage'] ?></li>
                            <li class="price"><?php echo $row['price'] ?></li>
                            <li class="discount"><?php echo $row['discount'] ?>%</li>
                            <li><?php echo $computer->getPriceAfterDiscount(); ?></li>
                            <a href="?add=<?php echo $row['computer_id']; ?>">Add to Cart</a> | 
                            <a href="./computer/computer_show.php?id=<?php echo $row['computer_id']; ?>">More Detail</a>
                            


                        </ul>
                    </div>
                </div>
                <?php } ?>
                
                <?php
                //TODO : Cart operations
                
                //?ADD
                if(isset($_GET['add'])){
                    $id = $_GET['add'];
                    cart_add($id);
                }

                
                
                ?>

                
                <?php 
                //TODO: PAGE
                
                $sql = "SELECT COUNT(*) AS number_of_computers FROM computer";
                $result = $DBconn->query($sql);
                $row = mysqli_fetch_assoc($result);
                
                $number_of_pages = ceil($row['number_of_computers'] / 9); //number of page

                for($i=1; $i<=$number_of_pages; $i++){
                ?>
                <div id="pages">
                    <ul id="pages_list">
                    
                        <!-- if there is order we have to send it with page info to run two get method at the same time -->
                        <li><a href="?page=<?php echo $i; ?>&order=<?php if(isset($_GET['order'])){echo $_GET['order'];} ?>"><?php echo $i;?></a></li>
                        
                    </ul>
                </div>
                <?php } ?>

            
                    
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