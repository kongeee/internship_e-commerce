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
                    <a href="index.html"><img id="logoimage" src="images/logos/ekici-logo.png" alt="Logo"></a>
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
                    <li class="menu-element"><a class="menu-link" href="#">Home</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">About Us</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">Best Products</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">Compare Computers</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">USER</a></li>
                    <li class="menu-element"><a class="menu-link" href="#">CART(X)</a></li>
                    
                    
                   
                    
                </ul>
                
                <form  id="searchForm" action="./search/search.php" method="GET">
                    <input id="searchInput" type="text" name="searchResult" placeholder="Search something ...">
                    
                    <div id="searchButton"><button onclick="searchSomething()"><img id="searchimage" src="images/icons/search.png" alt=""></button></div>
                   
                </form>
                
            </nav>
            
            <article id="content">
                <div class="product">
                    <div class="product_img"></div>
                    <div class="product_info">
                        <ul id="product-list">
                            <li>name</li>
                            <li>price</li>
                            <li id="discount"><?php echo "10"?>%</li>
                            <li>price after discount</li>


                        </ul>
                    </div>
                </div>
                
                
                

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