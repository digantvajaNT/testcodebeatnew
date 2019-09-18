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
                                <h3 class="box-title">Edit Slider</h3>
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
                            echo form_open_multipart('admin/sliders/edit/'.$iListId,$attributes);
                            ?>
                            <div class="box-body">
<!--                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Add Product as a Slider</label>
                                    <div class="col-sm-10">
                                        <label>
                                            <input type="radio" id="id_radio1" name="r1" value="yes" class="minimal" <?php  if($slider_data['product_id'] != '0') { echo 'checked="checked"'; } ?>> Yes
                                        </label>&nbsp;&nbsp;
                                        <label>
                                            <input type="radio" id="id_radio2" name="r1" class="minimal" value="no" <?php  if($slider_data['product_id'] == '0') { echo 'checked="checked"'; } ?>> No
                                        </label>
                                    </div>
                                </div>-->
<!--                                <div id="prd_section" style="<?php if($slider_data['product_id'] != '0') { echo ''; } else { echo 'display: none;'; } ?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Select Product</label>
                                        <div class="col-sm-10">
                                            <select name="dd_products" id="dd_products" class="form-control">
                                                <option value="">Please select--</option>
                                                <?php if(count($product_data) > 0) {
                                                    foreach ($product_data as $prdRow) {
                                                        $sSelected = '';
                                                        if($prdRow['product_id'] == $slider_data['product_id']) {
                                                            $sSelected = 'selected="selected"';
                                                        }?>
                                                        <option <?php echo $sSelected;?> value="<?php echo $prdRow["product_id"]; ?>"><?php echo $prdRow["product_name"]; ?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>-->
                                <div id="sld_section" style="<?php if($slider_data['product_id'] != '0') {  echo 'display: none;';  } ?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $slider_data['slider_title'];?>" class="form-control" name="tb_slidertitle" id="tb_slidertitle"  maxlength="50">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="editor" name="tb_description" id="tb_description"><?php echo $slider_data['slider_content'];?>
                                            </textarea>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label  class="col-sm-2 control-label">Link</label>
                                        <div class="col-sm-10">
										<input type="text" value="<?php echo $slider_data['slider_redirect_link'];?>" class="form-control" name="tb_link" id="tb_link"  maxlength="500">
                                     
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label">Upload Image <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="file_sliderimage" id="file_sliderimage" />
                                            <br/>
                                            <?php if($slider_data['slider_image'] != '') { ?>
                                                <a class="btn btn-xs bg-navy" target="_blank" href="<?php echo base_url().'uploads/sliders/'.$slider_data['slider_image'];?>">View image</a>
                                            <?php } ?>
                                            <input type="hidden" name="hn_slider_image" id="hn_slider_image" value="<?php echo $slider_data['slider_image'];?>"/>
                                        </div>
                                    </div>
                                   
                                            <div class="form-group">
                                        <label  class="col-sm-2 control-label">Mobile Upload Image <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="file_allimage" id="file_allimage" />
                                            <br/>
                                            <?php if($slider_data['slider_mob_image'] != '') { ?>
                                                <a class="btn btn-xs bg-navy" target="_blank" href="<?php echo base_url().'uploads/mob_sliders/'.$slider_data['slider_mob_image'];?>">View image</a>
                                            <?php } ?>
                                            <input type="hidden" name="hn_slider_image" id="hn_slider_image" value="<?php echo $slider_data['slider_mob_image'];?>"/>
                                        </div>
                                    </div>
                                        
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer pull-right">
                                <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/sliders'; ?>';" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info">Update</button>
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