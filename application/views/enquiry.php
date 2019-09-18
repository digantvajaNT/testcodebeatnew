
<section class="section lb p120 enquirybanner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>ENQUIRY</h3>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end section -->

<section class="section enq">
    <div class="container">
        <div class=" ">
            <!--     <div class="row">                        
                    <div class="col-md-12">
                        <div class="shop-desc">
                            <h3>Lorem Ipsum text</h3>                                
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis consequat condimentum. In a tincidunt purus. Curabitur facilisis luctus aliquet. Aenean a cursus erat, sit amet interdum arcu. Mauris aliquam magna turpis, lobortis pellentesque velit elementum et. Nulla scelerisque a lorem nec posuere. Nunc convallis posuere tincidunt. Pellentesque a aliquet odio. Integer euismod, enim id lacinia auctor, tortor turpis malesuada enim, in semper turpis magna quis enim.</p>                                
                        </div>
                    </div>
                </div>-->
            <div class="row">   
                <div class="col-md-12">
                    <div class="shop-extra">
                        <ul class="nav nav-tabs">                                    
                            <li class="active"><a data-toggle="tab" href="#menu2">Enquiry
                                <?php if(isset($product_detail)){ echo 'For &nbsp;'.$product_detail[0]['product_name']; } ?>
                                </a></li>
                        </ul>

                        <div class="tab-content">                                                                        
                            <div id="menu2" class="tab-pane fade in active">
                                <h3>Ask your questions</h3>

                                       <!--  <p>Lorem Ipsum is simply dummy text of the printing and typesetting*</p>  -->
                                <?php
                                $attributes = array('role' => 'form', 'id' => 'frmenquiry', 'name' => 'frmenquiry', 'class' => 'big-contact-form row');
                                echo form_open('enquiry', $attributes);
                                ?>	 										
                                <!--  <form class="big-contact-form row" role="search"> -->                                                       
                                <div class="col-md-6">   
                                    <input type="text" class="form-control" placeholder="Enter your name.." name="user_first_name" id="user_first_name" required>
                                </div>     
                                <div class="col-md-6">   
                                    <input type="email" class="form-control" name="user_email_address" id="user_email_address" placeholder="Enter email.." required>
                                </div> 
                                <div class="col-md-6">   
                                    <input name="user_mobile_no" id="user_mobile_no" class="form-control" required placeholder="Enter your Phone.." type="text" maxlength="15" onkeypress='return validateNumField(event);' />
                                </div>     
                                <div class="col-md-6">   
                                    <input name="user_address" id="user_address" class="form-control" required placeholder="Enter your Address.." type="text" />

                                </div>             
                                <div class="col-md-12">
                                    <textarea name="user_message" id="user_message" class="form-control"  required placeholder="Your reviews.." type="text" cols="4" rows="2"></textarea>
                                </div>
                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>              
                                <!-- </form> -->
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div><!-- end shop-extra -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis">

            <!--                    <div class="related-products">
                                    <div class="text-widget">
                                        <h3>Related Products</h3>
                                    </div> end title         
            
                                    <div class="row blog-grid shop-grid">
            <?php
            if (count($custom_products) > 0) {
                foreach ($custom_products as $prd) {
                    $sLink = base_url() . 'products/index/' . $prd['product_unique_slug'];
                    //echo $sLink;
                    //exit;
                    ?>
                                                                     <div class="item" onclick="javascript: window.location.href='<?php echo $sLink; ?>';">
                                                <div class="col-md-3">
                                                    <div class="course-box shop-wrapper">
                                                        <div class="image-wrap entry">
        <?php if ($prd["producr_cover_image"] != '' && file_exists('./uploads/products/covers/' . $prd["producr_cover_image"])) { ?>
                                                                                  <img src="<?php echo base_url() . 'uploads/products/covers/' . $prd["producr_cover_image"]; ?>" class="img-responsive">
                        
        <?php } else { ?>
                                                                
                                                                <div style="background:url('<?php echo base_url() . 'assets/img/place-holder.svg'; ?>') no-repeat;"  class="placeholderimage"></div>
                                                                
        <?php } ?>
                                                            <img src="images/Pipe-Support-For-Insulated-Pipe.jpg" alt="" class="img-responsive">
                                                            <div class="magnifier">
                                                                <a href="#" title=""><i class="flaticon-add"></i></a>
                                                            </div>
                                                        </div>
                                                         end image-wrap 
                                                        <div class="course-details shop-box text-center">
                                                            <h4>
                                                                <a href="#" title=""><?php echo $prd["product_name"]; ?></a>                                            
                                                            </h4>
                                                        </div>                                    
                                                    </div> end box 
                                                </div> end col 
    <?php }
} ?>
                                       </div> end col 
                                    </div> end row 
                                </div> end related -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>

