<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Home Page
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Home Page</li>
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
                            if($this->session->flashdata('home')){
                                $message = $this->session->flashdata('home');
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
                            echo form_open_multipart('admin/home',$attributes);
                            ?>
                            <div class="box-body">
                                <div>
								
                                   <!-- <div class="form-group">
                                        <label class="col-sm-2 control-label">Title <span class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tb_pagetitle" value="<?php echo $page_data["what_we_do"];?>" id="tb_pagetitle"  maxlength="50">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label">Why Saketh Exim <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="why_saketh" id="why_saketh" class="form-control editor"><?php echo $page_data["why_saketh"];?></textarea>
                                        </div>
                                    </div>
									 
							<div class="form-group">
                                        <label  class="col-sm-2 control-label">Upload Image <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                <input type="file" name="file_newsimage" id="file_newsimage" class="form-control"/>
                                        </div>
									<br/>
                                <?php if($page_data["why_image_url"] != '') { ?>
                                	<a href="<?php echo base_url().'uploads/home/'.$page_data["why_image_url"]?>" target="_blank" class="btn btn-xs bg-navy">View image</a>
                            	<?php } ?>
                                    </div>
                                   <br>
									 <div class="form-group">
                                        <label  class="col-sm-2 control-label">What we do <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="what_we_do" id="what_we_do" class="form-control editor"><?php echo $page_data["what_we_do"];?></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label  class="col-sm-2 control-label">What we do Image <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                <input type="file" name="file_weimage" id="file_weimage" class="form-control"/>
                                        </div>
									<br/>
                                <?php if($page_data["whatImage"] != '') { ?>
                                	<a href="<?php echo base_url().'uploads/home/'.$page_data["whatImage"]?>" target="_blank" class="btn btn-xs bg-navy">View image</a>
                            	<?php } ?>
                                    </div>
                                </div>
                            </div>
						
                            <!-- /.box-body -->
                            <div class="box-footer pull-right">
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