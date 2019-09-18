
    <section class="section lb p120 bodbanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>Board Members</h3>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end section -->

    <section class="section gb bod">
            <div class="container">
                <!-- <div class="row">                        
                    <div class="col-md-12">
                        <div class="shop-desc">
                            <h3>Board Of Directors</h3>                                
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis consequat condimentum. In a tincidunt purus. Curabitur facilisis luctus aliquet. Aenean a cursus erat, sit amet interdum arcu. Mauris aliquam magna turpis, lobortis pellentesque velit elementum et. Nulla scelerisque a lorem nec posuere. Nunc convallis posuere tincidunt. Pellentesque a aliquet odio. Integer euismod, enim id lacinia auctor, tortor turpis malesuada enim, in semper turpis magna quis enim.</p>                        
                        </div>
                    </div>
                </div> 
				<div class="clearfix"></div>
                <hr class="invis">
                <hr class="invis">-->
                <div class="row">
				<?php if(count($bod) > 0) {
							 foreach($bod as $value){?>
                    <div class="col-md-6 productdetailcontent">
                        <div class="box">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <h4><?php echo $value['name']; ?></h4>
                            <small> <?php echo $value['desgination']; ?></small>
                            <p><?php echo $value['description']; ?></p>                            
                        </div>
                    </div><!-- end col -->
					<?php }}?>
					
					
                   

                   <!-- <div class="col-md-6 productdetailcontent">
                        <div class="box">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <h4>Mrs. Taruna P Patel</h4>
                            <small>Non-Executive Non Independent Director</small>
                            <p>Mrs. Taruna P Patel, aged 55 years, is the Non-Executive Non Independent Director of our Company. She holds Bachelor’s degree in Commerce from Madhya Pradesh University. She has around 12 years of rich and vast experience in the field of human resource.</p>                            
                        </div>
                    </div>
                    <div class="col-md-6 productdetailcontent">
                        <div class="box">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <h4>Mr. Jasbir A Singh</h4>
                            <small>Independent Director</small>
                            <p>Mr. Jasbir A Singh, aged 68 years, is an Additional Non-Executive Independent Director of our Company. He holds Bachelor’s degree in Science from University of Bombay and has completed Second LLB (General). He is also an associate member of The Indian Institute of Bankers. He has over 36 years of experience of which around 34 years experience is from banking sector. He retired as Bank Manager of Punjab & Sind Bank in November 2009.</p>                            
                        </div>
                    </div>

                    <div class="col-md-6 productdetailcontent">
                        <div class="box">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <h4>Mr. Jehan D Variava</h4>
                            <small>Independent Director</small>
                            <p>Mr. Jehan D Variava, aged 33 years, is an Additional Non-Executive Independent Director of our Company. He holds Bachelor’s degree in Business Administration from Manipal University. He has also completed Advance Diploma in Business Administration from London Business Academy and Master’s in International Business from University of Hertfordshire, UK. He has over 10 years of experience in Rubber Industry. Recently he has started his own venture as Kianaa Fashion LLP which is engaged in the business of manufacturing and trading of traditional women wear.</p>                            
                        </div>
                    </div><!-- end col --> 
            </div><!-- end container -->
        </section>   

        <section class="section bgcolor1">
            <div class="container">
                <a href="#">
                <div class="row callout">
                    <div class="col-md-4 text-center">
                        <h3>                            
                            Floor Drains
                        </h3>
                        <h4>New Products Arrival!</h4>
                    </div><!-- end col -->

                    <div class="col-md-8">
                        <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has be.</p>
                    </div>
                </div><!-- end row -->
                </a>
            </div><!-- end container -->  
        </section> 

        <!--<script src="js/isotope.pkgd.js"></script>-->