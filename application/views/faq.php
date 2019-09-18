 <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>FAQ</h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li>FAQ</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->

        
        <!-- start faq-section -->
        <section class="faq-pg-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-8">
                        <div class="section-title-s4">
                            <h2>Find informative answers to all your questions about our products below.</h2>
<!--                            <p>Do you have an inquiry that's not addressed here? Please contact us via email or <span>phone at (123)456-7890.</span></p>-->
                        </div>
                    </div>
                </div>

                <div class="faq-section">
                    <div class="panel-group faq-accordion theme-accordion-s1" id="accordion">
						<?php
                             if(count($faq_data) > 0) {
                            foreach($faq_data as $value){    ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $value['id'];?>" aria-expanded="true"><?php echo $value['faq_question'] ?></a>
                            </div>
                            <div id="collapse<?php echo $value['id'];?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p><?php echo $value['faq_answer'] ?></p>
                                </div>
                            </div>
                        </div>
							 <?php }}?>
                        
                    </div>
                </div> <!-- end faq-section -->
            </div> <!-- end container -->
        </section>
        <!-- end faq-section -->
