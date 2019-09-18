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
            <input type="hidden" name="hdn_p_status" id="hdn_p_status"/>
            <input type="hidden" name="hdn_cover" id="hdn_cover" value="<?php echo $product_data["producr_cover_image"];?>"/>
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update</h3>
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
                                    <label>Product Warranty</label>
                                    <input type="text" value="<?php echo $product_data["product_modelno"];?>" name="tb_modelno" style="width: 100%;" id="tb_modelno"  class="form-control"/>
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
                                    <label>Description<span class="text-danger">*</span></label>
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