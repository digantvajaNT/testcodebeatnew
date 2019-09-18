<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>News Management</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">News</li>
        </ol>
    </section>
    <section class="content">      
        
        <div class="row">
            <div class="col-xs-12">
                <?php
                $attributes = array('role' => 'form', 'id' => 'frmEditUser', 'name' => 'frmEditUser', 'class' => '');
                echo form_open_multipart('admin/users/edit/'.$iListId,$attributes); ?>
               
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Edit Customers</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        if($this->session->flashdata('user')){
                            $message = $this->session->flashdata('user');
                            ?>
                            <div class=" <?php echo $message['class'];?>">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                            </div>
                        <?php }	?>
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input type="text" name="tb_firstname" value="<?php echo $user_data["user_firstname"];?>" id="tb_firstname" maxlength="50" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="tb_lastname" value="<?php echo $user_data["user_lastname"];?>" id="tb_lastname" maxlength="50" class="form-control" />
                            </div>
                        </div>    
                       	<div class="col-md-6">
                        	<div class="form-group">
                                <label>Facility Name <span class="text-danger">*</span></label>
                                <input type="text" name="tb_facilityname" value="<?php echo $user_data["user_facility_name"];?>" id="tb_facilityname" maxlength="100" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>Account No <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $user_data["user_account_no"];?>" id="tb_accno" name="tb_accno" maxlength="25" class="form-control" />
                            </div>
                        </div>       
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>Email Address <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $user_data["user_emailaddress"];?>" id="tb_emailaddress" name="tb_emailaddress" maxlength="50" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $user_data["user_contactno"];?>" id="tb_contactno" name="tb_contactno" maxlength="15" class="form-control" />
                            </div>
                        </div>  
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $user_data["user_emailaddress"];?>" id="tb_address" name="tb_address" maxlength="50" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>City <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $user_data["user_city"];?>" id="tb_city" name="tb_city" maxlength="15" class="form-control" />
                            </div>
                        </div>        
						<div class="col-md-6">
                        	<div class="form-group">
                                <label>Country <span class="text-danger">*</span></label>
                                <select class="form-control" id="dd_country" name="dd_country" onchange="showStates(this.value)">
                                	<?php if(count($country_data) > 0) {
										foreach($country_data as $iRow) {
											$sSelected = '';
											if(isset($user_data['user_country']) && $iRow["ctr_name"] == $user_data['user_country']) { $sSelected = 'selected="selected"'; }
											else if ($iRow["ctr_code"] == 'US') { $sSelected = 'selected="selected"'; }
											echo '<option value="'.$iRow["ctr_name"].'" '.$sSelected.'>'.$iRow["ctr_name"].'</option>';
										}
									}?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control" id="dd_province" name="dd_province">
                                	<?php if(count($state_data) > 0) {
										
										foreach($state_data as $iRow) {
											$sSelected = ''; 
											if(isset($user_data['user_state']) && $iRow["states_name"] == $user_data['user_state']) {
												$sSelected = 'selected="selected"';
											}
											echo '<option value="'.$iRow["states_name"].'" '.$sSelected.'>'.$iRow["states_name"].'</option>';
										}
									}?>
                                </select>
                            </div>
                        </div> 	
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>Zip code <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $user_data["user_zipcode"];?>" id="dd_zipcode" name="dd_zipcode" maxlength="6" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>Department <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $user_data["user_department"];?>" id="tb_department" name="tb_department" maxlength="30" class="form-control" />
                            </div>
                        </div> 
                        </div>
                        <div class="box-footer pull-right">                        
	                        <button type="button" class="btn btn-default" onclick="javascript: window.location.href='<?php echo base_url().'admin/users';?>';">Cancel</button>
	                        <button type="submit" class="btn btn-info" >Update</button>
	                    </div>
                    </div>
                    
                
                <?php echo form_close();?>
            </div>
        </div>
    </section>
</div>
