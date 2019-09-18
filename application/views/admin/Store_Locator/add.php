<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Store Locator
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Store Locator</li>
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
                                <h3 class="box-title">Add New Area</h3>
                            </div>
                            <?php
                            if($this->session->flashdata('Store Locator')){
                                $message = $this->session->flashdata('Store Locator');
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
                            echo form_open_multipart('admin/Store_Locator/addarea',$attributes);
                            ?>
                                <div class="box-body">
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Area Name<span class="text-danger">*</span></label>
									<div class="col-sm-10">
                               <input type="text" class="form-control" name="tb_Areaname" id="tb_Areaname"  maxlength="50">
                                     
                                </div>
                                </div>
                                    <div class="form-group">
                                   
                                <!-- /.box-body -->
                                <div class="box-footer pull-right">
                                    <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/Store_Locator/addarea'; ?>';" class="btn btn-default">Cancel</button>
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
