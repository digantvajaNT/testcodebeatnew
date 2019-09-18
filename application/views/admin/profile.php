<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit profile</li>
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
                                <h3 class="box-title">Update your profile</h3>
                            </div>
                            <?php
                            if($this->session->flashdata('update')){
                                $message = $this->session->flashdata('update');
                                ?>
                                <div class=" <?php echo $message['class'];?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                                </div>
                            <?php }	?>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php
                            $attributes = array('role' => 'form', 'id' => 'frmProfile', 'name' => 'frmProfile', 'class' => 'form-horizontal');
                            echo form_open('admin/profile',$attributes);
                            ?>
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">User name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tb_username" class="form-control" value="<?php echo $admin_data["admin_username"];?>" id="tb_username" readonly maxlength="50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tb_firstname" value="<?php echo $admin_data["admin_firstname"];?>" class="form-control" id="tb_firstname" maxlength="50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Last Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tb_lastname" value="<?php echo $admin_data["admin_lastname"];?>" class="form-control" id="tb_lastname" maxlength="50">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email Address<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tb_emailaddress" value="<?php echo $admin_data["admin_email"];?>" class="form-control" id="tb_emailaddress" maxlength="50">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer pull-right">
                                <button type="submit" class="btn btn-success">Update</button>
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