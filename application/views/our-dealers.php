<?php include("includes/header.php"); ?>
        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Store Locator</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li>Store Locator</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->
    <section class="maplocations testimonials">
        <div class="container-fluid">
            <label>Select store locator</label>  
            <div class="drop-down mobdropdown">   
              <div class="selected">
                <a href="javascript:;"><span>Please select <i class="fa fa-angle-down"></i></span></a>
              </div>
              <div class="options">
                <ul>
                  <li><a href="#">kheda <i class="fa fa-angle-down"></i><span class="value">1</span></a></li>
                  <li><a href="#">Baroda <i class="fa fa-angle-down"></i><span class="value">2</span></a></li>
                  <li><a href="#">North Gujarat <i class="fa fa-angle-down"></i><span class="value">3</span></a></li>
                  <li><a href="#">Saurastra <i class="fa fa-angle-down"></i><span class="value">3</span></a></li>
                  <li><a href="#">Surat <i class="fa fa-angle-down"></i><span class="value">3</span></a></li>
                  <li><a href="#">South Guj <i class="fa fa-angle-down"></i><span class="value">3</span></a></li>
                  <li><a href="#">Ahmedabad <i class="fa fa-angle-down"></i><span class="value">3</span></a></li>
                </ul>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="productslider dealerlocationsslider slider-arrow-s1">
                <div class="inner">
                    <div class="col col-xs-12"> 
                        <ul class="tablinks">
                           <!-- <li class="active">
                                <a href="#tab-1" data-toggle="tab"><span>kheda</span></a>
                            </li>
                            <li>
                                <a href="#tab-2" data-toggle="tab"><span>Baroda</span></a>
                            </li>
                            <li>
                                <a href="#tab-3" data-toggle="tab"><span>North Gujarat</span></a>
                            </li>
                            <li>
                                <a href="#tab-4" data-toggle="tab"><span>Saurastra</span></a>
                            </li>
                            <li>
                                <a href="#tab-5" data-toggle="tab"><span>Surat</span></a>
                            </li>
                            <li>
                                <a href="#tab-6" data-toggle="tab"><span>South Guj</span></a>
                            </li>
                            <li>
                                <a href="#tab-7" data-toggle="tab"><span>Ahmedabad</span></a>
                            </li>-->
                            <?php if (count($area_data) > 0) {
                            foreach ($area_data as $areaRow) {
                                
                                ?>
                            <li <?php if($store_data1 == $areaRow['tb_area_id']){ echo"class='active text-hover'";}?>>
                                <a href="javascript: window.location.href = '<?php echo base_url() . 'Dealers/index/' . $areaRow['tb_area_id']; ?>';" ><span><?php echo $areaRow["tb_name"];?></span></a>
                            </li>
                           
                            <?php
                            }
                     }
?>
                        </ul>  
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- start faq-section -->
        <section class="dealer-pg-section section-padding">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-md-8 col-sm-6 col-xs-12 pull-right">
                        <h3>Map Location</h3>
                        <div class="channelPartnerMap"> 
                           <div class="mapboxtoolbar">  
                              <div id="mapdiv" style="height: 700px; border: 1px solid #AAA;"></div> 
                           </div> 
                        </div> 
                    </div> -->
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h3>Our Dealers</h3>    
                        <!-- Tab panes -->
                        <div class="tab-content">
    
                            <div class="tab-pane in active" > 
                                <div class="details">  
                                    <div class="addresscardmain">
                                    <?php if (count($store_data) > 0) {
                                        $a=1;
                                        //print_r($store_data);exit();
                            foreach ($store_data as $key =>$storeRow) {
                                
                                ?>
                                
                                        <div class="addresscard">
                                            <div class="row">
                                                <div class="col-md-12" onclick="infoOpen('<?= $key ?>');">
                                                    <h5><strong><?php echo $a;?></strong><span><?php echo $storeRow["locator_name"];?></span></h5>
                                                    <p><?php echo $storeRow["lovator_add"];?></p>
                                                    <div class="mobilenum">
                                                        <strong>M : </strong>
                                                        <div class="mobnumbers">
                                                            <a href="tel:<?php echo $storeRow["locator_mno1"];?>"><?php echo $storeRow["locator_mno1"];?></a> 
                                                            <?php if(!empty($storeRow["locator_mno2"])){ ?>
                                                            / <a href="tel:<?php echo $storeRow["locator_mno2"];?>"><?php echo $storeRow["locator_mno2"];?></a>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
<!--
                                                <div class="col-md-3">
                                                    <div class="text-right">
                                                        <strong><span>1.6 km</span> <i class="fa fa-exchange"></i></strong>
                                                    </div>
                                                </div>
-->
                                            </div> 
                                        </div>
                                        <?php $a++;
                            }
                     }else{   foreach ($store_data as $storeRow) {?>
                                     <div class="addresscard">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5><strong><?php echo $a;?></strong><span><?php echo $storeRow["locator_name"];?></span></h5>
                                                    <p><?php echo $storeRow["lovator_add"];?></p>
                                                    <div class="mobilenum">
                                                        <strong>M : </strong>
                                                        <div class="mobnumbers">
                                                            <a href="tel:<?php echo $storeRow["locator_mno1"];?>"><?php echo $storeRow["locator_mno1"];?></a> / <a href="tel:<?php echo $storeRow["locator_mno2"];?>"><?php echo $storeRow["locator_mno2"];?></a>
                                                        </div>
                                                    </div>
                                                </div>
<!--
                                                <div class="col-md-3">
                                                    <div class="text-right">
                                                        <strong><span>1.6 km</span> <i class="fa fa-exchange"></i></strong>
                                                    </div>
                                                </div>
-->
                                            </div> 
                                        </div>
                     <?php   } }
?>
                                       
                                    </div> 
                                </div>
                                </div>
                           
                         </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end faq-section -->

<?php include("includes/footer.php"); ?>  

<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<script>
            function infoOpen(i)
            {

                google.maps.event.trigger(gmarkers[i], 'click');
            }
            var gmarkers = [];
            var markers = [];
            var markers =[ <?php if (count($store_data) > 0) {
             foreach ($store_data as $key =>$storeRow) {
            ?> [
                '<?php echo $key ?>',
                "<?php echo $storeRow["locator_name"] ?>",
                <?php echo $storeRow["lat"] ?>,
                <?php echo $storeRow["long"] ?>,
            ],<?php
             }
             }
            ?>];
                console.log(markers);
            $(document).ready(function () {
    
                var map = new google.maps.Map(document.getElementById("mapdiv"));
                var image = new google.maps.MarkerImage('img/marker.png',
                new google.maps.Size(10, 32),
                new google.maps.Point(0, 0),
                new google.maps.Point(18, 42));
                var infowindow = new google.maps.InfoWindow();
                var marker, i;
                var bounds = new google.maps.LatLngBounds();

                for (i = 0; i < markers.length; i++) {
                    var pos = new google.maps.LatLng(markers[i][2], markers[i][3]);
                    var content = markers[i][1];
                    bounds.extend(pos);
                    marker = new google.maps.Marker({
                        position: pos,
                        map: map
                    });
                    gmarkers.push(marker);
                    google.maps.event.addListener(marker, 'click', (function(marker, content) {
                        return function() {
                            infowindow.setContent(content);
                            map.setZoom(15);
                            map.setCenter(marker.getPosition());
                            infowindow.open(map, marker);
                        }
                    })(marker, content));
                }


                map.fitBounds(bounds);
            });
        </script>

<style type="text/css">
    #map {
                width:640px;
                height: 480px;
                border:6px solid #6f5f5e;
                margin:20px auto 30px auto;
            }
</style>

 