<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?php echo base_url();?>assets/admin/js/blog.js"></script>

<div class="loading" style="display: none;" id="loader">Loading&#8230;</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Blog
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Blog</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            $attributes = array('role' => 'form', 'id' => 'frmNewProduct', 'name' => 'frmNewProduct', 'class' => '');
            echo form_open_multipart('admin/blog/edit/'.$iListId,$attributes);
            ?>
            <input type="hidden" name="hdn_product_id" id="hdn_product_id" value="<?php echo $iListId;?>"/>
            <input type="hidden" name="hdn_p_status" id="hdn_p_status"/>
            <input type="hidden" name="hdn_cover" id="hdn_cover" value="<?php echo $product_data["producr_cover_image"];?>"/>
            <input type="hidden" name="hdn_product_id" id="hdn_product_id" value="<?php echo $iListId;?>"/>
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $product_data["product_name"];?>" name="tb_productname" style="width: 100%;" id="tb_productname"  class="form-control"/>
                                </div>
                              
                                <div class="form-group">
                                    <label>Category<span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="dd_category[]" id="dd_category" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;">
                                        <?php foreach($category_data as $iRow) {
                                            $sSeltected = '';
                                            foreach ($product_cat_data as  $iTemp) {
                                                if($iTemp['category_id'] == $iRow['category_id']) {
                                                    $sSeltected = 'selected = "selected"';
                                                }
                                            }
                                            echo '<option '.$sSeltected.' value="'.$iRow['category_id'].'">'.$iRow['category_name'].'</option>';
                                        } ?>
                                    </select>
                                </div>
								 <div class="form-group">
                                    <label>Blog Less Details<span class="text-danger">*</span></label>
									 <textarea name="product_details" id="product_details" class="form-control editor"><?php echo $product_data["product_details"];?></textarea>
                                </div>
								
								 <div class="form-group">
                                    <label>Blog Description<span class="text-danger">*</span></label>
									 <textarea name="tb_description" id="tb_description" class="form-control editor"><?php echo $product_data["product_description"];?></textarea>
                                </div>
								
                                <div class="form-group">
                                    <label>Product Cover Image<span class="text-danger">*</span></label>
                                    <br/>
                                    <small class="text-warning">For better product presentation on website, we insist to upload images larger than 800X600 (Width X height)</small>
                                    <input type="file" name="file_coverimage" id="file_coverimage"/>
                                    <br/>
                                    <?php if($product_data["producr_cover_image"] != '') { ?>
                                        <a class="btm btn-xs btn-default" target="_blank" href="<?php echo base_url().'uploads/blog/'.$product_data["producr_cover_image"];?>">View image</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.col -->
                            
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                </div>
<!--                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Photos</h3>
                        <small class="text-warning" style="margin-left: 20px;">For better product presentation on website, we insist to upload images larger than 800X600 (Width X height)</small>
                        <input type="hidden" name="photo_json" id="photo_json"/>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                        </div>
                    </div>
                     /.box-header 
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="editPrdimageUploader">Upload</div>
                            </div>
                            <div class="col-md-6">
                                <?php if(count($product_photos) > 0) {
                                    echo '<ul class="products-list product-list-in-box imagelist lg-imagelist">';
                                    $sPath = base_url().'uploads/products/photos/';
                                    foreach($product_photos as $phRow) {
                                        echo '<li class="item">
                                                        <div class="product-img">
                                                            <img src="'.$sPath.$phRow["photo_name"].'" />
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="" class="product-title">
                                                            <a class="btn btn-xs btn-danger pull-right" onclick="deleteProductPhoto('.$phRow["product_photo_id"].');">Delete</a></a>
                                                        </div>
                                                        </li> ';
                                    }
                                    echo '</ul>';
                                }?>

                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>-->
                
               
                <div class="box box-success">
                    <div class="box-footer">
                        <div class="col-md-12 text-right">
                            <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/products'; ?>';" class="btn btn-default">Cancel</button>
                            <button type="button" id="btn_publish" name="btn_publish" class="btn btn-success" onclick="publishProduct();">Update</button>

                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </section>
</div>