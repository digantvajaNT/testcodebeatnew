

        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
					<?php if (count($maincategory_data1) > 0) {
						
							 if($maincategory_data1['ManuCtegory_id'] == 1){
								 $hadename = "Residential Water Heaters";
							 }elseif($maincategory_data1['ManuCtegory_id'] == 2){
								 $hadename = "Commercial Water Heaters";
							 }elseif($maincategory_data1['ManuCtegory_id'] == 3){
								 $hadename = "Alkaline Water Ionizer";
							 }
						?>
                        <h2><?php echo $hadename; ?> </h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li><?php echo $hadename; ?></li>
							
					<?php } ?>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->
        
        <div class="clearfix"></div>
        
        <!-- start testimonials -->
        <section class="testimonials productscategory parallax" style="background: #949494;" id="testimonialsmain">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="form-group ddr_portfolio"> 
                            <select class="form-control" onchange="location = this.value;">
                                 <option value="">Select</option>
                             <?php if (count($maincategory_data) > 0) {
                            foreach ($maincategory_data as $catRow) {
								
                                ?>
                                 <option value="javascript: window.location.href = '<?php echo base_url() . 'category/' . $catRow['category_id'] . "/" . $catRow['ManuCtegory_id']; ?>';"><?php echo $catRow["category_name"]; ?></option> 
								 
                                <?php } }?>
                                
                            </select>
                        </div>
                        <div class="toggles portfolioFilter">
                           
							
						<!--	<?php if (count($category_data) > 0) {
                            foreach ($category_data as $catRow) {
                                ?>
                            <div class="slide-item">
                                <div class="inner">
								 <button class=" text-hover"  onclick="javascript: window.location.href = '<?php echo base_url() . 'category/' . $catRow['category_slug']; ?>';"><?php echo $catRow["category_name"]; ?></button>
                                </div>
                            </div>
							 <?php } }?>	-->
							 <?php 
							 

							 if (count($maincategory_data) > 0) {?>
							  <div class="productslider slider-arrow-s1">
							 <div class="inner">
                                <?php if (count($maincategory_data) > 1) {?>
						 <button class="active text-hover" id="All" onclick="javascript: window.location.href = '<?php echo base_url() . 'products/Water/' . $maincategory_data1['ManuCtegory_id']; ?>';">All</button>
                        <?php } ?>
						<!--    <button class="active text-hover" id="All" onclick="javascript: window.location.href = '';">All</button>-->
                                </div>
							 <?php
                            foreach ($maincategory_data as $catRow) {
								
                                ?>
                            <div class="slide-item">
                                <div class="inner">
								 <button class=" text-hover"  onclick="javascript: window.location.href = '<?php echo base_url() . 'category/' . $catRow['category_id'] . "/" . $catRow['ManuCtegory_id']; ?>';"><?php echo $catRow["category_name"]; ?></button>
                                </div>
                            </div>
							 <?php } ?></div><?php } 
							 
							 ?>	
                            
                            
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end testimonials -->

        <div class="clearfix"></div>
        <input type="hidden" name="hdn_page" id="hdn_page" value="0"/>

        <!-- start products-section -->
        <section class="products-section shop section-padding">
            <div class="productpage">

            <article class="product-list-sec content">
            <div class="container">
                <div class="products-grids">
				<ul class="posts" id="products_section">
                <?php
                if (count($product_data) > 0) {
                    foreach ($product_data as $value) {
                        ?>
                        <li class="post All">
                            <a href="<?php echo base_url().'products/detail/'.$value['product_unique_slug'];?>">
                            <div class="img-box item">
                                
                                <div class="img active">
								 <?php if ($value["producr_cover_image"] != '' && file_exists('./uploads/products/covers/' . $value["producr_cover_image"])) { ?>
                                    <img src="<?php echo base_url(); ?>uploads/products/covers/<?php echo $value['producr_cover_image']; ?>" alt="<?php echo $value['product_modelno'];?>">
								 <?php  } else {?>
								 
								 <div style="background:url('<?php echo base_url() . 'assets/img/place-holder.svg'; ?>') no-repeat;"  class="placeholderimage"></div>

        <?php } ?>
							  </div>  
                                <div class="headline">
<!--                                    <h2><?php // echo $value['product_name']; ?></h2>-->
                                    <span class="icon-link">
									
                                      <!--  <a href="<?php //echo base_url().'products/'.strtolower($value['product_unique_slug']);?>"> -->
                                        
                                            <i class="fa fa-external-link"></i>
                                       
				 <?php if ($value["product_description"] != '' && file_exists('./uploads/products/product_pdf/' . $value["product_description"])) { ?>
								 
                                            <i class="fa fa-download"></i>
                                        
										<?php  } ?>
                                    </span>
                                </div> 
                                     
                            </div>
								<div class="productname">
									<h2><?php echo $value['product_name']; ?></h2>
								</div>
                                </a>
                </li>
 <?php }
                    } ?>

            </ul>
                   <!-- <div class="col col-md-4 col-xs-6">
                        <div class="grid">
                            <a href="product-detail.php">
                                <div class="img-holder-info-list">
                                    <div class="img-holder">
                                        <img src="assets/images/products/img-1.png" alt class="img img-responsive">
                                    </div>
                                    <div class="info-list"> 
                                        <i class="fa fa-eye"></i>  
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3>Water Pump</h3> 
                                </div>
                            </a>
                        </div>
                    </div> -->


                </div> <!-- end row -->
<input type="hidden" name="cat_slug" id="cat_slug" value="<?php echo $category_slug; ?>"/>
<?php// if ($total_products > $per_page) { ?>
            <!--    <div class="ajax-load text-center" style="display:none">
                    <p><img src="<?php echo base_url() . 'assets/img/loading.gif'; ?>"  alt="loading">Loading more products</p>
                </div>
                <div class="col-sm-12 text-center"><a href="javascript:void(0);" class="theme-btn btn btn-default" onclick="loadMoreData();"> <span class="btntext">View More Products</span></a></div>-->
<?php //} ?>

<?php
if(count($product_data) == 0 ){ ?>
<div class="col-sm-12 text-center mtop15">
    <span>Product Not Available</span> 
</div>
<?php } ?>

<?php if ($total_products > $per_page) { ?>
               <div class="ajax-load text-center pro_load" style="display:none">
                    <p><img src="<?php echo base_url() . 'assets/img/loading.gif'; ?>">Loading More Products</p>
                </div>
                
                <div class="col-sm-12 text-center mtop15">
                    
                    <span id="no_val" style="display:none">All Products view successfully</span> 
                    <?php if(count($product_data) > 0 && count($product_data) >= 12){ ?> 

                    <a href="javascript:void(0);" class="theme-btn btn btn-default viewmorebtn" id="show_val" onclick="loadMoreData();"> 
                        <span>View More Products</span>
                    </a>
                <?php } ?>

                </div>
<?php } ?>
            </div> <!-- end container -->
                </article>
            </div>
        </section>
        <!-- end products-section -->       



<script>
 /* Equal height js */
    var maxHeight = 0;
	$(document).ready(function(){
        $(".products-section.shop .products-grids .productname").each(function(){
           if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
        });

        $(".products-section.shop .products-grids .productname").height(maxHeight); 
    }); 

    $(window).resize(function(){
        $(".products-section.shop .products-grids .productname").height(maxHeight); 
    }); 
</script>

<script>
    $(".productslider .owl-item button").on('click', function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    })
</script>