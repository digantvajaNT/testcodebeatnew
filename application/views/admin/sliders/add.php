<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Sliders Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sliders</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add New Slider</h3>
                            </div>
<!--                            <div class="callout callout-info">
                                <p>Click "Yes" to display a Product as a Home page slider.<br/>
                                For "No", you need to provide an image for slider item.<br/>
                                You can also add an banner image as slider for that you need to select only image (For that please select radio option as a "no").</p>
                            </div>-->
                            <?php
                            if($this->session->flashdata('slider')){
                                $message = $this->session->flashdata('slider');
                                ?>
                                <div class=" <?php echo $message['class'];?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                                </div>
                            <?php }	?>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php
                            $attributes = array('role' => 'form', 'id' => 'frmSlider', 'name' => 'frmSlider', 'class' => 'form-horizontal');
                            echo form_open_multipart('admin/sliders/add',$attributes);
                            ?>
                                <div class="box-body">
<!--                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Add Product as a Slider</label>
                                        <div class="col-sm-10">
                                            <label>
                                                <input type="radio" id="id_radio1" name="r1" value="yes" class="minimal" > Yes
                                            </label>&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" id="id_radio2" name="r1" class="minimal" value="no" checked> No
                                            </label>
                                        </div>
                                    </div>-->
<!--                                    <div id="prd_section" style="display: none;">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Select Product</label>
                                            <div class="col-sm-10">
                                                <select name="dd_products" id="dd_products" class="form-control">
                                                    <option value="">Please select--</option>
                                                    <?php if(count($product_data) > 0) {
                                                    foreach ($product_data as $prdRow) { ?>
                                                    <option value="<?php echo $prdRow["product_id"]; ?>"><?php echo $prdRow["product_name"]; ?></option>
                                                    <?php }
                                                } ?>
                                                </select>
                                             </div>
                                        </div>
                                    </div>-->

                                    <div id="sld_section">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Title <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tb_slidertitle" id="tb_slidertitle"  maxlength="80" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Description <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tb_description" id="tb_description"  maxlength="200" required>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label  class="col-sm-2 control-label">Link URL <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
											
                                                <input type="text" class="form-control" name="tb_link" id="tb_link"  maxlength="200" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Upload Image <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
											    <input type="file" name="file_sliderimage" id="file_sliderimage" class="form-control" required />
                                                <span style="color:red;">Image size- 1600x500</span>
                                            </div>
                                        </div>
                                       
                                               <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Upload Mobile Banner <span class="mandatory">*</span></label>
                                        <div class="col-sm-8" > 
                                            <input type="file" name="file_allimage" id="file_allimage" class="form-control" style="margin-bottom:0px;" required />
                                            <span style="color:red;">Image size- 305x447</span>
                                        </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer pull-right">
                                    <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/sliders'; ?>';" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                                <!-- /.box-footer -->
                            <?php echo form_close();?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>