<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Slider Management

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sliders</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sliders</h3>
                    </div>
                    <div class="callout callout-info">
                        <p> 1. Drag slider row to reorder.<br/>
                            2. Click 'Reorder slider' when finished. </p>
                    </div>
                    <?php
                    if($this->session->flashdata('slider')){
                        $message = $this->session->flashdata('slider');
                        ?>
                        <div class=" <?php echo $message['class'];?>">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                        </div>
                    <?php }	?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <input type="hidden" name="hdn_contrl_name" id="hdn_contrl_name" value="sliders"/>
                        <div class="col-xs-12">
                            <a href="jabascript:void(0)" id="save_reorder"  class="pull-right btn bg-maroon btn-flat margin">Reorder sliders</a>

                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody class="reorder-photos-list">

                            <?php if(count($slider_data) > 0) {
                                foreach ($slider_data as $iRow) {
                                    if($iRow["slider_status"] == 'inactive') {
                                        $sClassName = 'label-danger'; $sTooltip = 'Active slider';
                                    } else { $sClassName = 'label-success'; $sTooltip = 'Inactive slider';}?>
                                    <tr class="ui-sortable-handle" id="image_li_<?php echo $iRow["slider_id"];?>">
                                        <td><?php if($iRow["product_id"] != '' && $iRow["product_id"] != '0') { echo $iRow['product_name']; } else if($iRow["slider_title"] != '') { echo $iRow["slider_title"]; } else { echo 'Banner';} ?></td>
                                        <td>
                                            <?php if($iRow["product_id"] != '' && $iRow["product_id"] != "0") {?>
                                                <img src="<?php echo base_url().'uploads/products/covers/'.$iRow["producr_cover_image"];?>" height="50" width="50"/>
                                            <?php } else {?>
                                                <img src="<?php echo base_url().'uploads/sliders/'.$iRow["slider_image"];?>" height="50" width="50"/>
                                            <?php } ?>
                                        </td>
                                        <td><a class="label <?php echo $sClassName;?>" href="<?php echo site_url('admin/sliders').'/update_status/'.$iRow['slider_id'];?>" data-toggle="tooltip"><?php echo $iRow["slider_status"];?></a> </td>
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>
