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
                $attributes = array('role' => 'form', 'id' => 'frmNews', 'name' => 'frmNews', 'class' => '');
                echo form_open_multipart('admin/news/edit/'.$iListId,$attributes);                ?>
               
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Edit News</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        if($this->session->flashdata('news')){
                            $message = $this->session->flashdata('news');
                            ?>
                            <div class=" <?php echo $message['class'];?>">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                            </div>
                        <?php }	?>
                        <div>
                        	<div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="tb_title" value="<?php echo $news_data["news_title"];?>" id="tb_title" maxlength="50" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="file_newsimage" id="file_newsimage" class="form-control"/>
                                <br/>
                                <?php if($news_data["news_image"] != '') { ?>
                                	<a href="<?php echo base_url().'uploads/news/'.$news_data["news_image"]?>" target="_blank" class="btn btn-xs bg-navy">Viw image</a>
                            	<?php } ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="tb_content" id="tb_content" class="editor"><?php echo $news_data["news_content"];?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer pull-right">                        
                        <button type="button" class="btn btn-default" onclick="javascript: window.location.href='<?php echo base_url().'admin/news';?>';">Cancel</button>
                        <button type="submit" class="btn btn-info" >Update</button>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </section>
</div>
