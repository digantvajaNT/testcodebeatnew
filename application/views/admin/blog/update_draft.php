<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="loading" style="display: none;" id="loader">Loading&#8230;</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Draft
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        if($this->session->flashdata('product')){
            $message = $this->session->flashdata('product');
            ?>
            <div class=" <?php echo $message['class'];?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
            </div>
        <?php }	?>
        <div class="row">
            <?php
            $attributes = array('role' => 'form', 'id' => 'frmNewProduct', 'name' => 'frmNewProduct', 'class' => '');
            echo form_open_multipart('admin/products/update_draft/'.$iListId,$attributes);
            ?>
            <input type="hidden" name="hdn_product_id" id="hdn_product_id" value="<?php echo $iListId;?>"/>
            <input type="hidden" name="hdn_p_status" id="hdn_p_status"/>
            <input type="hidden" name="hdn_cover" id="hdn_cover" value="<?php echo $product_data["producr_cover_image"];?>"/>
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New</h3>
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
                                    <label>Product Modelno<span class="text-danger">*</span></label>&nbsp;&nbsp;<small>(Only alphanumeric and dash(-) allowed)</small>
                                    <input type="text" value="<?php echo $product_data["product_modelno"];?>" name="tb_modelno" style="width: 100%;" id="tb_modelno"  class="form-control"/>
                                    <small id="err_modelno" style="color: #ff0000;"></small>
                                </div>
                                <div class="form-group">
                                    <label>Category<span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="dd_category[]" id="dd_category" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;">
                                        <?php foreach($category_data as $iRow) {
                                            $sSeltected = '';
                                            foreach ($product_cat_data as  $iTemp) {
                                                echo $iTemp['category_id'];
                                                if($iTemp['category_id'] == $iRow['category_id']) {
                                                    $sSeltected = 'selected = "selected"';
                                                }
                                            }
                                            echo '<option '.$sSeltected.' value="'.$iRow['category_id'].'">'.$iRow['category_name'].'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Cover Image<span class="text-danger">*</span></label>
                                    <br/>
                                    <small class="text-warning">For better product presentation on website, we insist to upload images larger than 800X600 (Width X height)</small>
                                    <input type="file" name="file_coverimage" id="file_coverimage"/>

                                    <br/>
                                    <?php if($product_data["producr_cover_image"] != '') { ?>
                                        <a class="btm btn-xs btn-default" target="_blank" href="<?php echo base_url().'uploads/products/covers/'.$product_data["producr_cover_image"];?>">View image</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="tb_description" id="tb_description" class="editor form-control"><?php echo $product_data["product_description"];?></textarea>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Photos</h3>
                        <small class="text-warning" style="margin-left: 20px;">For better product presentation on website, we insist to upload images larger than 800X600 (Width X height)</small>
                        <input type="hidden" name="photo_json" id="photo_json"/>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="editDraftimageUploader">Upload</div>
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
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Specifications</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" id="div_specifications">
                        <?php
                        $sSpID = '';
                        $CI =& get_instance();
                        $CI->load->model('Products_model');
                            if(count($product_specifications) > 0) {
                            foreach($product_specifications as $spec) {
                                $sSpID .= $spec["product_feature_id"].',';?>
                                <div class="row specification row-eq-height" id="row_1">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Specification Title</label>
                                            <input type="text" value="<?php echo $spec["feature_title"];?>"  style="width: 100%;" id="tb_spectitle-<?php echo $spec["product_feature_id"];?>"  class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea  id="tb_specification-<?php echo $spec["product_feature_id"];?>" class="editor form-control"><?php echo $spec["feature_description"];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label></label>
                                            <div id="spImageUploader-<?php echo $spec["product_feature_id"]?>" class="feature_upload">Upload</div>
                                            <?php
                                            $product_spec_photos= $CI->Products_model->get_product_spec_photos('_rds_product_feature_photo',$spec["product_feature_id"],'specification');
                                            if(count($product_spec_photos) > 0) {
                                                echo '<ul class="products-list product-list-in-box imagelist">';
                                                $sPath = base_url().'uploads/products/specifications/';
                                                foreach($product_spec_photos as $sp_photo) {
                                                    echo '<li class="item">
                                                        <div class="product-img">
                                                            <img src="'.$sPath.$sp_photo["image_name"].'" />
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="" class="product-title">
                                                            <a class="btn btn-xs btn-danger" onclick="deleteFeatureImage('.$sp_photo["product_feature_photo_id"].');">Delete</a></a>
                                                        </div>
                                                        </li> ';
                                                }
                                                echo '</ul>';
                                            }?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="vcenter-btns">
                                            <div class="centerbtn">
                                        <a class="btn btn-xs btn-info" onclick="update_draft_specification('spec',<?php echo $spec["product_feature_id"];?>);">Update</a>
                                        <a class="btn btn-xs btn-danger" onclick="delete_draft_spec('spec',<?php echo $spec["product_feature_id"];?>);">Delete</a>
                                    </div></div></div>
                                </div>
                                <script>
                                    CKEDITOR.replace('tb_specification-<?php echo $spec["product_feature_id"]?>');
                                </script>
                            <?php  }
                        }?>
                        <input type="hidden" name="hdn_sp_id" id="hdn_sp_id" value="<?php echo rtrim($sSpID,",");?>"/>

                    </div>
                    <div class="box-footer">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-xs btn-primary" href="javascript:void(0);" onclick="add_new_row();"> <i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Options</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" id="div_options">
                        <?php
                        $opIds = '';
                        $CI =& get_instance();
                        $CI->load->model('Products_model');
                        if(count($product_options)) {
                            foreach ($product_options as $option) {
                                $opIds .= $option["product_feature_id"].',';?>
                                <div class="row option row-eq-height" id="item_1">
                                    <input type="hidden" name="option_img_json[]" id="option_img_json"/>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Option Title</label>
                                            <input type="text" value="<?php echo $option["feature_title"];?>"  style="width: 100%;" id="tb_opttitle-<?php echo $option["product_feature_id"]?>"  class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea  id="tb_optdesc-<?php echo $option["product_feature_id"]?>" class="editor form-control"><?php echo $option["feature_description"];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label></label>
                                            <div id="opImageUplaoder-<?php echo $option["product_feature_id"]?>" class="feature_upload">Upload</div>
                                            <?php
                                            $product_option_photos= $CI->Products_model->get_product_spec_photos('_rds_product_feature_photo',$option["product_feature_id"],'specification');
                                            if(count($product_option_photos) > 0) {
                                                echo '<ul class="products-list product-list-in-box imagelist">';
                                                $sPath = base_url().'uploads/products/options/';
                                                foreach($product_option_photos as $sp_photo) {
                                                    echo '<li class="item">
                                                        <div class="product-img">
                                                            <img src="'.$sPath.$sp_photo["image_name"].'" />
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="" class="product-title">
                                                            <a class="btn btn-xs btn-danger" onclick="deleteFeatureImage('.$sp_photo["product_feature_photo_id"].');">Delete</a></a>
                                                        </div>
                                                        </li> ';
                                                }
                                                echo '</ul>';
                                            }?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="vcenter-btns">
                                            <div class="centerbtn">
                                        <a class="btn btn-xs btn-info" onclick="update_draft_specification('option',<?php echo $option["product_feature_id"];?>);">Update</a>
                                        <a class="btn btn-xs btn-danger" onclick="delete_draft_spec('option',<?php echo $option["product_feature_id"];?>);">Delete</a>
                                    </div> </div> </div>
                                </div>
                                <script>
                                    CKEDITOR.replace('tb_optdesc-<?php echo $option["product_feature_id"]?>');
                                </script>
                        <?php } } ?>
                        <input type="hidden" name="hdn_op_id" id="hdn_op_id" value="<?php echo rtrim($opIds,",");?>"/>
                        <input type="hidden" name="hdn_product_type" id="hdn_product_type" value="D"/>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-xs btn-primary" href="javascript:void(0);" onclick="add_new_option_row();"> <i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                </div>
                <div class="box box-success">
                    <div class="box-footer">
                        <div class="col-md-12 text-right">
                            <p class="text-danger">To see the changes of Product, Click on "Save draft", and then click on the preview button.</p>
                            <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/products'; ?>';" class="btn btn-default">Cancel</button>
                            <?php if($live_product['product_status'] != 'draft') { ?>
                            <button type="button" onclick="fnDiscardChages(<?php echo $iListId;?>);" class="btn bg-orange">Discard changes</button>
                            <?php }?>

                            <a target="_blank" href="<?php echo base_url().'products/preview/1/'.$product_data["product_unique_slug"]; ?>" class="btn bg-navy ">Preview</a>
                            <button type="button" id="btn_publish" name="btn_publish" class="btn btn-success" onclick="publishProduct();">Publish</button>
                            <button type="button" id="btn_draft" name="btn_draft"  class="btn btn-info" onclick="return saveDraft();">Save Draft</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </section>
</div>