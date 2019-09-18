
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
            if (count($product_photos) > 0) {
                foreach ($product_photos as $value) {
                    ?>
                                <div><img src="<?php echo base_url();?>uploads/products/photos/<?php echo $value['photo_name']; ?>" class="img img-responsive" alt></div>
			<?php }} ?>
                            </div>
                            <div class="slider-nav">
                               <?php
            if (count($product_photos) > 0) {
                foreach ($product_photos as $value) {
                    ?>
				

                                <div><img src="<?php echo base_url();?>uploads/products/photos/<?php echo $value['photo_name']; ?>" class="img img-responsive" alt></div>
								
			<?php }} ?>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-6">
                        <div class="product-details">
                            <h2><?php echo $product_data['product_name']; ?></h2> 
                              
                            <p><?php echo $product_data['product_description'];?></p> 
                            <br/>
                           <a href="<?php echo base_url();?>contact-us"> <button class="btn theme-btn" >Get a Quote</button></a>
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

<div class="getaquotemodal modal fade" id="quoteModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Get A Quote</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			<form>
              <div class="form-group">
                <label for="exampleInputfname">First Name</label>
                <input type="firstname" class="form-control" id="exampleInputfname" placeholder="Enter first name">
              </div>
              <div class="form-group">
                <label for="exampleInputlname">Last Name</label>
                <input type="lastname" class="form-control" id="exampleInputlname" placeholder="Enter last name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputmobile">Mobile Number</label>
                <input type="password" class="form-control" id="exampleInputmobile" placeholder="Enter mobile number">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Browse</label>
                <input type="file" id="exampleInputFile"> 
              </div>
<!--
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Check me out
                </label>
              </div>
-->
              <button type="submit" class="btn btn-default theme-btn">Submit</button>
            </form> 
		</div> 
	</div>
  </div>
</div>
