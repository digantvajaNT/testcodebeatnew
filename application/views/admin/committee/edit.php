<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Testimonial
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Testimonial</li>
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
                                <h3 class="box-title">Update Testimonial</h3>
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
                            echo form_open_multipart('admin/committee/edit/'.$iListId,$attributes);
                            ?>
                           
							<div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?php echo $category_data[0]['committee_name'];?>" name="committee_name" id="committee_name"  maxlength="50" required>
                                        </div>
                                    </div>

                                </div>
								<div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Desgination<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?php echo $category_data[0]['desgination'];?>" name="desgination" id="desgination"  maxlength="50" required>
                                        </div>
                                    </div>

                                </div>
								<div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Description<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                    <textarea type="text" class="form-control editor" name="description" id="description" required ><?php echo $category_data[0]['description'];?></textarea>

                                        </div>
                                    </div>

                                </div>
								
								<div class="form-group">
                                        <label  class="col-sm-2 control-label"> Upload Image <span class="text-error">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="file_newsimage" id="file_newsimage"  required />
                                            <br/>
                                            <?php if($category_data[0]['team_image'] != '') { ?>
                                                <a class="btn btn-xs bg-navy" target="_blank" href="<?php echo base_url().'uploads/home/'.$category_data[0]['team_image'];?>">View image</a>
                                            <?php } ?>
                                            <input type="hidden" name="hn_slider_image" id="hn_slider_image" value="<?php echo $category_data[0]['team_image'];?>"/>
                                        </div>
                                    </div>
                                                  
                            <div class="box-footer pull-right">
                                <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/committee'; ?>';" class="btn btn-default">Cancel</button>
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