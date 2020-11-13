<?php
include('dbconnection.php');
if(isset($_POST['submit']))
{
    $fname=$_POST['UserFirstName'];
    $lname=$_POST['UserLastName'];
    $email=$_POST['UserEmail'];
    $phone=$_POST['UserPhone'];
    $password=md5($_POST['UserPassword']);
    //$confirmpass=$_POST['confirmpass'];



if(isset($_POST['submit']))
{
    $fname = trim($_POST['UserFirstName']);
    $email = trim($_POST['UserEmail']);
    $password = trim($_POST['UserPassword']);
    $phone = trim($_POST['UserPhone']);
    if(empty($fname))
    {
        $error = "enter your name !";
        $code = 1;
    }
    else if(!ctype_alpha($fname))
    {
        $error = "letters only !";
        $code = 1;
    }
    else if(empty($email))
    {
        $error = "enter your email !";
        $code = 2;
    }
    else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email))
    {
        $error = "not valid email !";
        $code = 2;
    }
    else if(empty($phone))
    {
        $error = "Enter Mobile NO !";
        $code = 3;
    }
    else if(!is_numeric($phone))
    {
        $error = "Numbers only !";
        $code = 3;
    }
    else if(strlen($phone)!=10)
    {
        $error = "10 characters only !";
        $code = 3;
    }
    else if(empty($password))
    {
        $error = "enter password !";
        $code = 4;
    }
    else if(strlen($password) < 8 )
    {
        $error = "Minimum 8 characters !";
        $code = 4;
    }
    else
    {

         $ret=mysqli_query($con, "select Email from `users` where email='$email' || phone='$phone'");
        $result=mysqli_fetch_array($ret);
        if($result>0){
            echo "<script>alert('This email or Contact Number already associated with another account');</script>";
        }
        else{
            $query=mysqli_query($con, "INSERT INTO `users`(`UserFirstName`, `UserLastName`, `UserEmail`, `UserPhone`, `UserPassword`)  VALUES('$fname', '$lname', '$email', '$phone' ,'$password' )");
            if ($query) {
                echo "<script>alert('You have successfully registered');</script>";

                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $to = $_POST['UserEmail'];
                $subject = "Account Verification Mail";
                $from = "Sigmainfo.net";
                $message = "Hello" . $fname . ", \n Your account has been verified and successfully activated with this email address.";
                $headers = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n";
                if (mail($to, $subject, $message, $headers)) {
                    echo "<script>alert('Your mail has been Sent successfully');</script>";
                } else {
                    echo "<script>alert('Your registration mail Failed');</script>";}
                echo "<script>window.location.href ='login.php'</script>";
//
//                $to = $_POST['email'];
//                $subject = "Account Verification Mail";
//                $from = "Sigmainfo.net";
//                $message = "Hello" . $fname . ", \n Your account has been verified and successfully activated with this email address.";
//                $headers = 'MIME-Version: 1.0' . "\r\n";
//// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//// $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n";
//                if (mail($to, $subject, $message, $headers)) {
//                    echo "<script>alert('Your mail has been Sent successfully');</script>";
//                } else {
//                    echo "<script>alert('Your registration mail Failed');</script>";
//                }
            }



            else
            {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
                echo "<script>window.location.href ='registration.php'</script>";
            }
        }


        $imgtitle=$_POST['imagetitle'];
        $imgfile=$FILES["image"]["name"];

        // $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
        //  $allowed_extension =array(".jpg",".jpeg",".png",".gif");
        $imgnewfile=md5($imgfile).$extension;

        move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$imgnewfile);
    }
    }
}



?>




<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!--<!DOCTYPE html>-->
<html>
<head>
<!--    <title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Sign In & Sign Up :: w3layouts</title>-->
<!--    <!-- for-mobile-apps -->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--    <meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,-->
<!--Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />-->
<!--    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);-->
<!--        function hideURLbar(){ window.scrollTo(0,1); } </script>-->
<!--    <!-- //for-mobile-apps -->
<!--    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />-->
<!--    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />-->
<!--    <!-- font-awesome icons -->
<!--    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />-->
<!--    <!-- //font-awesome icons -->
<!--    <!-- js -->
<!--    <script src="js/jquery-1.11.1.min.js"></script>-->
<!--    <!-- //js -->
<!--    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>-->
<!--    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>-->
<!--    <!-- start-smoth-scrolling -->
<!--    <script type="text/javascript" src="js/move-top.js"></script>-->
<!--    <script type="text/javascript" src="js/easing.js"></script>-->
<!--    <script type="text/javascript">-->
<!--        jQuery(document).ready(function($) {-->
<!--            $(".scroll").click(function(event){-->
<!--                event.preventDefault();-->
<!--                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);-->
<!--            });-->
<!--        });-->
<!--    </script>-->
    <!-- start-smoth-scrolling -->
    <?php include('header.php');?>
</head>

<body>
<!--<!-- header -->
<!--<div class="agileits_header">-->
<!--    <div class="w3l_offers">-->
<!--        <a href="products.php">Today's special Offers !</a>-->
<!--    </div>-->
<!--    <div class="w3l_search">-->
<!--        <form action="#" method="post">-->
<!--            <input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">-->
<!--            <input type="submit" value=" ">-->
<!--        </form>-->
<!--    </div>-->
<!--    <div class="product_list_header">-->
<!--        <form action="#" method="post" class="last">-->
<!--            <fieldset>-->
<!--                <input type="hidden" name="cmd" value="_cart" />-->
<!--                <input type="hidden" name="display" value="1" />-->
<!--                <input type="submit" name="submit" value="View your cart" class="button" />-->
<!--            </fieldset>-->
<!--        </form>-->
<!--    </div>-->
<!--    <div class="w3l_header_right">-->
<!--        <ul>-->
<!--            <li class="dropdown profile_details_drop">-->
<!--                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>-->
<!--                <div class="mega-dropdown-menu">-->
<!--                    <div class="w3ls_vegetables">-->
<!--                        <ul class="dropdown-menu drp-mnu">-->
<!--                            <li><a href="login.php">Login</a></li>-->
<!--                            <li><a href="registration.php">Registration</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--    <div class="w3l_header_right1">-->
<!--        <h2><a href="mail.php">Contact Us</a></h2>-->
<!--    </div>-->
<!--    <div class="clearfix"> </div>-->
<!--</div>-->
<!--<!-- script-for sticky-nav -->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        var navoffeset=$(".agileits_header").offset().top;-->
<!--        $(window).scroll(function(){-->
<!--            var scrollpos=$(window).scrollTop();-->
<!--            if(scrollpos >=navoffeset){-->
<!--                $(".agileits_header").addClass("fixed");-->
<!--            }else{-->
<!--                $(".agileits_header").removeClass("fixed");-->
<!--            }-->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->
<!--<!-- //script-for sticky-nav -->
<!--<div class="logo_products">-->
<!--    <div class="container">-->
<!--        <div class="w3ls_logo_products_left">-->
<!--            <h1><a href="index.php"><span>Grocery</span> Store</a></h1>-->
<!--        </div>-->
<!--        <div class="w3ls_logo_products_left1">-->
<!--            <ul class="special_items">-->
<!--                <li><a href="events.php">Events</a><i>/</i></li>-->
<!--                <li><a href="about.php">About Us</a><i>/</i></li>-->
<!--                <li><a href="products.php">Best Deals</a><i>/</i></li>-->
<!--                <li><a href="services.php">Services</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="w3ls_logo_products_left1">-->
<!--            <ul class="phone_email">-->
<!--                <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>-->
<!--                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="clearfix"> </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- //header -->
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>Sign In & Sign Up</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
    <div class="w3l_banner_nav_left">
        <nav class="navbar nav_bottom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav nav_1">
                    <li><a href="products.php">Branded Foods</a></li>
                    <li><a href="household.php">Households</a></li>
                    <li class="dropdown mega-dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Veggies & Fruits<span class="caret"></span></a>
                        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                            <div class="w3ls_vegetables">
                                <ul>
                                    <li><a href="vegetables.php">Vegetables</a></li>
                                    <li><a href="vegetables.php">Fruits</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="kitchen.php">Kitchen</a></li>
                    <li><a href="short-codes.php">Short Codes</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
                        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                            <div class="w3ls_vegetables">
                                <ul>
                                    <li><a href="drinks.php">Soft Drinks</a></li>
                                    <li><a href="drinks.php">Juices</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="pet.php">Pet Food</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Frozen Foods<span class="caret"></span></a>
                        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                            <div class="w3ls_vegetables">
                                <ul>
                                    <li><a href="frozen.php">Frozen Snacks</a></li>
                                    <li><a href="frozen.php">Frozen Nonveg</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="bread.php">Bread & Bakery</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
    <div class="w3l_banner_nav_right">


        <!-- login -->


        <div class="w3_login">
            <h3>Registration</h3>
            <div class="w3_login_module">
                <div class="module form-module">
                    <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                        <div class="tooltip">Click Me</div>
                    </div>



                    <div class="form">
                        <h2>Create an account</h2>
                        <form enctype="multipart/form-data" action="registration.php" method="POST">
                            <?php
                            if(isset($error))
                            {
                                ?>
                                <div id="formvalid"><?php echo $error; ?></div>
                                <?php
                            }
                            ?>
                            <input type="text" name="UserFirstName" placeholder="First name"  value="<?php if (isset($fname)) {echo $fname;} ?>" <?php if (isset($code) && $code ==1){echo "autofocus";} ?> />
                            <input type="text" name="UserLastName" placeholder="Last name" />
                            <input type="email" name="UserEmail" placeholder="Email"  value="<?php if (isset($email)) {echo $email;} ?>" <?php if (isset($code) && $code ==2){echo "autofocus";} ?>/>
                            <input type="password" name="UserPassword" placeholder="Password"  value="<?php if (isset($password)) {echo $password;} ?>" <?php if (isset($code) && $code ==4){echo "autofocus";} ?>/>
                            <input type="password" name="confirmpass" placeholder="Confirm Password" />
                            <input type="text" name="UserPhone" placeholder="Phone Number"  value="<?php if (isset($phone)) {echo $phone;} ?>" <?php if (isset($code) && $code ==3){echo "autofocus";} ?>/>

                            <div>
                                <input type="hidden" name="MAX_FILE_SIZE" value="30000" >
                                Upload Document: <input name="image" type="file" >
                              
                            </div>
                            <br><br>


                            <input type="submit" name="submit" value="Register">
                        </form>
                    </div>

                </div>
            </div>
            <script>
                $('.toggle').click(function(){
                    // Switches the Icon
                    $(this).children('i').toggleClass('fa-pencil');
                    // Switches the forms
                    $('.form').animate({
                        height: "toggle",
                        'padding-top': 'toggle',
                        'padding-bottom': 'toggle',
                        opacity: "toggle"
                    }, "slow");
                });
            </script>
        </div>
        <!-- //login -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->
<!-- newsletter-top-serv-btm -->
<div class="newsletter-top-serv-btm">
    <div class="container">
        <div class="col-md-4 wthree_news_top_serv_btm_grid">
            <div class="wthree_news_top_serv_btm_grid_icon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
            <h3>Nam libero tempore</h3>
            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                saepe eveniet ut et voluptates repudiandae sint et.</p>
        </div>
        <div class="col-md-4 wthree_news_top_serv_btm_grid">
            <div class="wthree_news_top_serv_btm_grid_icon">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
            </div>
            <h3>officiis debitis aut rerum</h3>
            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                saepe eveniet ut et voluptates repudiandae sint et.</p>
        </div>
        <div class="col-md-4 wthree_news_top_serv_btm_grid">
            <div class="wthree_news_top_serv_btm_grid_icon">
                <i class="fa fa-truck" aria-hidden="true"></i>
            </div>
            <h3>eveniet ut et voluptates</h3>
            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                saepe eveniet ut et voluptates repudiandae sint et.</p>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //newsletter-top-serv-btm -->
<!-- newsletter -->
<!--<div class="newsletter">-->
<!--    <div class="container">-->
<!--        <div class="w3agile_newsletter_left">-->
<!--            <h3>sign up for our newsletter</h3>-->
<!--        </div>-->
<!--        <div class="w3agile_newsletter_right">-->
<!---->
<!--            if-->
<!---->
<!--            <form action="#" method="post">-->
<!---->
<!--               -->
<!--                <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">-->
<!--                <input type="submit" value="subscribe now">-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="clearfix"> </div>-->
<!--    </div>-->
<!--</div>-->
<!-- //newsletter -->
<!-- footer -->
<!--<div class="footer">-->
<!---->
<!---->
<!--    <div class="container">-->
<!--        <div class="col-md-3 w3_footer_grid">-->
<!--            <h3>information</h3>-->
<!--            <ul class="w3_footer_grid_list">-->
<!--                <li><a href="events.php">Events</a></li>-->
<!--                <li><a href="about.php">About Us</a></li>-->
<!--                <li><a href="products.php">Best Deals</a></li>-->
<!--                <li><a href="services.php">Services</a></li>-->
<!--                <li><a href="short-codes.php">Short Codes</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="col-md-3 w3_footer_grid">-->
<!--            <h3>policy info</h3>-->
<!--            <ul class="w3_footer_grid_list">-->
<!--                <li><a href="faqs.php">FAQ</a></li>-->
<!--                <li><a href="privacy.php">privacy policy</a></li>-->
<!--                <li><a href="privacy.php">terms of use</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="col-md-3 w3_footer_grid">-->
<!--            <h3>what in stores</h3>-->
<!--            <ul class="w3_footer_grid_list">-->
<!--                <li><a href="pet.php">Pet Food</a></li>-->
<!--                <li><a href="frozen.php">Frozen Snacks</a></li>-->
<!--                <li><a href="kitchen.php">Kitchen</a></li>-->
<!--                <li><a href="products.php">Branded Foods</a></li>-->
<!--                <li><a href="household.php">Households</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="col-md-3 w3_footer_grid">-->
<!--            <h3>twitter posts</h3>-->
<!--            <ul class="w3_footer_grid_list1">-->
<!--                <li><label class="fa fa-twitter" aria-hidden="true"></label><i>01 day ago</i><span>Non numquam <a href="#">http://sd.ds/13jklf#</a>-->
<!--						eius modi tempora incidunt ut labore et-->
<!--						<a href="#">http://sd.ds/1389kjklf#</a>quo nulla.</span></li>-->
<!--                <li><label class="fa fa-twitter" aria-hidden="true"></label><i>02 day ago</i><span>Con numquam <a href="#">http://fd.uf/56hfg#</a>-->
<!--						eius modi tempora incidunt ut labore et-->
<!--						<a href="#">http://fd.uf/56hfg#</a>quo nulla.</span></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="clearfix"> </div>-->
<!--        <div class="agile_footer_grids">-->
<!--            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">-->
<!--                <div class="w3_footer_grid_bottom">-->
<!--                    <h4>100% secure payments</h4>-->
<!--                    <img src="images/card.png" alt=" " class="img-responsive" />-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">-->
<!--                <div class="w3_footer_grid_bottom">-->
<!--                    <h5>connect with us</h5>-->
<!--                    <ul class="agileits_social_icons">-->
<!--                        <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                        <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
<!--                        <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
<!--                        <li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
<!--                        <li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="clearfix"> </div>-->
<!--        </div>-->
<!--        <div class="wthree_footer_copy">-->
<!--            <p>© 2016 Grocery Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
    paypal.minicart.render();

    paypal.minicart.cart.on('checkout', function (evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });

</script>
</body>
</html>


<?php include_once ('footer.php')?>