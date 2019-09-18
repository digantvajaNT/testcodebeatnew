<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Website Configuration</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Website Configuration</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
           <!-- <div class="col-xs-6">
                <div class="box">
                    <?php
                    $attributes = array('role' => 'form', 'id' => 'frmConfig', 'name' => 'frmConfig', 'class' => '');
                    echo form_open_multipart('admin/configuration',$attributes);
                    ?>
                    <input type="hidden" name="hdn_mode" id="hdn_mode" value="meta"/>
                    <div class="box-body">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Website Meta Details</h3>
                            </div>
                            <div class="box-body">
                                <?php
                                if($this->session->flashdata('meta')){
                                    $message = $this->session->flashdata('meta');
                                    ?>
                                    <div class=" <?php echo $message['class'];?>">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                                    </div>
                                <?php }	?>
                                <div>
                                    <div class="form-group">
                                        <label>Contact No</label>
                                        <input type="text" value="<?php echo $config_data["site_contactno"];?>" class="form-control" name="tb_contactno" value="" id="tb_contactno"  maxlength="50">
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" value="<?php echo $config_data["site_title"];?>" class="form-control" name="tb_webtitle" value="" id="tb_webtitle"  maxlength="150">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="tb_meta_description" id="tb_meta_description" class="form-control"><?php echo $config_data["site_description"];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <textarea name="tb_meta_keywords" id="tb_meta_keywords" class="form-control"><?php echo $config_data["site_keywords"];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer pull-right">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>-->
            <div class="col-xs-6">
                <div class="box">
                    <!-- /.box-header -->
                    <?php
                    $attributes = array('role' => 'form', 'id' => 'frmSocialConfig', 'name' => 'frmSocialConfig', 'class' => '');
                    echo form_open_multipart('admin/configuration',$attributes);
                    ?>
                    <div class="box-body">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Social Links</h3>
                            </div>
                            <div class="box-body">
                                <?php
                                if($this->session->flashdata('social')){
                                    $message = $this->session->flashdata('social');
                                    ?>
                                    <div class=" <?php echo $message['class'];?>">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                                    </div>
                                <?php }	?>
                                <input type="hidden" name="hdn_mode" id="hdn_mode" value="social"/>
                                <div>
                                    <div class="form-group">
                                        <label>Facebook Page</label>
                                        <input type="text" value="<?php echo $config_data["facebook_url"];?>" class="form-control" name="tb_facebookurl" value="" id="tb_facebookurl"  >

                                    </div>
                                    <div class="form-group">
                                        <label>Pin Interest</label>
                                        <input type="text" value="<?php echo $config_data["google_url"];?>" class="form-control" name="tb_googleplus" value="" id="tb_googleplus"  >
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter URL </label>
                                        <input type="text" value="<?php echo $config_data["twitter_url"];?>" class="form-control" name="tb_twitterurl" value="" id="tb_twitterurl"  >

                                    </div>
                                    <div class="form-group">
                                        <label>LinkedIn URL</label>
                                        <input type="text" value="<?php echo $config_data["linkedin_url"];?>" class="form-control" name="tb_linkedinurl" value="" id="tb_linkedinurl" >
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer pull-right">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </div>
                    <?php echo form_close();?>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-xs-12">
                <?php
                $attributes = array('role' => 'form', 'id' => 'frmConfig', 'name' => 'frmConfig', 'class' => '');
                echo form_open_multipart('admin/configuration',$attributes);
                ?>
                <input type="hidden" name="hdn_mode" id="hdn_mode" value="quote"/>
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Quote Information</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        if($this->session->flashdata('quote')){
                            $message = $this->session->flashdata('quote');
                            ?>
                            <div class=" <?php echo $message['class'];?>">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                            </div>
                        <?php }	?>
                        <div>
                            <div class="form-group">
                                <label>Quote Recipient Email</label>
                                <input type="text" value="<?php echo $config_data["quote_emails"];?>" class="form-control" name="tb_quoteemails" id="tb_quoteemails">
                            </div>
                            <div class="form-group">
                                <label>Thank you message</label>
                                <textarea name="tb_quote_thankyou" id="tb_quote_thankyou" class="editor"><?php echo $config_data["quote_thankyou"];?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer pull-right">
                        <button type="submit" class="btn btn-info" onclick="return validate_EmailsString();">Save</button>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
        </div>-->
        <!--<div class="row">
            <div class="col-xs-12">
                <?php
                $attributes = array('role' => 'form', 'id' => 'frmConfig', 'name' => 'frmConfig', 'class' => '');
                echo form_open_multipart('admin/configuration',$attributes);
                ?>
                <input type="hidden" name="hdn_mode" id="hdn_mode" value="contact"/>
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Contact Us Information</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        if($this->session->flashdata('contact')){
                            $message = $this->session->flashdata('contact');
                            ?>
                            <div class=" <?php echo $message['class'];?>">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                            </div>
                        <?php }	?>
                        <div>
                            <div class="form-group">
                                <label>Contact Us Recipient Email</label>
                                <input type="text" value="<?php echo $config_data["contact_emails"];?>" class="form-control" name="tb_contactemails" id="tb_contactemails">
                            </div>
                            <div class="form-group">
                                <label>Thank you message</label>
                                <textarea name="tb_contact_thank_you" id="tb_contact_thank_you" class="editor"><?php echo $config_data["contact_thankyou"];?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer pull-right">
                        <button type="submit" class="btn btn-info" onclick="return validate_EmailsString();">Save</button>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
        </div>-->
       <!-- <div class="row">
            <div class="col-xs-12">

                <?php
                $attributes = array('role' => 'form', 'id' => 'frmConfig', 'name' => 'frmConfig', 'class' => '');
                echo form_open_multipart('admin/configuration',$attributes);
                ?>
                <input type="hidden" name="hdn_mode" id="hdn_mode" value="home"/>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Home page Information</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        if($this->session->flashdata('home')){
                            $message = $this->session->flashdata('home');
                            ?>
                            <div class=" <?php echo $message['class'];?>">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                            </div>
                        <?php }	?>
                        <div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="file_homeimage" id="file_homeimage" class="form-control" style="height: auto;"/>
                                <br/>
                                <?php if($config_data["homepage_image"] != '') { ?>
                                	<a href="<?php echo base_url().'uploads/general/'.$config_data["homepage_image"]?>" target="_blank" class="btn btn-xs bg-navy">View image</a>
                            	<?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Upload Catalog</label>
                                <input type="file" name="file_catalog" id="file_catalog" class="form-control" style="height: auto;"/>
                                <br/>
                                <?php if($config_data["catalog_name"] != '') { ?>
                                	<a href="<?php echo base_url().'uploads/general/'.$config_data["catalog_name"]?>" target="_blank" class="btn btn-xs bg-red"><i class="fa fa-file-pdf-o"></i> View catalog</a>
                            	<?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Provide Content for Home page</label>
                                <textarea name="txt_home_content" id="txt_home_content" class="editor"><?php echo $config_data["homepage_content"];?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer pull-right">
                        <button type="submit" class="btn btn-info" onclick="return validate_EmailsString();">Save</button>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
        </div>-->
    </section>
</div>
<script type="text/javascript">
    function validate_EmailsString()
    {
        var sEmails = $("#tb_quoteemails").val();
        var split_Emails = sEmails.split(",");

        var flag = 0;
        jQuery.each( split_Emails, function( i, val ) {
            if(!isValidEmailAddress(val))
            {
                flag++;
            }
        });

        if(flag == 0)
        {
            return true;
        }
        else
        {
            $.alert({
                title: 'Saketh Exim LTD',
                content: 'Please enter valid Email address for Quote Recipient Emails.',
                confirmButtonClass: 'btn-info',
            });
            return false;
        }
    }

    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };
</script>