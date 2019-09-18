<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contact US
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Contact US</li>
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

                            </div>

                            <?php
                            if($this->session->flashdata('contactus')){
                                $message = $this->session->flashdata('contactus');
                                ?>
                                <div class=" <?php echo $message['class'];?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <p><i class="<?php echo $message['icon'];?>"></i> <?php echo $message['message']; ?></p>
                                </div>
                            <?php }	?>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php
                            $attributes = array('role' => 'form', 'id' => 'frmPage', 'name' => 'frmPage', 'class' => 'form-horizontal');
                            echo form_open_multipart('admin/contactus',$attributes);
                            ?>
                            <div class="box-body">
                                <div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Office Address Name 1 <span class="text-danger">*</span> </label>
                                        <div class="col-sm-6">
                                            <input name="name_one" id="name_one" class="form-control " value="<?php echo $page_data["name_one"];?>"/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-2 control-label">Office Address  <span class="text-danger">*</span> </label>
                                        <div class="col-sm-6">
                                            <input name="address_one" id="address_one" class="form-control " value="<?php echo $page_data["address_one"];?>"/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-2 control-label">Office Address Phone <span class="text-danger">*</span> </label>
                                        <div class="col-sm-6">
                                            <input name="phone_one" id="phone_one" class="form-control " value="<?php echo $page_data["phone_one"];?>"/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-2 control-label">Office Address Email <span class="text-danger">*</span> </label>
                                        <div class="col-sm-6">
                                            <input name="email_one" type="email" id="email_one" class="form-control " value="<?php echo $page_data["email_one"];?>"/>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label class="col-sm-2 control-label">Office Hours <span class="text-danger">*</span> </label>
                                        <div class="col-sm-6">
                                            <input name="name_second" id="name_second" class="form-control " value="<?php echo $page_data["name_second"];?>"/>
                                        </div>
                                    </div>
									<!--<div class="form-group">
                                        <label class="col-sm-2 control-label">Office Address  <span class="text-danger">*</span> </label>
                                        <div class="col-sm-6">
                                            <input name="address_second" id="address_second" class="form-control " value="<?php echo $page_data["address_second"];?>"/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-2 control-label">Office Address Phone <span class="text-danger">*</span> </label>
                                        <div class="col-sm-6">
                                            <input name="phone_second" id="phone_second" class="form-control " value="<?php echo $page_data["phone_second"];?>"/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-2 control-label">Office Address Email <span class="text-danger">*</span> </label>
                                        <div class="col-sm-6">
                                            <input name="mail_second" id="mail_second" class="form-control " value="<?php echo $page_data["mail_second"];?>"/>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <div class="">&nbsp;</div>
                                </div>
                                <div class="col-sm-6">
                                <!-- /.box-body -->
                                    <div class="box-footer" style="padding-top:0px;">
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>
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