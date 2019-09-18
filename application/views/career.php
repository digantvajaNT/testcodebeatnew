<?php include("includes/header.php"); ?>

    <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Career</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li>Career</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title --> 
   

        <!-- start our-team -->
        <section class="our-team offersection our-team-bg section-padding">
            <!-- What we Offer SECTION START -->
            <div class="section-full bg-gray p-t80 p-b57"> 
                <!-- TITLE START-->   
                <div class="container">    
<!--
                    <div class="section-head text-center">
                        <h2 class="text-uppercase borderred centerborder">Join Us!!</h2>                       
                    </div> 
-->
<!--
                    <div class="section-content" data-toggle="tab-hover">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
								<?php
                             //if(count($allcareer) > 0) {
                            //foreach($allcareer as $value){    ?> 
                                    <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12 col-xs-100pc">
                                        <div class="wt-box block-md clearfix  bg-white block-shadow m-b30 radius-md overflow-hide">
                                            <div class="wt-media" style="background:url('<?php //echo base_url(); ?>assets/images/banner/<?php //echo $value['img_url']; ?>');"></div>
                                            <div class="wt-info text-left p-a20 overflow-hide">
                                                <h4 class="text-uppercase"><?php //echo $value['tech_name']; ?></h4> 
                                                <p>Location: <?php //echo $value['location']; ?></p>
                                                <p>Experience: <?php// echo $value['experience']; ?></p>
                                                <br/>
                                                <a href="<?php //echo base_url().'career/career-detail/'.$value['c_id'];?>" class="theme-btn text-primary font-weight-600">Read More &nbsp;<i class="fa fa-angle-right"></i></a>
                                             </div>
                                        </div>
                                    </div>
							 <?php //}}?>
                                    
                                </div>                            
                            </div>
                                                     
                        </div>    
                    </div>                    
-->
                    <div class="topcommonsection">
                        <h3>At Benchmark, You Will Experience :</h3>
                        <ul>
                            <li>People feel gracious and make difference with their presence each day</li>
                            <li>Homely work environment which makes the employee feel like family in the organization</li>
                            <li>Trust at each level of hierarchy</li>
                            <li>Growth together</li>
                            <li>Pushing the boundaries</li>
                        </ul>
                    </div>
                    <div class="careerapplyform">
                        <form class="block mbr-form" action="" method="post" id="careerapplyform"> 
                            <div class="row"> 
                                <div class="col-md-12">
                                    <h3 class="border-bottom">Join Us!!</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 multi-horizontal" data-for="name">
                                        <label>Enter your name</label>
                                        <input type="text" class="form-control input" name="name" data-form-field="Name" placeholder="Your Name" required="" id="name-form4-2y">
                                    </div>
                                    <div class="col-md-6" data-for="email">
                                        <label>Enter your Email Id</label>
                                        <input type="text" class="form-control input" name="email" data-form-field="Email" placeholder="Email" required="" id="email-form4-2y">
                                    </div> 
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row"> 
                                <div class="form-group">
                                    <div class="col-md-6" data-for="designation">
                                        <label>Enter your designation</label>
                                        <input type="text" class="form-control input" name="email" data-form-field="Email" placeholder="Designation" required="" id="email-form4-2y">
                                    </div>
                                    <div class="col-md-6 multi-horizontal" data-for="phone">
                                        <label>Enter your phone number</label>
                                        <input type="text" class="form-control input" name="phone" data-form-field="Phone" placeholder="Phone" required="" id="phone-form4-2y">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row"> 
                                <div class="form-group">
                                    <div class="col-md-12" data-for="designation">
                                        <label>Upload CV</label>
                                        <div class="file-upload">
                                          <div class="file-select">
                                            <div class="file-select-button" id="fileName">Choose File</div>
                                            <div class="file-select-name" id="noFile">No file chosen...</div> 
                                            <input type="file" name="chooseFile" id="chooseFile">
                                          </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12" data-for="message">
                                        <label>Enter your message</label>
                                        <textarea class="form-control input" name="message" rows="3" data-form-field="Message" placeholder="Message" style="resize:none" id="message-form4-2y"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                    <button type="submit" class="btn theme-btn btn-form">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                
            </div>   
            <!-- What we Offer SECTION END --> 

        </section>
        <!-- end our-team --> 


    <?php include("includes/footer.php"); ?>

     <script>
 /* Equal height js */
	$(document).ready(function(){

        var maxHeight1 = 0;
        
        $(".wt-info").each(function(){
           if ($(this).height() > maxHeight1) { maxHeight1 = $(this).height(); }
        });

        $(".wt-info").height(maxHeight1);  
    }); 

    $(window).resize(function(){
        $(".wt-info").height(maxHeight1); 
    }); 
</script>