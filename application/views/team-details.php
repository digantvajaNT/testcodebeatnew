
        
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
        
        <!--================Post Slider Area =================-->
		<section class="sample-text-area team_txt_area pt-5 overwrite_content">
			<div class="container">
                <!-- <div class="team_title">
				    <h3 class="text-heading title_color">Our Team</h3>
                    <br/>
                </div> -->
                <div class="team_details">
                    <div class="team_details_img">
                        <div class="team_img">
                            <img src="<?php echo base_url(); ?>uploads/home/<?php echo $team_data[0]['team_image']?>">
                        </div>
                    </div>
                    <div class="team_details_txt">
                        <h2><?php echo $team_data[0]['committee_name']?></h2>
                        <h4><?php echo $team_data[0]['desgination']?></h4>
        				<p class="sample-text">
        					<?php echo $team_data[0]['description']?>
        				</p>
                    </div>
                </div>                
			</div>
		</section>		
        <!--================End Post Slider Area =================-->
        