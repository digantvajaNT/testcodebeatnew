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
    <!-- <div class="header-gradient-after" id="myHeader">
      <div class="header-gradient-content">
        <div class="header-gradient-content-inside">
          
         
        </div>
      </div>
    </div> -->
    <!--================End Home Banner Area =================-->

    <!--================Portfolio Details Area =================-->
    <section class="portfolio_details_area mb-5 mt-5 pt-5 overwrite_content">    	
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-sm-12">
        			<div class="bold-underline-links header-gradient-sponsor port_list">
                          <label class="sm-display">Select Portfolio</label>
			              <span id="select_port">Select Option <i class="fa fa-caret-down" aria-hidden="true"></i></span>
			              <ul id="pterms" class="controls">
						  <li class="filter"  data-filter="all">ALL
						  <?php if(count($category_data) > 0){
						$n = 1;
					   		   

					    foreach ($category_data as $value) {
			            //for($i=0;$i<count($category_data);$i++)
							
			            //{ 
			              echo 
						  
						  '<li class="filter"  data-filter=" '.$value['category_slug'].''.$n.'">'.$value['category_name'].'
						  
						  </li>';
			             
			           // }
					   $n++;
							 } 
			          }?>
					  
			               
			            </ul>
				
			       </div>
        		</div>
        	</div>
            <div class="row">
            <div class="col-md-12">
                <div class="about_text mt-2">                                                                        
                    <div class="portfolio-container style">
                        <div id="grid" class="grid">
						 <?php if(count($category_data) > 0){
					   $n = 1;
					  foreach ($category_data as $value) 
					  {	
						$class= '';
						if($value['category_slug'] == 'commercial-building'){
							 foreach ($product_data as $temp) 
					  {	
							
							$pos=strpos($temp['product_description'], ' ', 50);
							$des =  substr($temp['product_description'],0,$pos );
														
							echo '
					<div  class="view view-first  mix  '.$value['category_slug'].''.$n.'  mix_all" style="  ">
					<img width="331" height="216" src="uploads/products/covers/'.$temp['producr_cover_image'].'" class="attachment-home-services size-home-services wp-post-image" alt="">
							<div class="mask">
                                    <h2>'.$temp['product_name'].'</h2>
                                    <p>'.$des.'</p>
                                    <a rel="colorbox" href=" '.base_url().'portfolio-detail/'.$temp['product_unique_slug'].'" class="normal  btn btn-bordered info">View Details &nbsp;&nbsp;+</a>
                                </div>
						  </div>';
						}
						}
						
						if($value['category_slug'] == 'education'){
							 foreach ($product_data_education as $temp) 
					  {	
							$pos=strpos($temp['product_description'], ' ', 50);
							$des =  substr($temp['product_description'],0,$pos );
							echo '
					<div  class="view view-first  mix  '.$value['category_slug'].''.$n.'  mix_all" style="  ">
					<img width="331" height="216" src="uploads/products/covers/'.$temp['producr_cover_image'].'" class="attachment-home-services size-home-services wp-post-image" alt="">
							<div class="mask">
                                    <h2>'.$temp['product_name'].'</h2>
                                    <p>'.$des.'</p>
                                   <a rel="colorbox" href=" '.base_url().'portfolio-detail/'.$temp['product_unique_slug'].'" class="normal  btn btn-bordered info">View Details &nbsp;&nbsp;+</a>
                                </div>
						  </div>';
						}
						}
				
				if($value['category_slug'] == 'health-facilities'){
							 foreach ($product_data_health as $temp) 
					  {	
							$pos=strpos($temp['product_description'], ' ', 50);
							$des =  substr($temp['product_description'],0,$pos );
							echo '
					<div  class="view view-first  mix  '.$value['category_slug'].''.$n.'  mix_all" style="  ">
					<img width="331" height="216" src="uploads/products/covers/'.$temp['producr_cover_image'].'" class="attachment-home-services size-home-services wp-post-image" alt="">
							<div class="mask">
                                    <h2>'.$temp['product_name'].'</h2>
                                     <p>'.$des.'</p>
                                    <a rel="colorbox" href=" '.base_url().'portfolio-detail/'.$temp['product_unique_slug'].'" class="normal  btn btn-bordered info">View Details &nbsp;&nbsp;+</a>
                                </div>
						  </div>';
						}
						}
				
				if($value['category_slug'] == 'higher-education'){
							 foreach ($product_data_higher as $temp) 
					  {	
							$pos=strpos($temp['product_description'], ' ', 50);
							$des =  substr($temp['product_description'],0,$pos );
							echo '
					<div  class="view view-first  mix  '.$value['category_slug'].''.$n.'  mix_all" style="  ">
					<img width="331" height="216" src="uploads/products/covers/'.$temp['producr_cover_image'].'" class="attachment-home-services size-home-services wp-post-image" alt="">
							<div class="mask">
                                    <h2>'.$temp['product_name'].'</h2>
                                    <p>'.$des.'</p>
                                   <a rel="colorbox" href=" '.base_url().'portfolio-detail/'.$temp['product_unique_slug'].'" class="normal  btn btn-bordered info">View Details &nbsp;&nbsp;+</a>
                                </div>
						  </div>';
						}
						}
				
				if($value['category_slug'] == 'historical'){
							 foreach ($product_data_historical as $temp) 
					  {	
							$pos=strpos($temp['product_description'], ' ', 50);
							$des =  substr($temp['product_description'],0,$pos );
							echo '
					<div  class="view view-first  mix  '.$value['category_slug'].''.$n.'  mix_all" style="  ">
					<img width="331" height="216" src="uploads/products/covers/'.$temp['producr_cover_image'].'" class="attachment-home-services size-home-services wp-post-image" alt="">
							<div class="mask">
                                    <h2>'.$temp['product_name'].'</h2>
                                    <p>'.$des.'</p>
                                    <a rel="colorbox" href=" '.base_url().'portfolio-detail/'.$temp['product_unique_slug'].'" class="normal  btn btn-bordered info">View Details &nbsp;&nbsp;+</a>
                                </div>
						  </div>';
						}
						}
				
				if($value['category_slug'] == 'industrial-laboratories'){
							 foreach ($product_data_industrial as $temp) 
					  {	
							$pos=strpos($temp['product_description'], ' ', 50);
							$des =  substr($temp['product_description'],0,$pos );
							echo '
					<div  class="view view-first  mix  '.$value['category_slug'].''.$n.'  mix_all" style="  ">
					<img width="331" height="216" src="uploads/products/covers/'.$temp['producr_cover_image'].'" class="attachment-home-services size-home-services wp-post-image" alt="">
							<div class="mask">
                                    <h2>'.$temp['product_name'].'</h2>
                                    <p>'.$des.'</p>
                                   <a rel="colorbox" href=" '.base_url().'portfolio-detail/'.$temp['product_unique_slug'].'" class="normal  btn btn-bordered info">View Details &nbsp;&nbsp;+</a>
                                </div>
						  </div>';
						}
						}
				
				if($value['category_slug'] == 'parks-libraries'){
							 foreach ($product_data_parks as $temp) 
					  {	
							$pos=strpos($temp['product_description'], ' ', 50);
							$des =  substr($temp['product_description'],0,$pos );
							echo '
					<div  class="view view-first  mix  '.$value['category_slug'].''.$n.'  mix_all" style="  ">
					<img width="331" height="216" src="uploads/products/covers/'.$temp['producr_cover_image'].'" class="attachment-home-services size-home-services wp-post-image" alt="">
							<div class="mask">
                                    <h2>'.$temp['product_name'].'</h2>
                                    <p>'.$des.'</p>
                                    <a rel="colorbox" href=" '.base_url().'portfolio-detail/'.$temp['product_unique_slug'].'" class="normal  btn btn-bordered info">View Details &nbsp;&nbsp;+</a>
                                </div>
						  </div>';
						}
						}
				
				if($value['category_slug'] == 'public-works'){
							 foreach ($product_data_public as $temp) 
					  {	
							$pos=strpos($temp['product_description'], ' ', 50);
							$des =  substr($temp['product_description'],0,$pos );
							echo '
					<div  class="view view-first  mix  '.$value['category_slug'].''.$n.'  mix_all" style="  ">
					<img width="331" height="216" src="uploads/products/covers/'.$temp['producr_cover_image'].'" class="attachment-home-services size-home-services wp-post-image" alt="">
							<div class="mask">
                                    <h2>'.$temp['product_name'].'</h2>
                                     <p>'.$des.'</p>
                                   <a rel="colorbox" href=" '.base_url().'portfolio-detail/'.$temp['product_unique_slug'].'" class="normal  btn btn-bordered info">View Details &nbsp;&nbsp;+</a>
                                </div>
						  </div>';
						}
						}
						if($value['category_slug'] == 'residential'){
							 foreach ($product_data_residential as $temp) 
					  {	
							$pos=strpos($temp['product_description'], ' ', 50);
							$des =  substr($temp['product_description'],0,$pos );
							echo '
					<div  class="view view-first  mix  '.$value['category_slug'].''.$n.'  mix_all" style="  ">
					<img width="331" height="216" src="uploads/products/covers/'.$temp['producr_cover_image'].'" class="attachment-home-services size-home-services wp-post-image" alt="">
							<div class="mask">
                                    <h2>'.$temp['product_name'].'</h2>
                                     <p>'.$des.'</p>
                                   <a rel="colorbox" href=" '.base_url().'portfolio-detail/'.$temp['product_unique_slug'].'" class="normal  btn btn-bordered info">View Details &nbsp;&nbsp;+</a>
                                </div>
						  </div>';
						}
						}
				
						   $n++;
					  }
				  }
				  
				  ?>
			

                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--================End Portfolio Details Area =================-->

    <!--================Clients Logo Area =================-->
    <section class="clients_logo_area p_120">
        	<div class="container">
        		<div class="clients_slider owl-carousel">
				<?php
            if (count($clients_data) > 0) {
                foreach ($clients_data as $value) {
                    ?>
        			<div class="item">
        				<img src="uploads/clients/<?php echo $value['name']?>" alt="">
        			</div>
			<?php }}?>
        			
        		</div>
        	</div>
        </section>
    <!--================End Clients Logo Area =================-->



    