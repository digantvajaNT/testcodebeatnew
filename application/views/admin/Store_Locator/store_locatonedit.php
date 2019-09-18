<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Store Management 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update Area</li>
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
                                <h3 class="box-title">Update Area</h3>
                            </div>
                            <?php
                            if($this->session->flashdata('Store')){
                                $message = $this->session->flashdata('Store');
                                ?>
                                <div class=" <?php echo $message['class'];?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                                </div>
                            <?php }	?>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php
                            $attributes = array('role' => 'form', 'id' => 'frmStore', 'name' => 'frmStore', 'class' => 'form-horizontal');
                            echo form_open_multipart('admin/Store_Locator/Locator_edit/'.$iListId,$attributes);
                            ?>
                            <div class="box-body">
						
							<div class="form-group">
                                    <label class="col-sm-2 control-label">Area<span class="text-danger">*</span></label>
							<div class="col-sm-10">
                                    <select class="form-control select2" name="dd_Area[]" id="dd_Area" multiple="multiple" data-placeholder="Select a Area" style="width: 100%;">
                                         <?php foreach($area_data as $iRow) {
                                             echo '<option value="'.$iRow['tb_area_id'].'">'.$iRow['tb_name'].'</option>';
                                         } ?>
                                    </select>
                                </div>
                                </div>
									<div class="form-group">
                                    <label class="col-sm-2 control-label">Locator Name<span class="text-danger">*</span></label>
									<div class="col-sm-10">
                               <input type="text" class="form-control" name="tb_Locator" value="<?php echo $locator_data['locator_name']?>" id="tb_Locator"  maxlength="50">
                                     
                                </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Locator Address<span class="text-danger">*</span></label>
									<div class="col-sm-10">
 
                                  <textarea name="tb_Address" id="tb_Address" class="editor form-control"><?php echo $locator_data['lovator_add']?></textarea>    
                                </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Locator Mobile No1<span class="text-danger">*</span></label>
									<div class="col-sm-10">
                               <input type="text" class="form-control" name="tb_Mobile1" id="tb_Mobile1" value="<?php echo $locator_data['locator_mno1']?>" maxlength="50">
                                     
                                </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Locator Mobile No2<span class="text-danger">*</span></label>
									<div class="col-sm-10">
                               <input type="text" class="form-control" name="tb_Mobile2" id="tb_Mobile2" value="<?php echo $locator_data['locator_mno2']?>"  maxlength="50">
                                     
                                </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer pull-right">
                                <button type="button" onclick="javascript: window.location.href='<?php echo base_url().'admin/Store_Locator/edit'; ?>';" class="btn btn-default">Cancel</button>
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