   <!-- start site-footer -->
        <footer class="site-footer">
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-4 col-sm-6">
                            <div class="widget about-widget">
                                <div class="footer-logo"><img src="<?php echo base_url(); ?>assets/images/benchmark-logo-registered-footer.png" alt=""></div>
                                <ul class="contact-info">
                                    <p>Benchmark has emerged as Innovator and System Integrator for large residential, commercial and Industrial Hot Water Solutions. Benchmark has expanded its horizons in the field of treatment of drinking water. Benchmark now introduces the revolutionary concept of Alkaline Ionized and hydrogenated micro-clustered water.</p>
                                </ul>
                                <div class="social">
                                    <span>Follow Us </span>
                                    <ul class="social-links">
<!--
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
-->
                                        <li><a href="https://www.linkedin.com/company/benchmark-agencies/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://www.youtube.com/channel/UC7RBkM32ncqbSfinkxmN4oQ" target="_blank"><i class="fa fa-youtube"></i></a></li>
<!--
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
-->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col col-md-4 col-sm-6">
                            <div class="contact-section-contact-box">
                            <div class="section-title-white">
                                <h2>Contact</h2>
                            </div>
                            <div class="details">
                                <p>For any kind of query, contact us with the details below.</p>
                                <ul>
                                    <li><a href="tel:<?php echo $contact_data['phone_one'];?>"><i class="fa fa-phone"></i><?php echo $contact_data['phone_one'];?></a></li>
                                    <li><a href="mailto:<?php echo $contact_data['email_one'];?>"><i class="fa fa-envelope"></i><?php echo $contact_data['email_one'];?></a></li>
                                    <li><i class="fa fa-home"></i><?php echo $contact_data['name_one'].$contact_data['address_one'];?></li>
                                </ul>
                            </div>
                        </div>
                        </div><div class="col col-md-4 col-sm-6">
                            <div class="widget service-links-widget">
                                <h3>Quick Links</h3>

                                <ul>
                                    <!-- <li><a href="<?php echo base_url();?>privacy-policy">Privacy Policy</a></li>
                                    <li><a href="<?php echo base_url();?>disclaimer">Disclaimer</a></li> -->
                                    <li><a href="<?php echo base_url();?>office">Office</a></li>
                                    <li><a href="<?php echo base_url();?>career">Career</a></li>
                                    <li><a href="<?php echo base_url();?>contact-us">Contact Us</a></li> 
<!--
                                    <li><a href="<?php //echo base_url();?>faq">FAQ</a></li>
                                    <li><a href="<?php //echo base_url();?>testimonial">Testimonials</a></li>
-->
                                </ul>

                            </div>
                        </div>

                        

                        
                    </div>
                </div>
            </div> <!-- end upper-footer -->
            <div class="copyright-info">
                <div class="container">
                    <div class="copy_right">
                        <p><?php echo date("Y");?> &copy; All Rights Reserved by <a href="<?php echo base_url();?>">Benchmark</a></p>
                        <p class="pr-30">Powered By : <a href="http://www.nichetechsolutions.com/" target="_blank">Nichetech</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end site-footer -->
    </div>
    <!-- end of page-wrapper -->



    <!-- All JavaScript files
    ================================================== -->
   
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/app.js"></script> -->
    <!-- Plugins for this template -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-plugin-collection.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/grid-gallery.min.js"></script>
    <!-- Custom script for this template -->
    <script src="<?php echo base_url(); ?>assets/js/script.js?<?php echo time(); ?>"></script>
  <script >
	//LAZY LOADING
function loadMoreData(){
	//alert($("#hdn_page").val());
	var page_val = parseInt($("#hdn_page").val());
	$("#hdn_page").val(page_val + 1);
	$.ajax({
	url: '<?php echo base_url() . "products/loadMore/?page="; ?>
	' + $("#hdn_page").val()+'&slug='+$("#cat_slug").val(),
		type: "get",
		beforeSend: function()
		{
		$('.ajax-load').show();
		}
		})
		.done(function(data)
		{
		if (!$.trim(data)){
            $('#no_val').css("display","inline-block");  
            $('#show_val').css("display","none");  
            $('.pro_load').css("display","none");  
			       $('#no_val').html("No more records found"); 
            return; 
		}
		$('.ajax-load').hide();
		$("#products_section").html(data);
		$(".post").hover(function () {
            $(this).find(".item").toggleClass("active");
            $(this).find(".img").toggleClass("active");
            $(this).find(".headline").toggleClass("active");
		});
       
        
		})
		.fail(function(jqXHR, ajaxOptions, thrownError)
		{
		alert('server not responding...');
		});
	}
</script>


<script>
 /* Equal height js */
    var maxHeight3 = 0;
	$(document).ready(function(){ 
        
        $(".testimoials-s2-grid").each(function(){
           if ($(this).height() > maxHeight3) { maxHeight3 = $(this).height(); }
        });

        $(".testimoials-s2-grid").height(maxHeight3); 
    }); 

    $(window).resize(function(){
        $(".testimoials-s2-grid").height(maxHeight3); 
    }); 
</script>

<script type="text/javascript">
    $(document).ready(function(){ 
         const page=window.location.href.split("<?php echo base_url(); ?>")[1]
         console.log(page);
         if(page){    
             if(page.indexOf('/')>-1){
                 if(page.split('/')[1].toLowerCase()==='search'){
                     $(".navigation-holder ul li.search_nav").addClass('active');
                 }else{
                     $(".navigation-holder ul li."+page.split('/')[0]).addClass('active');
                 }
             }else{
                 if(page.indexOf('#')>-1){
                 $(".navigation-holder ul li."+page.split("#")[0]).addClass('active');
                 }else{
                 $(".navigation-holder ul li."+page).addClass('active');
                 }
             }
         }else{
             $(".navigation-holder ul li.home").addClass('active');
         }  
    })
</script>

 <script>
 /* Equal height js */
	var maxHeight1 = 0;
  var maxHeight5 = 0;
  $(document).ready(function(){

        $(".wt-info").each(function(){
           if ($(this).height() > maxHeight1) { maxHeight1 = $(this).height(); }
        });

        $(".wt-info").height(maxHeight1); 
        
        
        
        $(".eqheight").each(function(){
           if ($(this).height() > maxHeight5) { maxHeight5 = $(this).height(); }
        });

        $(".eqheight").height(maxHeight5); 
    }); 

    $(window).resize(function(){
        $(".wt-info").height(maxHeight1); 
        $(".eqheight").height(maxHeight5); 
    }); 
</script>
 <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/contact.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADwVAs3Cw91cxbvW2cztgbhvDavFI3Pro&libraries=places"></script>
<script src="<?php echo base_url(); ?>assets/js/leaflet.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134643029-1"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-134643029-1');
</script>

<script>
//TOGGLING NESTED ul
$(".mobdropdown.drop-down .selected a").click(function() {
    $(".mobdropdown.drop-down .options ul").toggle();
});

//SELECT OPTIONS AND HIDE OPTION AFTER SELECTION
$(".mobdropdown.drop-down .options ul li a").click(function() {
    var text = $(this).html();
    $(".mobdropdown.drop-down .selected a span").html(text);
    $(".mobdropdown.drop-down .options ul").hide();
}); 


//HIDE OPTIONS IF CLICKED ANYWHERE ELSE ON PAGE
$(document).bind('click', function(e) {
    var $clicked = $(e.target);
    if (! $clicked.parents().hasClass("drop-down"))
        $(".mobdropdown.drop-down .options ul").hide();
        $(".mobdropdown .options ul").toggleClass("opened");
});

</script>

<script>
$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
</script>

<script>
 /* Equal height js */
	$(document).ready(function(){

        var maxHeight = 0;
        var maxHeights = 0; 
        $(".products-section.shop .products-grids .productname").each(function(){
           if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
        });

        $(".products-section.shop .products-grids .productname").height(maxHeight); 
        
        $(".addresscard").each(function(){
           if ($(this).height() > maxHeights) { maxHeights = $(this).height(); }
        });

        $(".addresscard").height(maxHeights); 
    }); 

    $(window).resize(function(){
        $(".products-section.shop .products-grids .productname").height(maxHeight); 
        $(".addresscard").height(maxHeights); 
    }); 
</script>

<script>
    $(".productslider .owl-item button").on('click', function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    })
</script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAe4CdiSJle-A3C7nZkekL6b71xz9eOX4A",
    authDomain: "benchmarkweb.firebaseapp.com",
    databaseURL: "https://benchmarkweb.firebaseio.com",
    projectId: "benchmarkweb",
    storageBucket: "benchmarkweb.appspot.com",
    messagingSenderId: "895965884612",
    appId: "1:895965884612:web:761d76378b49e09f"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>
</body>

</html>