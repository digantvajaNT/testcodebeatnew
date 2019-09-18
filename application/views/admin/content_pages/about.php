<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            About Us

        </h1>

        <ol class="breadcrumb">

            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">About Us</li>

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

                            if($this->session->flashdata('page')){

                                $message = $this->session->flashdata('page');

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

                            echo form_open_multipart('admin/aboutus',$attributes);

                            ?>

                            <div class="box-body">

                                <div>

                                    <!--<div class="form-group">

                                        <label class="col-sm-2 control-label">Title <span class="text-danger">*</span> </label>

                                        <div class="col-sm-10">

                                            <input type="text" class="form-control" name="tb_pagetitle" value="<?php echo $page_data["page_title"];?>" id="tb_pagetitle"  maxlength="50">

                                        </div>

                                    </div>-->

									

                                    <div class="form-group">

                                        <label  class="col-sm-2 control-label">About us <span class="text-danger">*</span></label>

                                        <div class="col-sm-10">

                                            <textarea name="overview" id="overview" class="form-control "><?php echo $page_data["overview"];?></textarea>

                                        </div>

                                    </div>

									<div class="form-group">

                                        <label  class="col-sm-2 control-label">Expert Engineers <span class="text-danger">*</span></label>

                                        <div class="col-sm-10">

                                            <textarea name="firm_profile" id="firm_profile" class="form-control editor"><?php echo $page_data["firm_profile"];?></textarea>

                                        </div>

                                    </div>

									<div class="form-group">

                                        <label  class="col-sm-2 control-label">Customer Support<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">

                                            <textarea name="misson_statement" id="misson_statement" class="form-control editor"><?php echo $page_data["misson_statement"];?></textarea>

                                        </div>

                                    </div>

									<div class="form-group">

                                        <label  class="col-sm-2 control-label">Delivery On time<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">

                                            <textarea name="client_principle" id="client_principle" class="form-control editor"><?php echo $page_data["client_principle"];?></textarea>

                                        </div>

                                    </div>

									

									<div class="form-group">

                                        <label  class="col-sm-2 control-label">About Us Image <span class="text-danger">*</span></label>

                                        <div class="col-sm-10">

                                            <input type="file" name="file_newsimage" id="file_newsimage" class="form-control"/>
                                            <br/>

                                            <?php if($page_data["activity_image"] != '') { ?>

                                                <a href="<?php echo base_url().'uploads/home/'.$page_data["activity_image"]?>" target="_blank" class="btn btn-xs bg-navy">View image</a>

                                            <?php } ?>

                                        </div>
									

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