<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Clients

        </h1>

        <ol class="breadcrumb">

            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Clients</li>

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

                            if ($this->session->flashdata('clients')) {

                                $message = $this->session->flashdata('clients');

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

                            echo form_open_multipart('admin/clients', $attributes);

                            ?>

                            <div class="box-body">

                                <div>

                                    

								<input type="hidden"  name="certificate_name" value="" id="certificate_name" class="form-control" required>



                                    <div class="form-group">

                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Clients <span class="mandatory">*</span></label>

                                        <div class="col-sm-8" >

                                            <small style="color:#828282;"></small>                            

                                            <div class="clearfix"></div>

                                            <input type="file" name="file_allimage" id="file_allimage" class="form-control"/>
                                            &nbsp;

                                            <?php

                                            if (count($page_data) > 0) {

                                                $i = 1;

												 foreach ($page_data as $iTemp) {

                                                    echo '<p>'. $i   ."<b>Image Name</b>-&nbsp;&nbsp;" . $iTemp['name'] . "&nbsp;&nbsp;";

                                                    echo '<a href="' . site_url('uploads/clients/') . $iTemp['name'] . '" target="_blank" title= "View client" class="btn btn-minier btn-success">

										  <i class="ace-icon fa fa-file-pdf-o"></i></a>';

                                                    echo "&nbsp;&nbsp;";

                                                    echo '<a href="' . site_url('admin/clients/remove_manual/') . $iTemp['c_id'] . '"  title= "Delete client" class="btn btn-minier btn-danger">

										  <i class="ace-icon fa fa-trash-o"></i></a>';

                                                    echo '</p>';

                                                    $i++;

                                                }

                                                

                                            }

                                            ?>

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