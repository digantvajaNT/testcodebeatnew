  <!--================Home Banner Area =================-->
          <section class="banner_area_demo" style="background:linear-gradient(45deg, rgba(0, 0, 0, 0.75), rgba(150, 150, 150, 0.5)), url(<?php echo base_url();?>uploads/banner/<?php if (isset($page_banner[0]['banner_image'])&&!empty($page_banner[0]['banner_image'])){echo $page_banner[0]['banner_image'];}?>);background-repeat: no-repeat;background-size:cover;background-position: center;"></section>  
        <div class="header-gradient-after-demo sub_page"></div>
        <!--================End Home Banner Area =================-->
        
        <!--================Design Area =================-->
        <section class="design_area bg-gray">
            <div class="container">
                <div class="design_inner">
                    <div class="row">      
                      <div class="col-xl-4 col-md-4 col-lg-3 circle_year">
                        <div class="about-img text-center"> <img src="uploads/home/<?php if (isset($page_data['activity_image'])&&!empty($page_data['activity_image'])){echo $page_data['activity_image'];}?>" class="img-fluid img-responsive" alt="Budlong 60 Years"> </div>
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
            
                        
        
        <!--================Testimonials Area =================-->
        <section class="clients_logo_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>OUR CLIENTS</h2>
                    <p>We develop long-term relationships with our clients, representing businesses.</p>
                </div>
                <div class="clients_logos">
                    <p style="text-align: center;">          
                <?php if (count($clients_data) > 0) {
                foreach ($clients_data as $value) {
                    ?>

                    <img src="uploads/clients/<?php echo $value['name']?>" />
                    <?php }}?> 

                     
                    </p>				                   
                </div>
            </div>
        </section>
        <!--================End Testimonials Area =================-->