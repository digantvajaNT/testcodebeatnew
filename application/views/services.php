
        
        <!--================Home Banner Area =================-->
<section class="banner_area_demo" style="background:linear-gradient(45deg, rgba(0, 0, 0, 0.75), rgba(150, 150, 150, 0.5)), url(<?php echo base_url();?>/uploads/banner/<?php if (isset($page_banner[0]['banner_image'])&&!empty($page_banner[0]['banner_image'])){echo $page_banner[0]['banner_image'];}?>);background-repeat: no-repeat;background-size:cover;background-position: center;"></section>        <div class="header-gradient-after-demo sub_page"></div>
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
        
        <!--================Portfolio Details Area =================-->
        <section class="portfolio_details_area mb-5 pt-5 overwrite_content">
        	<div class="container">
			
                <ul class="nav nav-pills mb-5 mt-5" id="pills-tab" role="tablist">
				   <?php if(count($services_data) > 0){
                    $n = 1;
                    for($i=0;$i<count($services_data);$i++)
                    { if($i==0){
                        echo '<li class="nav-item" id="c'.$n.'">
                      <a data-toggle="tab" class="nav-link product-name active show" href="#pro-'.$i.'">'.$services_data[$i]['name'].'</a>
                      </li>';                        
                    }else{
                      echo '<li class="nav-item" id="c'.$n.'">
                      <a data-toggle="tab" class="nav-link product-name" href="#pro-'.$i.'">'.$services_data[$i]['name'].'</a>
                      </li>';
                    }
                    $n++;                                          
                    }
                    
                  }?>				
                </ul>
				 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="tab-content">
                  
                  <?php if(count($services_data) > 0){
					  
					  for($i=0;$i<count($services_data);$i++)
					  {	
						$class= '';
						if($i == 0){
							$class= 'active';	
						}
						
					echo '<div id="pro-'.$i.'" class="tab-pane fade in '.$class.' show">
                            <div class="portfolio_details_inner">
    							<div class="row">
                                    <div class="col-md-12">
                                        <div class="left_img">
                                            <img class="img-fluid" src="'.site_url("uploads/home/").$services_data[$i]['image_service_url'].'" alt="Category Image" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
            							<div class="portfolio_right_text unordered-list">            								
        									<h4>'.$services_data[$i]['name'].'</h4>
                                            <p>
        									'.$services_data[$i]['description'].'
                                            </p>                                                                               
            							</div>
                                    </div>
                                </div>
                            </div>
						</div>';                        
					  }
				  }
				  
				  ?>
                                  
                </div>
                <a href="<?php echo base_url();?>portfolio" class="genric-btn primary-border">View Portfolio</a>
              </div>
               <!-- <div class="tab-content" id="pills-tabContent">
                  
                  <div class="tab-pane fade show active" id="Mechanical" role="tabpanel" aria-labelledby="pills-home-tab">
				  
				 
                      <div class="portfolio_details_inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left_img">
                                    <img class="img-fluid" src="https://www.budlong.com/wp-content/uploads/2017/06/Mechanical-Newcomb-Ductwork-02-370x216.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio_right_text">
                                    <h4>Mechanical</h4>
                                    <p>
                                        The B&A mechanical department focuses on creating comfortable and healthy environments for facility occupants. Engineers and designers consider the efficient use and distribution of energy while continually providing the highest level of expertise within the mechanical discipline.<br/><br/>
                                        B&A gathers information and reviews the site for location and orientation of the new or existing building, and to verify existing conditions for renovation or upgrade projects. The designers calculate heating and cooling loads to determine sizing requirements for HVAC equipment.
                                    </p>                                   
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-20 title_color">We offer a variety of engineering services in mechanical systems as listed:</h3>
                        <div class="">
                            <ul class="unordered-list">
                                <li>Heating, Ventilation and Air Conditioning (HVAC)</li>
                                <li>Central Plants</li>
                                <li>Chillers</li>
                                <li>Boilers</li>
                                <li>Heat Exchanges</li>
                                <li>Refrigeration</li>
                            </ul>
                        </div>
                        <a href="portfolio.html" class="genric-btn primary-border">View Portfolio</a>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="Electrical" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="portfolio_details_inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left_img">
                                    <img class="img-fluid" src="https://www.budlong.com/wp-content/uploads/2017/06/Mechanical-Newcomb-Ductwork-02-370x216.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio_right_text">
                                    <h4>Electrical</h4>
                                    <p>
                                        The B&A mechanical department focuses on creating comfortable and healthy environments for facility occupants. Engineers and designers consider the efficient use and distribution of energy while continually providing the highest level of expertise within the mechanical discipline.<br/><br/>
                                        B&A gathers information and reviews the site for location and orientation of the new or existing building, and to verify existing conditions for renovation or upgrade projects. The designers calculate heating and cooling loads to determine sizing requirements for HVAC equipment.
                                    </p>                                   
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-20 title_color">We offer a variety of engineering services in mechanical systems as listed:</h3>
                        <div class="">
                            <ul class="unordered-list">
                                <li>Heating, Ventilation and Air Conditioning (HVAC)</li>
                                <li>Central Plants</li>
                                <li>Chillers</li>
                                <li>Boilers</li>
                                <li>Heat Exchanges</li>
                                <li>Refrigeration</li>
                            </ul>
                        </div>
                        <a href="portfolio.html" class="genric-btn primary-border">View Portfolio</a>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="Plumbing" role="tabpanel" aria-labelledby="pills-contact-tab">
                      <div class="portfolio_details_inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left_img">
                                    <img class="img-fluid" src="https://www.budlong.com/wp-content/uploads/2017/06/Mechanical-Newcomb-Ductwork-02-370x216.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio_right_text">
                                    <h4>Plumbing</h4>
                                    <p>
                                        The B&A mechanical department focuses on creating comfortable and healthy environments for facility occupants. Engineers and designers consider the efficient use and distribution of energy while continually providing the highest level of expertise within the mechanical discipline.<br/><br/>
                                        B&A gathers information and reviews the site for location and orientation of the new or existing building, and to verify existing conditions for renovation or upgrade projects. The designers calculate heating and cooling loads to determine sizing requirements for HVAC equipment.
                                    </p>                                   
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-20 title_color">We offer a variety of engineering services in mechanical systems as listed:</h3>
                        <div class="">
                            <ul class="unordered-list">
                                <li>Heating, Ventilation and Air Conditioning (HVAC)</li>
                                <li>Central Plants</li>
                                <li>Chillers</li>
                                <li>Boilers</li>
                                <li>Heat Exchanges</li>
                                <li>Refrigeration</li>
                            </ul>
                        </div>
                        <a href="portfolio.html" class="genric-btn primary-border">View Portfolio</a>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="Sustainability" role="tabpanel" aria-labelledby="pills-contact-tab">
                     <div class="portfolio_details_inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left_img">
                                    <img class="img-fluid" src="file:///F:/Parth/Projects/budlong/img/post-slider/Entrance-Display-Board-LEED-Logo-370x216.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio_right_text">
                                    <h4>LEED Projects</h4>
                                    <p>
                                        Budlong & Associates is strongly committed to sustainable development.  Our designers have been applying California Title 24 energy code and California Energy Commission requirements since the beginning of those requirements in the 1970s.<br/><br/>

                                        B&A has LEED APs on staff, and we have provided professional services on LEED projects.  Our staff receives ongoing training in implementing energy codes and we provide strong encouragement for additional designers to become LEED APs.
                                    </p>                                   
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-20">Quemetco – 12,000 SF two-story New Maintenance Office Building</h3>
                        <div class="">
                            <ul class="unordered-list">
                                <li>City of Industry, California</li>
                                <li>In Design for LEED Certification</li>                                   
                            </ul>
                        </div>
                        <h4 class="mb-20">Quemetco – 12,000 SF two-story New Maintenance Office Building</h3>
                        <div class="">
                            <ul class="unordered-list">
                                <li>City of Industry, California</li>
                                <li>In Design for LEED Certification</li>                                   
                            </ul>
                        </div>
                        <h4 class="mb-20">Quemetco – 12,000 SF two-story New Maintenance Office Building</h3>
                        <div class="">
                            <ul class="unordered-list">
                                <li>City of Industry, California</li>
                                <li>In Design for LEED Certification</li>                                   
                            </ul>
                        </div>
                        <h4 class="title_color">CHPS Schools</h4>
                        <p>We have participated in seminars leading up to CHPS (Collaborative for High Performance Schools) criteria, and then have designed schools based on CHPS criteria.  As a part of reaching CHPS qualification, we have provided designs exceeding Title 24 energy requirements by 15%.</p>
                        <div class="">
                            <ul class="unordered-list">
                                <li>LAUSD – Gratts Primary Care Center and Early Education</li>                                
                            </ul>
                        </div>
                        <h4 class="mb-20">$31.9 Million new school in downtown Los Angeles –opened 2010</h3>
                        <div class="">
                            <ul class="unordered-list">
                                <li>LAUSD – Central Region Elementary School No. 14<br/>$52 Million new school in Los Angeles – planned opening 2011</li>                                
                                <li>LAUSD – Central Region Elementary School No. 14<br/>$52 Million new school in Los Angeles – planned opening 2011</li>                                
                                <li>LAUSD – Central Region Elementary School No. 14<br/>$52 Million new school in Los Angeles – planned opening 2011</li>                                
                            </ul>
                        </div>
                        <h4 class="mb-20">Please visit our Portfolio to view more of our LEED and CHPS Projects.</h3>
                        <a href="portfolio.html" class="genric-btn primary-border">View Portfolio</a>
                    </div>
                  </div>

                </div>    -->    		
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
        				<img src="<?php echo base_url();?>uploads/clients/<?php echo $value['name']?>" alt="">
        			</div>
			<?php }}?>
        			
        		</div>
        	</div>
        </section>
        <!--================End Clients Logo Area =================-->
     
	 <script>
	   $(document).ready(() => {
          let url = location.href.replace(/\/$/, "");

          if (location.hash) {
            const hash = url.split("#");
            $('#pills-tab a[href="#'+hash[1]+'"]').tab("show");
            url = location.href.replace(/\/#/, "#");
            history.replaceState(null, null, url);
            setTimeout(() => {
              $(window).scrollTop(0);
            }, 400);
          } 

          $('a[data-toggle="tab"]').on("click", function() {
            let newUrl;
            const hash = $(this).attr("href");
            if(hash == "#services") {
              newUrl = url.split("#")[0];
            } else {
              newUrl = url.split("#")[0] + hash;
            }
            newUrl += "/";
            history.replaceState(null, null, newUrl);
          });
          $(document).ready(function () {
              
            // Handler for .ready() called.
            $('html, body').animate({
                scrollTop: $('.portfolio_details_area').offset().top
            }, 'slow');
        });
        });
	 </script>