<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Category Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Categories</li>
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
                                <h3 class="box-title">Add New</h3>
                            </div>
                            <?php
                            if($this->session->flashdata('category')){
                                $message = $this->session->flashdata('category');
                                ?>
                                <div class=" <?php echo $message['class'];?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                                </div>
                            <?php }	?>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php
                            $attributes = array('role' => 'form', 'id' => 'frmCategory', 'name' => 'frmCategory', 'class' => 'form-horizontal');
                            echo form_open_multipart('admin/category/add',$attributes);
                            ?>
                                <div class="box-body">
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Main Category<span class="text-danger">*</span></label>
									<div class="col-sm-10">
                                    <select class="form-control select2" name="dd_maincategory" id="dd_category" data-placeholder="Select a Main Category" >
                                        <option value="1">Water Heaters</option>
                                        <option value="2">Commercial Water Heaters</option>
                                        <option value="3">Alkaline Products</option>
                                        
                                    </select>
                                </div>
                                </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category Name<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tb_categoryname" id="tb_categoryname">
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-sm-2 control-label">Category Description</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="category_description" id="category_description"  >
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer pull-right">
                                    <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/category'; ?>';" class="btn btn-default">Cancel</button>
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
