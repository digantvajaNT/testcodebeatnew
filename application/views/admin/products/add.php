<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="loading" style="display: none;" id="loader">Loading&#8230;</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Products Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            $attributes = array('role' => 'form', 'id' => 'frmNewProduct', 'name' => 'frmNewProduct', 'class' => '');
            echo form_open_multipart('admin/products/add',$attributes);
            ?>
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
                                    <label>Main Category<span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="dd_maincategory" id="dd_maincategory" data-placeholder="Select a Main Category" style="width: 100%;">
                                        <option value="">Select Main Category</option>
                                        <option value="1">Water Heaters</option>
                                        <option value="2">Commercial Water Heaters</option>
                                        <option value="3">Alkaline Products</option>
                                        
                                    </select>
                                </div>
								 <div class="form-group">
                                    <label>Category<span class="text-danger">*</span></label>
						
                                    <select class="form-control select2" name="dd_category[]" id="dd_category" data-placeholder="Select a Category" style="width: 100%;">
                                         <option value="">Select Category</option>
                                         <!-- <?php foreach($category_data as $iRow) {
                                             echo '<option value="'.$iRow['category_id'].'">'.$iRow['category_name'].'</option>';
                                         } ?> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Name<span class="text-danger">*</span></label>
                                    <input type="text" name="tb_productname" style="width: 100%;" id="tb_productname"  class="form-control"/>
                                </div>
								 <div class="form-group">
                                    <label>Capacity</label>
                                    <input type="text" name="tb_Capacity" style="width: 100%;" id="tb_Capacity"  class="form-control"/>
                                </div>								
								<div class="form-group">
                                    <label>Product Type</label>
                                    <input type="text" name="tb_ProductType" style="width: 100%;" id="tb_ProductType"  class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text" name="tb_Code" style="width: 100%;" id="tb_Code" class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Product Price</label>
                                    <input type="text" name="tb_Price" style="width: 100%;" id="tb_Price"  class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Product dimension</label>
                                    <input type="text" name="product_dimension" style="width: 100%;" id="product_dimension"  class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Features</label>
                                    <textarea name="tb_Features" id="tb_Features" class="editor form-control"></textarea>
                                </div>
								
                               
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
							<div class="form-group">
                                    <label>Technical Specifications<span class="text-danger">*</span></label>
                                    <textarea name="tb_description" id="tb_description" class="editor form-control"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label>Product Warranty</label>
                                    <input type="text" name="tb_modelno" style="width: 100%;" id="tb_modelno" class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Colors Available</label>
                                    <input type="text" name="tb_Colors" style="width: 100%;" id="tb_Colors" class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Ideal For</label>
                                    <input type="text" name="tb_Ideal" style="width: 100%;" id="tb_Ideal" class="form-control"/>
                                </div>
								
                                <div class="form-group">
                                    <label>Product Cover Image<span class="text-danger">*</span></label>
                                    <br/>
                                    <small class="text-warning">For better product presentation on website, we insist to upload images larger than 800X600 (Width X height)</small>
                                    <input type="file" name="file_coverimage" id="file_coverimage"/>
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
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="imageUploader">Upload</div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
               <!-- <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Specifications</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                        </div>
                    </div>
                    <div class="box-body" id="div_specifications">
                        <div class="row specification" id="row_1">
                            <input type="hidden" name="specification_img_json[]" id="specification_img_json"/>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Specification Title</label>
                                    <input type="text" name="tb_spectitle[]" style="width: 100%;" id="tb_spectitle"  class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="tb_specification[]" id="tb_specification" class="editor form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label></label>
                                    <div id="featureUploader" class="feature_upload">Upload</div>
                                </div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-xs btn-primary" href="javascript:void(0);" onclick="add_new_row();"> <i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                </div>-->
               <!-- <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Options</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                        </div>
                    </div>
                    <div class="box-body" id="div_options">
                        <div class="row option" id="item_1">
                            <input type="hidden" name="option_img_json[]" id="option_img_json"/>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Option Title</label>
                                    <input type="text" name="tb_opttitle[]" style="width: 100%;" id="tb_opttitle"  class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="tb_optdesc[]" id="tb_optdesc" class="editor form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label></label>
                                    <div id="opUploader" class="feature_upload">Upload</div>
                                </div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-xs btn-primary" href="javascript:void(0);" onclick="add_new_option_row();"> <i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                </div>-->
                <input type="hidden" name="hdn_cover" id="hdn_cover" value=""/>
                <div class="box box-success">
                    <div class="box-footer">
                        <div class="col-md-12 text-right">
                            <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/products'; ?>';" class="btn btn-default">Cancel</button>
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
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // City change
    $('#dd_maincategory').change(function(){
      var dd_maincategory = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?php echo base_url()?>admin/products/getCityDepartment',
        method: 'post',
        data: {dd_maincategory: dd_maincategory},
        dataType: 'json',
        success: function(response){
            //console.log(data);return false;
          // Remove options 
          $('#dd_category').find('option').not(':first').remove();
        
          // Add options
          $.each(response,function(index,data){
             $('#dd_category').append('<option value="'+data['category_id']+'">'+data['category_name']+'</option>');
          });
        }
     });
   });
 
   // Department change
  
 
 });
 </script>