<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Events Management</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Events</li>
        </ol>
    </section>
    <section class="content">      
        
        <div class="row">
            <div class="col-xs-12">

                <?php
                $attributes = array('role' => 'form', 'id' => 'frmEvents', 'name' => 'frmEvents', 'class' => '');
                echo form_open_multipart('admin/events/add/',$attributes);
                ?>
                <input type="hidden" name="hdn_mode" id="hdn_mode" value="home"/>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Add an Event</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        if($this->session->flashdata('event')){
                            $message = $this->session->flashdata('event');
                            ?>
                            <div class=" <?php echo $message['class'];?>">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                            </div>
                        <?php }	?>
                        <div>
                        	<div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="tb_title" id="tb_title" maxlength="100" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Upload Event Banner</label>
                                <input type="file" name="file_eventsimage" id="file_eventsimage" class="form-control"/>
                            </div>                            
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="tb_content" id="tb_content" class="editor"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Venue <span class="text-danger">*</span></label>
                                <input type="text" name="tb_venue" id="tb_venue" maxlength="100" class="form-control" />
                            </div>
                            <div class="form-group">
                                
                                <div class="row">                                	
                                	<div class="col-sm-6">
                                		<label>Start Date <span class="text-danger">*</span></label>
                                		<div class="input-group date" id="div_startdate">
						                  <div class="input-group-addon">
						                    <i class="fa fa-calendar"></i>
						                  </div>
						                  <input type="text" class="form-control pull-right" value="<?php echo date("m-d-Y");?>" name="tb_startdate" id="tb_startdate">
						                </div>
                                		
                                	</div>
                                	<div class="col-sm-6">
                                		<label>End Date <span class="text-danger">*</span></label>
                                		<div class="input-group date" id="div_enddate">
						                  <div class="input-group-addon">
						                    <i class="fa fa-calendar"></i>
						                  </div>
						                  <input type="text" class="form-control pull-right" value="<?php echo date("m-d-Y");?>"  name="tb_enddate" id="tb_enddate">
						                </div>                                		
                                	</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer pull-right">                        
                        <button type="button" class="btn btn-default" onclick="javascript: window.location.href='<?php echo base_url().'admin/events';?>';">Cancel</button>
                        <button type="submit" class="btn btn-info" >Save</button>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </section>
</div>
