  
        
         
        
        <!--================Blog Area =================-->
        <section class="blog_area mt-5 pt-5 pos_rel search_result">
            <div class="container">
                <div class="row m-0">
                    <div class="col-lg-12 pr-0">
                        <div class="main_title">
                            <h2>Search Results For : <span><?php echo $search_word;?></span> </h2>                            
                        </div>
                        <div class="row blog_left_sidebar">
						<?php
            if (count($search) > 0) {
                foreach ($search as $value) {
                    ?>      
                            <article class="col-md-4 blog_item">                              
                                <div class="">
                                    <div class="blog_post">                                        
                                        <div class="blog_details">
										<?php if (isset($value['product_name'])) { ?>
                                            <a href="<?php echo base_url(); ?>products/detail/<?php echo $value['product_unique_slug'];?>">
											<img class="img-fluid search_result_img" src="<?php echo base_url(); ?>uploads/products/covers/<?php echo $value['producr_cover_image'];?>" alt="<?php echo $value['product_unique_slug']; ?>">
                                                <?php }else{?></a>
										 <a href="<?php echo base_url(); ?>services">
										 <img class="img-fluid search_result_img" src="<?php echo base_url(); ?>uploads/home/<?php echo $value['image_service_url'];?>" alt="<?php echo $value['name']; ?>">
										<?php }?></a>
                                            <div class="eqheight">    
                                                <h2>
                                                <?php if (isset($value['product_name'])&&!empty($value['product_name'])){echo $value['product_name'];}?>
                                                <?php if (isset($value['name'])&&!empty($value['name'])){echo $value['name'];}?>
                                                </h2> 
                                                <?php if (isset($value['product_description'])&&!empty($value['product_description'])){
                                                $pos=strpos($value['product_description'], ' ', 90);
                                                echo substr($value['product_description'],0,$pos );?>
                                                <a href="<?php echo base_url(); ?>products/detail/<?php echo $value['product_unique_slug'];?>" class="theme-btn bottombtn">Read More</a>
                                                <?php }?>
                                                <?php if (isset($value['description'])&&!empty($value['description'])){
                                                $pos=strpos($value['description'], ' ', 90);
                                                echo substr($value['description'],0,$pos );?>
                                                <a href="<?php echo base_url(); ?>services" class="theme-btn bottombtn">Read More</a>
                                                <?php }?> 
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </article>
					<?php }}else{?>
                            <!-- Not Found -->
                                <div class="cont_principal">
                                <div class="cont_error col-md-12">                                  
                                <h1>Oops</h1>  
                                  <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                                  </div>
                                <div class="cont_aura_1"></div>
                                <div class="cont_aura_2"></div>
                                </div>
                            <!-- Not Found -->
					<?php }?>
                          
                        </div>
                    </div>                   
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        <script>
            window.onload = function(){
            document.querySelector('.cont_principal').className= "cont_principal cont_error_active";  
              
            }
        </script>
        