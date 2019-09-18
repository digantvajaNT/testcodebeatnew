<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="themexriver">

    <!-- Page Title -->
    <title>Welcome to Benchmark</title>

    <!-- Favicon and Touch Icons -->
    <link href="<?php echo base_url(); ?>assets/images/favicon/favicon.png" rel="shortcut icon" type="image/png">
    

    <!-- Icon fonts -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/flaticon.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugins for this template -->
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.transitions.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css?<?php echo time(); ?>" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <img src="<?php echo base_url(); ?>assets/images/preloader.gif" alt>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        <header id="header" class="site-header header-style-5">
            <div class="topbar topbar-style-2">
                <div class="container"> 
                        <div class="lefttopbar">
                            <div class="topbar-contact-info-wrapper">
                                <div class="topbar-contact-info">
                                    <div>
                                        <i class="fa fa-location-arrow"></i>
                                        <div class="details">
                                            <p><?php echo $contact_data['name_one'].$contact_data['address_one'];?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="tel:<?php echo $contact_data['phone_one'];?>">
                                            <i class="fa fa-phone"></i>
                                            <span class="details">
                                                <p><?php echo $contact_data['phone_one'];?></p>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="righttopbar">
                            <div class="text-right">
                                <div class="navlinksproducts">
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url();?>showrooms">Office and showrooms</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>about-us">About Us</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>Dealers/index/6">Our Offices</a>
                                        </li>
                                    </ul>
                                </div> 
                            </div>
                        </div>  
                </div> <!-- end container -->
            </div> <!-- end topbar -->

            <div class="lower-topbar">
                <div class="container">
                    <div class="row">
                        <div class="col col-sm-4">
                            <div class="site-logo">
                                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/benchmark-logo-registered.png" alt></a>
                            </div>
                        </div>
                        <div class="col col-sm-8">
                            <div class="awards">
                                <div>
                                    <div class="icon"><i class="fi flaticon-title"></i></div>
                                    <div class="award-info">
                                        <h4>Global Certified</h4>
                                        <p>ISO 9001:2016</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="icon"><i class="fi flaticon-medal"></i></div>
                                    <div class="award-info">
                                        <h4>Winner</h4>
                                        <p>Construction award 2016</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end lower-topbar -->

            <nav class="navigation navbar navbar-default">
                <div class="container">
					<div class="site-logo hide mobshow">
						<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/assets/images/logo-2.png" alt=""></a>
					</div>
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navigation-holder">
                        <button class="close-navbar"><i class="fa fa-close"></i></button> 
                        <ul class="nav navbar-nav">
<!--
                            <li>
                                <a href="<?php //echo base_url();?>">Home</a>
                            </li>
                             <li><a href="<?php //echo base_url();?>about-us">About Us</a></li>
-->
<!--                            <li><a href="#">Our Products</a></li>-->
                            <li>
                                <a href="<?php echo base_url() . 'products/Water/1'; ?>">Residential Water Heaters</a> 
<!--                            
                                <ul class="sub-menu">
                                    <li><a href="#"><i class="fa fa-bolt"></i><span>Electric</span></a></li>
                                    <li><a href="#"><i class="fa fa-ship"></i><span>Gas</span></a></li>
                                    <li><a href="#"><i class="fa fa-sun-o"></i><span>Solar</span></a></li>
                                </ul>
--> 
<!--
                                <div class="sub-menu">
                                    <div class="headerWrapper"> 
                                    <div class="menuLinks">
                                        <ul> 
                                            <li>
                                                <a href="<?php echo base_url();?>products">
                                                    <i class="fa fa-bolt"></i> 
                                                    <span>Electric</span>
                                                    <div class="productDesc">
                                                        <img src="<?php echo base_url(); ?>assets/images/Benchmark-ESXVH0015-15-Litres-Electric-Storage-Water-Heater.jpg">  
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url();?>products">
                                                    <i class="fa fa-ship"></i> 
                                                    <span>Gas</span>
                                                    <div class="productDesc">
                                                        <img src="<?php echo base_url(); ?>assets/images/Benchmark-GINWL0006-6-Litres-Gas-Geyser-Water-Heater.jpg"> 
                                                    </div>  
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url();?>products">
                                                    <i class="fa fa-sun-o"></i> 
                                                    <span>Solar</span>
                                                    <div class="productDesc">
                                                        <img src="<?php echo base_url(); ?>assets/images/Benchmark-SXXSH0300-300-Litres-Solar-Water-Heater.jpg">  
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>
-->
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'products/Water/2'; ?>">Commercial Water Heaters</a> 
<!--
                                <ul class="sub-menu">
                                    <li><a href="#"><i class="fa fa-bolt"></i><span>Electric</span></a></li>
                                    <li><a href="#"><i class="fa fa-ship"></i><span>Gas</span></a></li>
                                    <li><a href="#"><i class="fa fa-sun-o"></i><span>Solar</span></a></li>
                                </ul>
-->
<!--
                                <div class="sub-menu">
                                    <div class="headerWrapper"> 
                                    <div class="menuLinks">
                                        <ul> 
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bolt"></i> 
                                                    <span>Electric</span>
                                                    <div class="productDesc">
                                                        <img src="<?php echo base_url(); ?>assets/images/Benchmark-ESXVH0015-15-Litres-Electric-Storage-Water-Heater.jpg">  
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-ship"></i> 
                                                    <span>Gas</span>
                                                    <div class="productDesc">
                                                        <img src="<?php echo base_url(); ?>assets/images/Benchmark-GINWL0006-6-Litres-Gas-Geyser-Water-Heater.jpg"> 
                                                    </div>  
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-sun-o"></i> 
                                                    <span>Solar</span>
                                                    <div class="productDesc">
                                                        <img src="<?php echo base_url(); ?>assets/images/Benchmark-SXXSH0300-300-Litres-Solar-Water-Heater.jpg">  
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>
-->
                            </li>
                            <li><a href="<?php echo base_url(). 'products/Water/3';?>">Alkaline Water Ionizer</a></li>
<!--
                            <li><a href="javascript:;">Testimonials</a></li> 
                            <li>
                                <a href="javascript:;">FAQ</a>
                            </li>
-->
                            <li><a href="<?php echo base_url();?>contact-us">Contact Us</a></li>
<!--                            <li><a href="javascript:;">Blog</a></li>-->
                        </ul>
                    </div><!-- end of nav-collapse -->

<!--
                    <div class="cart-contact">
                        <div class="mini-cart">
                            <button class="cart-toggle-btn"> <i class="fi flaticon-shopping-cart"></i> Cart (2) </button>

                            <div class="top-cart-content">
                                <div class="top-cart-title">
                                    <p>Shopping Cart</p>
                                </div>
                                <div class="top-cart-items">
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="assets/images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt"></a>
                                        </div>
                                        <div class="top-cart-item-des">
                                            <a href="#">Blue Round-Neck Tshirt</a>
                                            <span class="top-cart-item-price">$19.99</span>
                                            <span class="top-cart-item-quantity">x 2</span>
                                        </div>
                                    </div>
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="assets/images/shop/small/6.jpg" alt="Light Blue Denim Dress"></a>
                                        </div>
                                        <div class="top-cart-item-des">
                                            <a href="#">Light Blue Denim Dress</a>
                                            <span class="top-cart-item-price">$24.99</span>
                                            <span class="top-cart-item-quantity">x 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-cart-action clearfix">
                                    <span class="fleft top-checkout-price">$114.95</span>
                                    <a href="#" class="theme-btn">View Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
-->
                    
                    <a href="javascript:;" class="theme-btn-s2 request-quote search_btn search_nav"><i class="fa fa-search" aria-hidden="true"></i></a> 
                </div><!-- end of container -->
                <form action="<?php echo base_url(); ?>home/search" method="post" accept-charset="utf-8">
                        <div id="search_txt">
                            <div class="input-group">
                              <input type="text" name="search" id="search" class="form-control" placeholder="Search Here..." aria-label="Recipient's username" aria-describedby="button-addon2" required="true"> 
                            </div>
                        </div> 
                     </form>	 
            </nav> <!-- end navigation -->
        </header>
        <!-- end of header --> 