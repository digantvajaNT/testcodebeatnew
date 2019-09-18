<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
    <!-- start of hero -->
    <section class="hero hero-slider-wrapper homesliderbanner">
        <div class="hero-slider hero-slider-style-1">
             <?php
            if (count($sliders_data) > 0) {
                foreach ($sliders_data as $value) {
                    ?>
            <div class="slide">
                <img src="<?php echo base_url();?>uploads/sliders/<?php echo $value['slider_image'];?>" alt class="slider-bg">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-8 col-sm-9 slide-caption">
				<img src="<?php echo base_url();?>uploads/mob_sliders/<?php echo $value['slider_mob_image'];?>" alt class="mobimage hidden-lg hidden-md
">
                             <!-- <h2><?php echo $value['slider_title'];?></h2>
                            <p><?php echo $value['slider_content'];?></p>
                           <div class="btns">
                                <a href="<?php echo $value['slider_redirect_link'];?>" class="theme-btn">Explore</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
		<?php } }  ?>

        </div>
    </section>
    <!-- end of hero slider -->

    <!-- start of services -->
    
    <!-- end of services -->

    <!-- Project Photo Gallary-->
    

    <section class="shop-details-main-content showroompage section-padding">
        <div class="container">
        <div class="row">
            <div class="col col-lg-9 col-md-9">
                <div class="section-title">
                    <h2>Our Projects</h2>
                </div>
            </div>
        </div>
        <div class="row">
        <article class="lifeatbenchmark-main sticker" style="height: 300px;">
                <div class="col-sm-12 col-xs-12">
                    <div class="shop-single-slider-wrapper">
                    <div class="multiple-items">
                       <?php
                       if (count($project_data) > 0) {
                        foreach ($project_data as $value) {
                            ?>
                            <div class="tile scale-anm csr all gg-element"><img src="<?php echo base_url();?>uploads/projects/<?php echo $value['project_image'];?>" class="img img-responsive" alt="" />
                                <i class="fa fa-eye"></i></div>
                        <?php }}?>
                </div> 
                </div>  
                </div>
                </div>

                <div style="clear:both;"></div>

            </div>
        </article>
        <div id="gg-screen"></div>
    </section>

    <!-- End Project Photo Gallary -->


    <!-- start of Our Achievements -->
    <section class="section-padding offer-section ourachievements">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-12">
                            <div class="section-title-s4">
                                <h2>Our Achievements</h2> 
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="section-title-s3">
                                <h2>Benchmark was awarded Eminence Award for Best in Hot Water Solutions.</h2>
                            </div>                        
                            <div class="offer-text">
                                <p><?php echo $get_achievement[0]['description'];?></p> 
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="offer-pic">
                                <img src="<?php echo base_url(); ?>uploads/home/<?php echo $get_achievement[0]['image_url'];?>" alt="">
                            </div>
                        </div>
                    </div> 
                </div>  
            </section>
    <!-- End of Our Achievements -->

  

    <!-- start contact-section -->
    <section class="contact-section section-padding parallax">
        <div class="container">
            <div class="row">
                <div class="col col-md-5 col-md-5">
                    <section class="text-center vid_modal">                      
                      <img data-toggle="modal" data-target="#homeVideo" class="img-responsive" src="<?php echo base_url(); ?>assets/images/video-thumb.png" onclick="playVid()" />
                    </section>
                </div>

                <div class="col col-lg-6 col-lg-offset-1 col-md-7">
                    <div class="section-title-white">
					<?php
					 echo $this->session->flashdata('email_sent'); 
					?>
                        <h2>Get a Free Demo</h2>
                    </div>
                    <p>Get free demo of our Alkaline Water Ionizer machine and see how you can change the way you drink your water.</p>

					
                    <div class="contact-form-s1 form asdsa">
                        <form method="post" id="contact-form"  class="wpcf7-form contact-validation-active">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" id="phone" name="phone" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" >
                                </div>
                            </div> 
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label for="address">Email</label>
                                    <input type="email" id="email" name="email">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label for="address">Message</label>
                                    <input type="text" id="message" name="message">
                                </div>
                            </div> 
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="recaptchasignup">
                                        <div class="g-recaptcha" id="reportReCaptcha" data-sitekey="6Lc0Dp0UAAAAANpHw32R5bPT2fUqGFEzlkMUGGM2" data-callback="reportReCaptchaCallback" data-expired-callback="reportReCaptchaExpiredCallback"></div>

                                    </div> 
                                </div>

<!--
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="submit-btn-wrap">
                                        <input value="Submit" class="theme-btn wpcf7-submit" type="submit">
                                        <div id="loader">
                                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                        </div>
                                    </div>
                                </div>
-->
                            </div> 
                            <div class="clearfix"></div>
                            <div class="row"> 
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="submit-btn-wrap">
                                        <input value="Submit" class="theme-btn wpcf7-submit" type="submit" style="width: auto;    padding: 10px 50px;    height: auto;">
                                        <div id="loader">
                                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="clearfix"></div>
                            <div class="error-handling-messages">
                                <div id="success">Your Email has successfully been sent.</div>
                                <div id="error"> Error occurred while sending email. Please try again later. </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
<!--
        <div class="contact-women wow fadeInLeft">
            <img src="assets/images/Side_image.png" alt>
        </div>
-->
    </section>
    <!-- end contact-section -->

  
    <!-- start partners -->
    <section class="section-padding">        
        <div class="container">
            <div class="row">
                <div class="col col-md-8">
                    <div class="section-title-s4">
                        <h2>Our Clients</h2>
                        <p>We nurture every client relationship with commitment, passion and integrity, which is the reason why most of our clients have been with us through the decade of our existence.</p>
                    </div>
                </div>                
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="partners-slider">
					<?php
            if (count($clients_data) > 0) {
                foreach ($clients_data as $value) {
                    ?>
                        <div class="grid">
                            <img src="<?php echo base_url();?>uploads/clients/<?php echo $value['name']?>" alt>
                        </div>
					<?php }} ?>
                        
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end partners -->

    <!-- start testimonials 
    <section class="testimonials section-padding parallax" style="background: #949494;" id="testimonialsmain">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="testimonials-slider slider-arrow-s1">
					<?php
            //if (count($testimonial_data) > 0) {
                //foreach ($testimonial_data as $value) {
                    ?>
                        <div class="slide-item">
                            <div class="inner">
                                <div class="client-quote">
                                    <p><?php //echo $value['description'];?></p>
                                </div>
                                <div class="client-details">
                                   <?php //if($value['team_image']){?>
                                        <div class="client-pic">
                                            <img src="<?php// echo base_url();?>uploads/home/<?php //echo $value['team_image'];?>" alt>
                                        </div>
									<?php// }else{?>
									<div class="client-pic">
                                            <img src="<?php //echo base_url();?>assets/images/no-image.png" alt>
                                        </div>
									<?php// }?>
                                    <div class="client-info">
                                        <h4><?php //echo $value['committee_name'];?></h4>
                                        <span><?php //echo $value['desgination'];?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php // }} ?>
                        <div class="slide-item">
                            <div class="inner">
                                <div class="client-quote">
                                    <p>Our water heats much faster, and we’ve seen savings on our electric bill. It's been a long time since I had e had that high level of customer service. Definitely going to use hot water now if I have any plumbing problems in the future!</p>
                                </div>
                                <div class="client-details">
                                    <div class="client-pic">
                                        <img src="assets/images/testimonials/images-team.jpg" alt>
                                    </div>
                                    <div class="client-info">
                                        <h4>Michelle Williams</h4>
                                        <span>CTO, Patrix</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- end testimonials -->
<!--
<div id="myModal" class="modal homeonloadmodal fade">
    <div class="modal-dialog modal-lg modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
            </div>
            <div class="modal-body">
				<img src="assets/images/ish-invitation-card.png" alt="ISH Invitation">
            </div>
        </div>
    </div>
</div>
-->
    <!-- Start Video Modal -->
    <!-- Home Video Modal -->
        <div class="modal fade" id="homeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <button type="button" class="btn btn-default" data-dismiss="modal" onclick="pauseVid()">X</button>
<!--
              <div class="embed-responsive embed-responsive-16by9">
                <video id="gossVideo" class="embed-responsive-item" controls="controls" poster="http://www.gossettmktg.com/video/dangot.png">
                  <source src="http://www.gossettmktg.com/video/dangot.mp4" type="video/mp4">
                  <source src="http://www.gossettmktg.com/video/dangot.webm" type="video/webm">
                  <source src="http://www.gossettmktg.com/video/dangot.ogv" type="video/ogg">
                  <object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="353" height="190">
                    <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
                    <param name="allowFullScreen" value="true">     <param name="wmode" value="transparent">
                    <param name="flashVars" value="config={'playlist':['http%3A%2F%2Fwww.gossettmktg.com%2Fvideo%2Fdangot.png',{'url':'http%3A%2F%2Fwww.gossettmktg.com%2Fvideo%2Fdangot.mp4','autoPlay':false}]}">
                    <img alt="Big Buck Bunny" src="http://www.gossettmktg.com/video/dangot.png" width="353" height="190" title="No video playback capabilities, please download the video below">
                  </object>
                </video>
              </div>
-->
                <iframe width="100%" height="420" src="https://www.youtube.com/embed/gIx7af6XYQw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
    <!-- End Video Modal -->

   
    <!-- <script type="text/javascript">
        var vid = document.getElementById("gossVideo"); 

            function playVid() { 
                vid.play(); 
            } 

            function pauseVid() { 
                vid.pause(); 
            } 

    </script> -->
     <!--  <script src="https://www.google.com/recaptcha/api.js?render=6LcKDJ0UAAAAAAbpjGNp2bmSnNDtk6rIW82oS7ii"></script> -->

    