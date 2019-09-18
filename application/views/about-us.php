
    <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>About us</h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li>About us</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title --> 

        <!-- start offer -->
        <section class="section-padding offer-section fullrangeservices">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6">
                        <div class="section-title-s3">
                            <h2>Get full range of premium Industrial services for your business</h2>
                        </div>                        
                        <div class="offer-text">
                            <p><?php echo $page_data['overview'];?></p>
<!--
                            <a href="#" class="theme-btn read-more">Read More</a>
                            <a href="#" class="theme-btn-s2 read-more">Company history</a>
-->
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="offer-pic">
                            <img src="<?php echo base_url();?>uploads/home/<?php echo $page_data['activity_image'];?>" alt>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end offer -->  
   
        <!-- start features --> 
        <section class="features whywearesection section-padding cta parallax">
            <div class="container">
                <div class="row">
                    <!--<div class="col col-md-3">
                        <div class="features-title">
                             <h2>Why we are best</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adi piscing elit, sed do eiusmod tempor.</p> 
                        </div>
                    </div>-->
                    <div class="col col-md-4 col-sm-4">
                        <div class="feature-grid">
                            <div class="icon">
                                <i class="glyphicon glyphicon-stats"></i>
                            </div>
                            <div class="details">
                                <h3>Standard performance</h3>
                                <p><?php echo $page_data['firm_profile'];?></p> 
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4 col-sm-4">
                        <div class="feature-grid">
                            <div class="icon">
                                <i class="glyphicon glyphicon-wrench"></i>
                            </div>
                            <div class="details">
                                <h3>Best Service</h3>
                                <p><?php echo $page_data['misson_statement'];?></p> 
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4 col-sm-4">
                        <div class="feature-grid">
                            <div class="icon">
                                <i class="glyphicon glyphicon-briefcase"></i>
                            </div>
                            <div class="details">
                                <h3>Wide product range</h3>
                                <p><?php echo $page_data['client_principle'];?></p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section> 
        <!-- end features -->
        
        

        <!-- start our-team -->
        <!--<section class="our-team offersection our-team-bg section-padding">
            <div class="section-full bg-gray p-t80 p-b57"> 
                <div class="container">    
                    <div class="section-head text-center">
                        <h2 class="text-uppercase borderred centerborder">Join Us !!</h2>                       
                    </div> 
                    <div class="section-content" data-toggle="tab-hover">
                        <div class="row">
                            <?php
                          //   if(count($allcareer) > 0) {
                          //  foreach($allcareer as $value){    ?> 
                            <div class="col-lg-6 col-md-12">
                                
                                    <div class="col-xs-100pc">
                                        <div class="wt-box block-md clearfix  bg-white block-shadow m-b30 radius-md overflow-hide">
                                            <div class="wt-media" style="background:url('<?php //echo base_url(); ?>assets/images/<?php //echo $value['img_url']; ?>');"></div>
                                            <div class="wt-info text-left p-a20 overflow-hide">
                                                <h4 class="text-uppercase"><?php //echo $value['tech_name']; ?></h4>
                                                <p><?php//echo $value['location']; ?></p>
                                                <a href="<?php //echo base_url().'careers/career-detail/'.$value['c_id'];?>" class="text-primary font-weight-600">Read More</a>
                                             </div>
                                        </div>
                                    </div>   
                               
                            </div>
                                     <?php //}}?>                   
                        </div>    
                    </div>                    
                </div>
                
                
            </div>   

        </section> -->
        <!-- end our-team -->
 
        <!--ABOUT-->
      <!--  <section>
            <div id="lgx-about" class="lgx-about awardsection">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                <div class="lgx-about-content-area">
                                    <div class="lgx-heading">
                                        <h2 class="heading borderred">Best Service Provider of 2018</h2> 
                                    </div>
                                    <div class="lgx-about-content">
                                        <p class="text">
                                            Morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, tristique senectus et netus et malesuada fames ac turpis egestas ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris Eonec eu ribero sit amet quam egestas semper. Aenean are ultricies mi senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae vitae fames ac turpis egestas.
                                        </p>
                                        <div class="about-date-area">
                                            <h4 class="date"><span>29</span></h4>
                                            <p><span>November 2019</span> King Street, Dhaka, Bangladesh</p>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5">
                                <div class="lgx-about-img-sp">
                                    <img src="assets/images/award.jpg" alt="award">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--ABOUT END-->
        
         <!-- start blog-grid-section -->
        <!--<section class="blog-grid-section section-padding newsmedia">
            <div class="container">
                <div class="section-head text-center">
                    <h2 class="text-uppercase borderred centerborder">Our News</h2>                       
                </div>
                <div class="clearfix"></div>
                <div class="news-grids">
                    <div class="grid">
                        <div class="entry-media">
                            <img src="assets/images/media1.jpg" alt>
                        </div>
                        <div class="entry-details">
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Nov 25</li>
                                </ul>
                            </div>
                            <div class="entry-body">
                                <h3><a href="#">China's industrial profits grow faster in first eight months</a></h3>
                                <p>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="entry-media">
                            <img src="assets/images/media1.jpg" alt>
                        </div>
                        <div class="entry-details">
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Nov 25</li> 
                                </ul>
                            </div>
                            <div class="entry-body">
                                <h3><a href="#">Exploring the wild side in an industrial jungle bengle</a></h3>
                                <p>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="entry-media">
                            <img src="assets/images/media1.jpg" alt>
                        </div>
                        <div class="entry-details">
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Nov 25</li> 
                                </ul>
                            </div>
                            <div class="entry-body">
                                <h3><a href="#">Bus drivers in Liverpool vote for industrial action</a></h3>
                                <p>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="entry-media">
                            <img src="assets/images/media1.jpg" alt>
                        </div>
                        <div class="entry-details">
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Nov 25</li> 
                                </ul>
                            </div>
                            <div class="entry-body">
                                <h3><a href="#">Bus drivers in Liverpool vote for industrial action</a></h3>
                                <p>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="entry-media">
                            <img src="assets/images/media1.jpg" alt>
                        </div>
                        <div class="entry-details">
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Nov 25</li> 
                                </ul>
                            </div>
                            <div class="entry-body">
                                <h3><a href="#">Exploring the wild side in an industrial jungle bengle</a></h3>
                                <p>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="entry-media">
                            <img src="assets/images/media1.jpg" alt>
                        </div>
                        <div class="entry-details">
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Nov 25</li> 
                                </ul>
                            </div>
                            <div class="entry-body">
                                <h3><a href="#">China's industrial profits grow faster in first eight months</a></h3>
                                <p>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </section>-->
        <!-- end blog-grid-section     -->



    