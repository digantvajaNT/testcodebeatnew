<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Services
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Services</li>
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
                                <h3 class="box-title">Add New Services</h3>
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
                            echo form_open_multipart('admin/services/add',$attributes);
                            ?>
							<div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name"  maxlength="50" required>
                                        </div>
                                    </div>

                                </div>
								
								<div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control editor" name="description" id="description" required ></textarea>
                                        </div>
                                    </div>

                                </div>
                              
							  <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Service Image</label>
                                        <div class="col-sm-10">
										<input type="file" name="file_newsimage" id="file_newsimage" class="form-control"/>
                                        </div>
                                    </div>

                                </div>
								
									<div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Home Service Image</label>
                                        <div class="col-sm-10">
										<input type="file" name="ddfile_newsimage" id="ddfile_newsimage" class="form-control"/>
                                        </div>
                                    </div>
								 </div>
                                <!-- /.box-body -->
                                <div class="box-footer pull-right">
                                    <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/services'; ?>';" class="btn btn-default">Cancel</button>
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