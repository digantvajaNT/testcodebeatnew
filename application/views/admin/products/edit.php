<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="loading" style="display: none;" id="loader">Loading&#8230;</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Product
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
            echo form_open_multipart('admin/products/edit/'.$iListId,$attributes);
            ?>
            <input type="hidden" name="hdn_p_status" id="hdn_p_status"/>
            <input type="hidden" name="hdn_cover" id="hdn_cover" value="<?php echo $product_data["producr_cover_image"];?>"/>
            <input type="hidden" name="hdn_product_id" id="hdn_product_id" value="<?php echo $iListId;?>"/>
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
                                    <select class="form-control select2" name="dd_maincategory" id="dd_maincategory" multiple="multiple" data-placeholder="Select a Main Category" style="width: 100%;">
								<?php foreach ($product_cat_data as  $iTemp) {
                                                if($iTemp['ManuCtegory_id'] == 1) {
                                                    $sSeltected = 'selected = "selected"';
                                                }elseif($iTemp['ManuCtegory_id'] == 2){
													$sSeltected1 = 'selected = "selected"';
												}elseif($iTemp['ManuCtegory_id'] == 3){
													$sSeltected2 = 'selected = "selected"';
												}
								}
												?>
                                        <option <?php echo $sSeltected; ?> value="1">Water Heaters</option>
                                        <option <?php  echo $sSeltected1;  ?> value="2">Commercial Water Heaters</option>
                                        <option <?php  echo $sSeltected2;  ?> value="3">Alkaline Products</option>
                                        
                                    </select>
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
                                    <label>Product Name<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $product_data["product_name"];?>" name="tb_productname" style="width: 100%;" id="tb_productname"  class="form-control"/>
                                </div>
						 <div class="form-group">
                                    <label>Capacity</label>
                                    <input type="text" name="tb_Capacity" value="<?php echo $product_data["product_Capacity"];?>" style="width: 100%;" id="tb_Capacity"  class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Product Type</label>
                                    <input type="text" name="tb_ProductType" value="<?php echo $product_data["product_type"];?>" style="width: 100%;" id="tb_ProductType"  class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text" name="tb_Code" style="width: 100%;" value="<?php echo $product_data["product_Code"];?>" id="tb_Code"  class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Product Price</label>
                                    <input type="text" name="tb_Price" style="width: 100%;" value="<?php echo $product_data["product_Price"];?>" id="tb_Price"  class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Product dimension</label>
                                    <input type="text" name="product_dimension" style="width: 100%;" id="product_dimension" value="<?php echo $product_data["product_dimension"];?>"  class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Features</label>
                                    <textarea name="tb_Features" id="tb_Features" class=" form-control"><?php echo $product_data["product_isFeatured2"];?></textarea>
                                </div>
								
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <textarea name="tb_description" id="tb_description" class="editor form-control"><?php echo $product_data["product_description"];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Product Warranty</label>
                                    <input type="text" value="<?php echo $product_data["product_modelno"];?>" name="tb_modelno" style="width: 100%;" id="tb_modelno"  class="form-control"/>
                                </div>
                              <div class="form-group">
                                    <label>Colors Available</label>
                                    <input type="text" name="tb_Colors" style="width: 100%;" value="<?php echo $product_data["product_color"];?>" id="tb_Colors"  class="form-control"/>
                                </div>
								<div class="form-group">
                                    <label>Ideal For</label>
                                    <input type="text" name="tb_Ideal" style="width: 100%;" value="<?php echo $product_data["product_Idealfor"];?>" id="tb_Ideal"  class="form-control"/>
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
                </div>
               
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