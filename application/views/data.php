<?php

defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if(count($product_data) > 0) {

        foreach($product_data as $value) { ?>

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

    }?>

    <script type="text/javascript">
        $(document).ready(function(){ 
        var totalpro='<?php echo $total_products; ?>';
        var pagepro=totalpro-12;
        var final='<?php echo count($product_data); ?>';
        if(pagepro==final){
            $('#no_val').show();
            $('#show_val').css('display','none');
        }
    });
    </script>