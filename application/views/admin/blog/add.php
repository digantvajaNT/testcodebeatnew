<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?php echo base_url();?>assets/admin/js/blog.js"></script>

<div class="loading" style="display: none;" id="loader">Loading&#8230;</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Blog Management
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
            echo form_open_multipart('admin/blog/add',$attributes);
            ?>
            <input type="hidden" name="hdn_product_id" id="hdn_product_id" value="0"/>
            <input type="hidden" name="hdn_p_status" id="hdn_p_status"/>
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
                                    <label>Blog Name<span class="text-danger">*</span></label>
                                    <input type="text" name="tb_productname" style="width: 100%;" id="tb_productname" class="form-control"/>
                                </div>
                               
                                <div class="form-group">
                                    <label>Category<span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="dd_category[]" id="dd_category" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;">
                                        <?php foreach($category_data as $iRow) {
                                            echo '<option value="'.$iRow['category_id'].'">'.$iRow['category_name'].'</option>';
                                        } ?>
                                    </select>
                                </div>
								 <div class="form-group">
                                    <label>Blog Less Details<span class="text-danger">*</span></label>
									 <textarea name="product_details" id="product_details" class="form-control editor"></textarea>
                                </div>
								
								 <div class="form-group">
                                    <label>Blog Description<span class="text-danger">*</span></label>
									 <textarea name="tb_description" id="tb_description" class="form-control editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Blog Cover Image<span class="text-danger">*</span></label>
                                    <br/>
                                    <small class="text-warning">For better product presentation on website, we insist to upload images larger than 800X600 (Width X height)</small>
                                    <input type="file" name="file_coverimage" id="file_coverimage"/>
                                </div>
                            </div>
                           
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
                            <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/blog'; ?>';" class="btn btn-default">Cancel</button>
                            <button type="button" id="btn_publish" name="btn_publish" class="btn btn-success" onclick="publishProduct();">Publish</button>
                            <!--<button type="button" id="btn_draft" name="btn_draft"  class="btn btn-info" onclick="return saveDraft();">Save Draft</button>-->
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </section>
</div>