<html lang=en>

<head>
    <meta charset="utf-8">
    <meta content="IE-edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, intial-scale=1.0" name="viewport">
    <title>Shopping Website</title>
    <!--fav-icon---------------->
    <link rel="shortcut icon" href="images/fav-icon.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--style----->
</head>

<body>
    <nav>
        <!--menu-bar----------------------------------------->
        <div class="navigation" id="navi">
            <!--logo------------>
            <a href="#" class="logo"><img src="images/logo1.png"></a>
            <!--menu-icon------------->
            <div class="toggle"></div>
            <!--menu----------------->
            <ul class="menu">
                <li><a href="#navi">Home</a></li>
                <li class="shop"><a href="#">Shop</a></li>
                <li><a href="./webdev/Men/Men.html">Men</a>
                    <!--lable---->
                    <span class="sale-lable">Sale</span>
                </li>
                <li><a href="webdev/girl.html">Women</a></li>
                <li><a href="./webdev/kids/Kid.html#kidd">Kids</a></li>
            </ul>
            <!--right-menu----------->
            <div class="right-menu">
                <a href="javascript:void(0);" class="search">
                    <i class="fas fa-search"></i>
                </a>
                
                <?php
                    session_start();
                    if(isset($_SESSION['success']) && $_SESSION['success']== true){
                        echo '<a href="logout.php" class="user">
                        '.$_SESSION['usermail'].'
                    </a>';
                    }
                    else{
                        echo '<a href="#" class="user">
                        <i class="far fa-user"></i>
                    </a>';
                    }

                ?>
                <a href="shoppingcart.php">
                    <i class="fas fa-shopping-cart">
                        
                    </i>
                </a>
            </div>
        </div>
    </nav>
    <!---login-and-sign-up--------------------------------->
    <div class="form">
        <!--login---------->
        <div class="login-form" id="logi">
            <!--cancel-btn---------------->
            <a href="javascript:void(0);" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
            <strong>Log In</strong>
            <!--inputs-->
            <form action="authentication.php" onSubmit="return validation()" method="POST">
                <input type="email" name="usermail" placeholder="Example@gmail.com" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="Log In" />
            </form>
            <!--forget-and-sign-up-btn-->
            <div class="form-btns">
                <a href="#" class="forget">Forget Your Password?</a>
                <a href="javascript:void(0);" class="sign-up-btn">Create Account</a>
            </div>
        </div>
        <!--Sign-up---------->
        <div class="sign-up-form">
            <!--cancel-btn---------------->
            <a href="javascript:void(0);" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
            <strong>Sign Up</strong>
            <!--inputs-->
           <form action = "connection.php" onsubmit = "return validation()" method ="POST">
                <input type="email" name="usermail" placeholder="Example@gmail.com" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="Sign Up" />
            </form>
            <!--forget-and-sign-up-btn-->
            <div class="form-btns">
                <a href="javascript:void(0);" class="already-account">
                    Already Have Account?</a>
            </div>
        </div>
    </div>
    <!-- slider----- -->
    <div id="slider">
        <figure class="slide">
           <a href="webdev/Kid.html"> <img src="images/Skid1.jpg" alt></a>
            <a href="webdev/Men.html"><img src="images/sman3.jpg" alt></a>
            <a href="webdev/girl.html"><img src="images/man.jpg" alt></a>
            <a href="webdev/girl.html"><img src="images/girl.jpg" ></a>
        </figure>
    </div>


    <!--product-categories-slider---------------------->
    <div class="category-heading" id ="cate">
        <h1 CLASS="feature-heading"> CATEGORY TO BAG </h1>
        <ul id="autoWidth" class="container" class="cs-hidden">
            <!--box-1--------------------->
            <li class="item">
                <div class="feature-box">
                    <a href="webdev/Men.html">
                        <img src="images/Shirts.webp">
                    </a>
                </div>
            </li>
            <!--box-2--------------------->
            <li class="item">
                <div class="feature-box">
                    <a href="webdev/Men.html#sec">
                        <img src="images/T-shirt.webp">
                    </a>
                </div>
            </li>
            <!--box-3--------------------->
            <li class="item">
                <div class="feature-box">
                    <a href="webdev/Men.html#jeans">
                        <img src="images/Jeans.webp">
                    </a>
                </div>
            </li>
            <!--box-4--------------------->
            <li class="item">dev
                <div class="feature-box">
                    <a href="webdev/Men.html#shoes">
                        <img src="images/Casual-shoes.webp">
                    </a>
                </div>
            </li>
            <!--box-5--------------------->
            <li class="item">
                <div class="feature-box">
                    <a href="webdev/Kid.html">
                        <img src="images/babu.webp">
                    </a>
                </div>
            </li>
            <!--box-6--------------------->

        </ul>
    </div>

        <!-- box 7 -->
        <div class="images">

            <div class="photo">
                <a href="webdev/girl.html#sarees">
                    <img src="images/Sarees.webp" alt=""></a>

            </div>

            <div class="photo">
                <a href="webdev/girl.html#dreses">
                    <img src="images/Dresses.webp" alt=""></a>
            </div>

            <div class="photo">
                <a href="webdev/girl.html#kurta">
                    <img src="images/Kurta-Sets.webp" alt=""></a>
            </div>

            <div class="photo">
                <a href="weddev/girl.html#bag">
                    <img src="images/Handbags.webp" alt=""></a>
            </div>

            <div class="photo">
                <a href="webdev/girl.html#heels">
                    <img src="images/Heels.webp" alt=""></a>
            </div>

        </div>

        <div class="head">
            <h1>EXPLORE TOP BRAND</devh1>
        </div>
        
       
        <div class="Top-Brand">
            
           
            <div class="Brand">
                <a href="webdev/Kid.html#brand"><img src="images/Nike.webp" alt=""></a>
            </div>

            <div class="Brand">
                <a href="webdev/Kid.html#brand"><img src="images/hrx.webp" alt=""></a>
            </div>

            <div class="Brand">
                <a href="webdev/Kid.html#brand"><img src="images/H&M.webp" alt=""></a>
            </div>

            <div class="Brand">
                <a href="webdev/Kid.html#brand"><img src="images/Roadster---.webp" alt=""></a>
            </div>

            <div class="Brand">
                <a href="webdev/Kid.html#brand"><img src="images/levis.webp" alt=""></a>
            </div>

        </div>


        <section class="services">
            <!--services-box---------->
            <div class="services-box">
                <i class="fas fa-shipping-fast"></i>
                <span>Free Shipping</span>
                <p>Free Shipping for all US order</p>
            </div>
            <!--services-box---------->
            <div class="services-box">
                <i class="fas fa-headphones-alt"></i>
                <span>Support 24/7</span>
                <p>We support 24h a day</p>
            </div>
            <!--services-box---------->
            <div class="services-box">
                <i class="fas fa-sync"></i>
                <span>100% Money Back</span>
                <p>You have 30 days to Return</p>
            </div>
            
        </section>
        <!--footer---------------------------->
   <footer class="footer">
       <h3>Design By</h3>
       <ul>
           <li>Abhimanyu Kumar <span>(190310007002)</span></li>
           <li>Achintam kalita <span>(190310007005)</li>
           <li>Harshita Beltala <span>(190310007016)</li>
       </ul>
       <a href=""><i class="fab fa-instagram-square"></i></a>
       <a href=""><i class="fab fa-linkedin"></i></a>
       <a href=""><i class="fab fa-twitter"></i></a>
       <a href=""><i class="fab fa-facebook"></i></a>

   </footer>
        
    <script src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="index.js"></script>
</body>

</html>