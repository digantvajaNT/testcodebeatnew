<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           FAQ
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
                                <h3 class="box-title">Update FAQ</h3>
                            </div>
                            <?php
                            if ($this->session->flashdata('faq')) {
                                $message = $this->session->flashdata('faq');
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
                            echo form_open_multipart('admin/faq/edit/' . $iListId, $attributes);
                            ?>

                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Question<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $case_study[0]['faq_question']; ?>" name="faq_question" id="faq_question"  required>
                                    </div>
                                </div>

                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Answer<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $case_study[0]['faq_answer']; ?>" name="faq_answer" id="faq_answer" required>
                                    </div>
                                </div>

                            </div>
                   
                            <!-- /.box-body -->
                            <div class="box-footer pull-right">
                                <button type="button" onclick="javascript: window.location.href = '<?php echo base_url() . 'admin/faq'; ?>';" class="btn btn-default">Cancel</button>
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