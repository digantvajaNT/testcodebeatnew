<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Career
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">        </li>
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
                                <h3 class="box-title">Update career</h3>
                            </div>
                            <?php
                            if ($this->session->flashdata('career')) {
                                $message = $this->session->flashdata('career');
                                ?>
                                <div class=" <?php echo $message['class']; ?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                                </div>
                            <?php } ?>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php
                            $attributes = array('role' => 'form', 'id' => 'frmCategory', 'name' => 'frmCategory', 'class' => 'form-horizontal');
                            echo form_open_multipart('admin/career/edit/' . $iListId, $attributes);
                            ?>

                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Technology name<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $case_study[0]['tech_name']; ?>" name="tech_name" id="tech_name"  maxlength="50" required>
                                    </div>
                                </div>

                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Experience<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $case_study[0]['experience']; ?>" name="experience" id="experience" required>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Technology Image<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" name="fileb_newsimages" id="fileb_newsimages" class="form-control"/>
                                    <br/>
                                    <?php if ($case_study[0]["img_url"] != '') { ?>
                                    <a href="<?php echo base_url() . 'assets/images/banner/' . $case_study[0]["img_url"] ?>" target="_blank" class="btn btn-xs bg-navy">View image</a>
                                <?php } ?>
                                </div>
                                <br/>
                                
                            </div>
                           
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Location<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $case_study[0]['location']; ?>" name="location" id="location" required >
                                    </div>
                                </div>

                            </div>
							<div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Job Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="job_description" id="job_description" required class="form-control editor"><?php echo $case_study[0]['job_description']; ?></textarea>

                                    </div>
                                </div>

                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Job Benefits</label>
                                    <div class="col-sm-10">
                                        <textarea name="job_benefits" id="job_benefits" required class="form-control editor"><?php echo $case_study[0]['job_benefits']; ?></textarea>
                                    </div>
                                </div>

                            </div>
                
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Job Requirement</label>
                                    <div class="col-sm-10">
                                        <textarea name="job_requirement" id="job_requirement"  class="form-control editor" required><?php echo $case_study[0]['job_requirement']; ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer pull-right">
                                <button type="button" onclick="javascript: window.location.href = '<?php echo base_url() . 'admin/career'; ?>';" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>