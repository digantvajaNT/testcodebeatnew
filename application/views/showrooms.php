
        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Product Display Center</h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li>Product Display Center</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->


        <!-- start sop-details-main-content -->
        <section class="shop-details-main-content showroompage section-padding">
            <article class="lifeatbenchmark-main sticker">
            <div class="row">  
                <div class="container">
                    <div id="portfolio" class="gg-box col-sm-12 col-xs-12">
					
					 <?php
            if (count($page_data) > 0) {
                foreach ($page_data as $value) {
                    ?>
                        <div class="tile scale-anm csr all col-sm-3 gg-element">
                            <img src="<?php echo base_url();?>uploads/banner/<?php echo $value['banner_image'];?>" alt="" />
                            <i class="fa fa-eye"></i>
                        </div>
			<?php }}?>
                    </div>
                </div>

                <div style="clear:both;"></div>

            </div>
        </article>
        <div id="gg-screen"></div>
        </section>
        <!-- end of sop-details-main-content -->    

 



        <script type="text/javascript"> 
            // portfolio Block Design
            $(function() {
                var selectedClass = "";
                $(".fil-cat").click(function() {
                    selectedClass = $(this).attr("data-rel");
                    $("#portfolio").fadeTo(100, 0.1);
                    $("#portfolio div").not("." + selectedClass).fadeOut().removeClass('scale-anm');
                    setTimeout(function() {
                        $("." + selectedClass).fadeIn().addClass('scale-anm');
                        $("#portfolio").fadeTo(300, 1);
                    }, 300);
                });
            });
            
            $(document).ready(function() {
            $(".fil-cat").click(function () {
                $(".fil-cat").removeClass("active");
                // $(".tab").addClass("active"); // instead of this do the below 
                $(this).addClass("active");   
            });
            });
        </script>
