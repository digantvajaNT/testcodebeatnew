<section class="section lb p120 commiteebanner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>Committee Members</h3>
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
        <!--<div class="row">                        
           <div class="col-md-12">
               <div class="shop-desc">
                   <h3>Committees</h3>                                
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis consequat condimentum. In a tincidunt purus. Curabitur facilisis luctus aliquet. Aenean a cursus erat, sit amet interdum arcu. Mauris aliquam magna turpis, lobortis pellentesque velit elementum et. Nulla scelerisque a lorem nec posuere. Nunc convallis posuere tincidunt. Pellentesque a aliquet odio. Integer euismod, enim id lacinia auctor, tortor turpis malesuada enim, in semper turpis magna quis enim.</p>                                
               </div>
           </div>
       </div> -->

        <div class="row">
            <div class="col-sm-12">
                <div class="section-title text-center">
                    <h3>Audit Committee</h3>
                    <!--<p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>-->
                </div>
            </div>
            <?php
            if (count($stakeholder) > 0) {
                foreach ($stakeholder as $value) {
                    ?>
                    <div class="col-md-4">
                        <div class="box">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <h4><?php echo $value['committee_name']; ?></h4>
                            <small><?php echo $value['desgination']; ?></small>
                            <p><?php echo $value['description']; ?></p>                             
                        </div>
                    </div><!-- end col -->
                <?php }
            }
            ?>


            <hr class="invis">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title text-center">
                        <h3>Stakeholder’s Relationship Committee</h3>
                        <!--<p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>-->
                    </div>
                </div>
                <?php
                if (count($stakeholder) > 0) {
                    foreach ($stakeholder as $value) {
                        ?>
                        <div class="col-md-4">
                            <div class="box">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <h4><?php echo $value['committee_name']; ?></h4>
                                <small><?php echo $value['desgination']; ?></small>
                                <p><?php echo $value['description']; ?></p>                            
                            </div>
                        </div><!-- end col -->
                    <?php }
                }
                ?>

            </div><!-- end row -->

            <hr class="invis">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title text-center">
                        <h3>Nomination and Remuneration Committee</h3>
                        <!--<p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>-->
                    </div>
                </div>
                <?php
                if (count($stakeholder) > 0) {
                    foreach ($stakeholder as $value) {
                        ?>
                        <div class="col-md-4">
                            <div class="box">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <h4><?php echo $value['committee_name']; ?></h4>
                                <small><?php echo $value['desgination']; ?></small>
                                <p><?php echo $value['description']; ?></p>                                     
                            </div>
                        </div><!-- end col -->
    <?php }
}
?>
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