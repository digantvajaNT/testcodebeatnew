
        
        <!--================Home Banner Area =================-->
         <section class="banner_area_demo" style="background:linear-gradient(45deg, rgba(0, 0, 0, 0.75), rgba(150, 150, 150, 0.5)), url('<?php echo base_url();?>/uploads/banner/<?php if (isset($page_banner[0]['banner_image'])&&!empty($page_banner[0]['banner_image'])){echo $page_banner[0]['banner_image'];}?>');background-repeat: no-repeat;background-size:cover;background-position: center;"></section>  
        <div class="header-gradient-after-demo sub_page"></div>
        <!--================End Home Banner Area =================-->
        
        <!--================Design Area =================-->
        <section class="design_area bg-gray">
            <div class="container">
                <div class="design_inner">
                    <div class="row">      
                      <div class="col-xl-4 col-md-4 col-lg-3 circle_year">
                        <div class="about-img text-center"> <img src="<?php echo base_url();?>uploads/home/<?php if (isset($page_data['activity_image'])&&!empty($page_data['activity_image'])){echo $page_data['activity_image'];}?>" class="img-fluid img-responsive" alt="Budlong 60 Years"> </div>
                      </div>
                      <div class="col-xl-6 col-md-8 col-lg-6">
                        <blockquote class="generic-blockquote about-text">
                            <h1>
                                <?php if (isset($page_data['overview'])&&!empty($page_data['overview'])){echo $page_data['overview'];}?>
                            </h1>
                        </blockquote>                       
                      </div>
                    </div>
                </div>
            </div>
        </section>        
        <!--================End Design Area =================-->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>portfolio">Portfolio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $category_data[0]['category_name']; ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $details_data[0]['product_name']; ?></li>
          </ol>
        </nav>
        <!--================Portfolio Details Area =================-->
        <section class="portfolio_details_area mt-5 mb-5 pt-5 overwrite_content">
        	<div class="container">
                <div class="main_title">
                    <h2><?php echo $category_data[0]['category_name']?></h2>
                    <p><?php echo $category_data[0]['category_description']?></p>
                </div>                
                <div class="">                  
                  <div class="">
                      <div class="portfolio_details_inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left_img">
                                    <img class="img-fluid" src="<?php echo base_url(); ?>uploads/products/covers/<?php echo  $details_data[0]['producr_cover_image']; ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio_right_text">
                                    <h4><?php echo $details_data[0]['product_name']; ?></h4>
                                    <h6><?php echo $details_data[0]['product_title']; ?></h6>
                                    <p>
                                       <?php echo $details_data[0]['product_description']; ?>
                                    </p>                                   
                                </div>
                            </div>
                        </div>                                                
                      </div>
                  </div>             
                </div>
            </div>
        </section>
        <!--================End Portfolio Details Area =================-->
           
        