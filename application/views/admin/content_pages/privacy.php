<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Privacy

        </h1>

        <ol class="breadcrumb">

            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Privacy</li>

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
if ($this->session->flashdata('page')) {

    $message = $this->session->flashdata('page');
    ?>

                                <div class=" <?php echo $message['class']; ?>">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                                    <p><i class="<?php echo $message['icon']; ?>"></i> <?php echo $message['message']; ?></p>

                                </div>

<?php } ?>

                            <!-- /.box-header -->

                            <!-- form start -->

<?php
$attributes = array('role' => 'form', 'id' => 'frmPage', 'name' => 'frmPage', 'class' => 'form-horizontal');

echo form_open_multipart('admin/privacy', $attributes);
?>

                            <div class="box-body">

                                <div>
                                    <div class="form-group">

                                        <label  class="col-sm-2 control-label">Privacy <span class="text-danger">*</span></label>

                                        <div class="col-sm-10">

                                            <textarea name="privacy" id="privacy" class="form-control editor"><?php echo $page_data["privacy"]; ?></textarea>

                                        </div>

                                    </div>


                                </div>

                            </div>

                            <!-- /.box-body -->

                            <div class="box-footer pull-right">

                                <button type="submit" class="btn btn-info">Save</button>

                            </div>

                            <!-- /.box-footer -->

<?php echo form_close(); ?>

                        </div>

                    </div>

                    <!-- /.box-body -->

                </div>

            </div>

        </div>

    </section>

</div>