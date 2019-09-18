
        <script src="http://benchmarkagencies.com/assets/js/jquery.min.js"></script>
        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Product Details</h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li><a href="<?php echo base_url();?>products">Product Details</a></li>
                            <li><?php echo $product_data['product_name']; ?></li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->


        <!-- start sop-details-main-content -->
        <section class="shop-details-main-content section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6">
                        
                        <div class="shop-single-slider-wrapper">
                            <div class="slider-for">
                             <?php
                            
                             if (!empty($product_photos)) {
                                foreach ($product_photos as $value2) {
                                    ?>
                                    <div><img src="<?php echo base_url();?>uploads/products/photos/<?php echo $value2['photo_name']; ?>" class="img img-responsive" alt></div>
                                <?php }}else{ ?> 
                                    
                                    <div><img src="<?php echo base_url();?>uploads/products/photos/no_product_image.png" class="img img-responsive" alt></div>

                                   <?php  ?>

                                <?php } ?>
                            </div>
                            <div class="slider-nav"> 
           
                              
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-6">
                        <div class="product-details">
                            <h2><?php echo $product_data['product_name']; ?></h2> 
                            <p><?php echo $product_data['product_description'];?></p>
                            <br/>        
                            <table border="1">
                                <tbody>
                                    <tr>
                                        <td colspan="2" style="background: #eaeaea;"><b style="font-size:18px;">Features</b></td> 
                                    </tr>
                                    <tr>
                                        <td width="140"><b>Product Capacity </b></td> 
                                        <td><p><?php echo $product_data['product_Capacity'];?></p></td>
                                    </tr>
                                    <tr>
                                        <td width="140"><b>Product Features </b></td> 
                                        <td><p><?php echo $product_data['product_isFeatured2'];?></p></td>
                                    </tr>
                                    <tr>
                                        <td width="140"><b>Product Warranty </b></td> 
                                        <td><p><?php echo $product_data['product_modelno'];?></p></td>
                                    </tr>
                                    <tr>
                                        <td width="140"><b>Product Color </b></td> 
                                        <td><p><?php echo $product_data['product_color'];?></p></td>
                                    </tr>
                                     <tr>
                                        <td width="140"><b>Product Dimension</b></td> 
                                        <td><p><?php echo isset($product_data['product_dimension']) ? $product_data['product_dimension'] : 'N/A';?></p></td>
                                    </tr> 
                                    <tr>
                                        <td width="140"><b>Product Ideal For</b></td> 
                                        <td><p><?php echo $product_data['product_Idealfor'];?></p></td>
                                    </tr> 
                                </tbody>
                            </table>    
                             
                            <br/>
                             <!--   <a href="javascript:;" data-toggle="modal" data-target="#quoteModal"> <button class="btn theme-btn" >Get a Quote</button></a> -->  

                             <button type="button" class="btn btn-danger btn-large btngetaquote" data-toggle="modal" data-target="#quoteModal"><b>Get a Quote</b></button>
                             
                                <div id="loader">
                                    <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                </div>
                                <!-- <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i> -->

                            </div>
                           <div class="clearfix"></div>
                            <div class="error-handling-messages">
                                <div id="success" class="alert alert-success" style="display: none;">Your Email has successfully been sent.</div>
                                <div id="error" class="alert alert-danger" style="display: none;"> Error occurred while sending email. Please try again later. </div>
                            </div>
                            <!--<button class="btn theme-btn" data-toggle="modal" data-target="#quoteModal">Get a Quote</button>-->
                        </div> <!-- end product details -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <!--
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="product-info">
                             Nav tabs 
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                                <li><a href="#review" data-toggle="tab">Review <span>3</span></a></li>
                                <li><a href="#tags" data-toggle="tab">Add tags</a></li>
                            </ul>

                           
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In praesentium consectetur odit quos vel, similique dolores, ex a adipisci, optio veniam quidem officia nisi recusandae sunt! Autem nemo libero quo?</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In praesentium consectetur odit quos vel, similique dolores, ex a adipisci, optio veniam quidem officia nisi recusandae sunt! Autem nemo libero quo?Lorem ipsum dolor sit amet, consectetur adipisicing elit. In praesentium consectetur odit quos vel, similique dolores, ex a adipisci, optio veniam quidem officia nisi recusandae sunt! Autem nemo libero quo?</p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="review">
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <div class="client-review">
                                                <div class="client-pic">
                                                    <img src="assets/images/shop/review/img-1.jpg" alt>
                                                </div>
                                                <div class="details">
                                                    <div class="name-rating-time">
                                                        <div class="name-rating">
                                                            <div>
                                                                <h4>Michel vance</h4>
                                                            </div>
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="time">
                                                            <span>03 mins ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="client-review">
                                                <div class="client-pic">
                                                    <img src="assets/images/shop/review/img-2.jpg" alt>
                                                </div>
                                                <div class="details">
                                                    <div class="name-rating-time">
                                                        <div class="name-rating">
                                                            <div>
                                                                <h4>Rocky</h4>
                                                            </div>
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="time">
                                                            <span>03 mins ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="client-review">
                                                <div class="client-pic">
                                                    <img src="assets/images/shop/review/img-3.jpg" alt>
                                                </div>
                                                <div class="details">
                                                    <div class="name-rating-time">
                                                        <div class="name-rating">
                                                            <div>
                                                                <h4>philip</h4>
                                                            </div>
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="time">
                                                            <span>03 mins ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  

                                        <div class="col col-md-6 review-form-wrapper">
                                            <div class="review-form">
                                                <h4>Here you can review this item</h4>
                                                <form>
                                                    <div>
                                                        <input type="text" class="form-control" placeholder="Your Name *" required>
                                                    </div>
                                                    <div>
                                                        <input type="email" class="form-control" placeholder="Email *" required>
                                                    </div>
                                                    <div>
                                                        <textarea class="form-control" placeholder="Review *"></textarea>
                                                    </div>
                                                    <div class="rating-post">
                                                        <div class="rating">
                                                            <a href="#" title="1 Out of 5">
                                                                <i class="fa fa-star"></i>
                                                            </a>
                                                            <a href="#" title="2 Out of 5">
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i>
                                                            </a>
                                                            <a href="#" title="3 Out of 5">
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"> </i> 
                                                                <i class="fa fa-star"></i>
                                                            </a>
                                                            <a href="#" title="4 Out of 5">
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i>
                                                            </a>
                                                            <a href="#" title="5 Out of 5">
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i>
                                                            </a>
                                                        </div>

                                                        <div class="submit">
                                                            <button type="submit" class="btn theme-btn">Post review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tags">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam minima non fuga hic harum, quis assumenda. Praesentium, impedit. Ipsam enim sed eos vero pariatur quibusdam distinctio, obcaecati unde fuga consequuntur!</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam minima non fuga hic harum, quis assumenda. Praesentium, impedit. Ipsam enim sed eos vero pariatur quibusdam distinctio, obcaecati unde fuga consequuntur!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div> <!-- end of container -->
        </section>
        <!-- end of sop-details-main-content -->    

<div class="getaquotemodal modal fade" id="quoteModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Get A Quote</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
            <div class="form asdsa">
			<form method="post" id="get-a-quote"  class="wpcf7-form contact-validation-active">

 <input type="hidden" name="proname" value="<?php echo $product_data['product_name']; ?>">
            <input type="hidden" name="procapacity" value="<?php echo $product_data['product_Capacity']; ?>">
            <input type="hidden" name="procolors" value="<?php echo $product_data['product_color']; ?>"> 
            
              <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputfname">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="exampleInputfname" placeholder="Enter first name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputlname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="exampleInputlname" placeholder="Enter last name">
                  </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                    </div>
                </div>
                <div class="clearfix"></div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputmobile">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control" id="exampleInputmobile" placeholder="Enter mobile number" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" >
                      </div>
                    </div>
                </div>


                        <div class="clearfix"></div>
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                       <label for="states">States</label>
                                       <select class="form-control select" name="states_name" id="states_name">
                                        <option value="">Select States</option>
                                        <?php foreach ($GetStates as $key => $st) { ?>
                                            <option value="<?php echo $st['name']; ?>"><?php echo $st['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="City">City</label>
                                        <input placeholder="Enter City name" type="text" class="form-control" id="city_name" name="city_name">
                        </div>
                    </div>
                </div>

               <div class="clearfix"></div>
              <div class="row">
                  <div class="col-md-12">       
                      <div class="form-group">
                        <label for="exampleInputFile">Browse</label>
                        <input type="file" id="exampleInputFile" name="file"> 
                      </div>
                    </div>
                </div>
                <div class="clearfix"></div>
      <!--   recaptcha  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <div class="recaptchasignup">
                            <div class="g-recaptcha" id="reportReCaptcha" data-sitekey="6Lc0Dp0UAAAAANpHw32R5bPT2fUqGFEzlkMUGGM2" data-callback="reportReCaptchaCallback" data-expired-callback="reportReCaptchaExpiredCallback"></div>
                        </div>   
                      </div>  
                  </div>  
                </div>  
                      -->



<!--
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Check me out
                </label>
              </div>
--> 
                <div class="clearfix"></div>
              <div class="row">
                  <div class="col-md-12">
                     <div class="center-block">
                        <button type="submit" class="btnsubmit btn btn-danger btn-large">Submit</button>
                     </div>   
                  </div>    
              </div>    
            </form> 
        </div>
		</div> 
	</div>
  </div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {
    $(".fa-refresh").hide();
});
    $(".btngetaquote").click(function(){
  $(".fa-refresh").show(1000);
});
    
  
</script>
