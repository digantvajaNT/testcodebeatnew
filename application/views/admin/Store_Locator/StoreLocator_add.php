<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Store Locator
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Store Locator</li>
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
                                <h3 class="box-title">Store Locator</h3>
                            </div>
                            <?php
                            if($this->session->flashdata('Store Locator')){
                                $message = $this->session->flashdata('Store Locator');
                                ?>
                                <div class=" <?php echo $message['class'];?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                                </div>
                            <?php }	?>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="error-handling-messages">
                            <div class="notification is-danger">
                                <div class="alert alert-danger">
                                    <?php echo validation_errors(); ?>        
                                </div>
                            </div>
                        </div>
                            <?php
                            $attributes = array('role' => 'form', 'id' => 'frmCategory', 'name' => 'frmCategory', 'class' => 'form-horizontal');
                            echo form_open_multipart('admin/Store_Locator/addLoocator',$attributes);
                            ?>
                                <div class="box-body">
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Area<span class="text-danger">*</span></label>
							<div class="col-sm-10">
                                    <select class="form-control select2" name="dd_Area[]" id="dd_Area" data-placeholder="Select a Area" style="width: 100%;">
                                         <?php foreach($area_data as $iRow) {
                                             echo '<option value="'.$iRow['tb_area_id'].'">'.$iRow['tb_name'].'</option>';
                                         } ?>
                                    </select>
                                </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Locator Name<span class="text-danger">*</span></label>
									<div class="col-sm-10">
                               <input type="text" class="form-control" name="tb_Locator" id="tb_Locator"  maxlength="50">
                                     
                                </div>
                                </div>
<!-- 								<div class="form-group">
                                    <label class="col-sm-2 control-label">Locator Address<span class="text-danger">*</span></label>
									<div class="col-sm-10">
 
                                  <textarea name="tb_Address" id="tb_Address" class="form-control"></textarea>    
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Latitude<span class="text-danger">*</span></label>
                                    <div class="col-sm-2">
                                      <input name="latitude" id="latitude" class="form-control">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Longitude<span class="text-danger">*</span></label>
                                    <div class="col-sm-2">
                                      <input name="longitude" id="longitude" class="form-control">
                                  </div>
                              </div> 
                               <div class="form-group">
                                  <label class="col-sm-2 control-label">&nbsp;</label>  
                                  <div class="col-sm-10">
                                    <span class="text-danger">(Please find latitude and longitude by entering dealer address on <a href="https://www.latlong.net/" target="_blank">https://www.latlong.net/</a> and enter the latitude and longitude.)</span>
                                </div>
                              </div>-->

								<div class="form-group">
                                    <label class="col-sm-2 control-label">Locator Mobile No1<span class="text-danger">*</span></label>
									<div class="col-sm-10">
                               <input type="text" class="form-control" name="tb_Mobile1" id="tb_Mobile1"  maxlength="50">
                                     
                                </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Locator Mobile No2</label>
									<div class="col-sm-10">
                               <input type="text" class="form-control" name="tb_Mobile2" id="tb_Mobile2"  maxlength="50">
                                     
                                </div>
                                </div>
                                    <div class="form-group">
                                   
                                <!-- /.box-body -->
                                <div class="box-footer pull-right">
                                    <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/Store_Locator/addarea'; ?>';" class="btn btn-default">Cancel</button>
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

<script type="text/javascript">
        $( ".error-handling-messages").slideDown( "slow" );
        setTimeout(function() {
            $( ".error-handling-messages").slideUp( "slow" );
        }, 3000);
    
</script>

