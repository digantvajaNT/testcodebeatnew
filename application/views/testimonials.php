

        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Testimonials</h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li>Testimonials</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->


        <!-- start testimoials-s2 -->
        <section class="section-padding testimonials-s2-grid-view-section testimonialpage">
            <div class="container"> 
                    <div class="col col-lg-12">
                        <div class="testimoials-s2-grids testimoials-s2-grid-view">
						<?php
				if (count($testimonial_data) > 0) {
                foreach ($testimonial_data as $value) {
                    ?>
                            <div class="testimoials-s2-grid">
                                <div class="client-quote">
                                    <p><?php echo $value['description'];?></p>
                                </div>
                                <div class="client-info">
                                    <div class="details">
									<?php if($value['team_image']){?>
                                        <div class="pic">
                                            <img src="<?php echo base_url();?>uploads/home/<?php echo $value['team_image'];?>" alt>
                                        </div>
									<?php }else{?>
									<div class="pic">
                                            <img src="<?php echo base_url();?>assets/images/no-image.png" alt>
                                        </div>
									<?php }?>
                                        <div class="info">
										<h4><?php echo $value['committee_name'];?></h4>
                                        <p><?php echo $value['desgination'];?></p>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
			<?php }}?>
                        </div>
                    </div> 
            </div> <!-- end container -->
        </section>
        <!-- end testimoials-s2 --> 