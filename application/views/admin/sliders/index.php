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
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="<?php echo base_url('admin/sliders/add');?>" class="pull-right btn bg-maroon btn-flat margin">Add New</a>
    <!--                            <a href="<?php echo base_url('admin/sliders/change_order');?>" class="pull-right btn bg-purple btn-flat margin">Change order</a>-->
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th class="nosort">Image</th>
                                <!--<th>Status</th>-->
                                <th class="nosort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($slider_data) > 0) {
                                foreach ($slider_data as $iRow) {
                                    if($iRow["slider_status"] == 'inactive') {
                                        $sClassName = 'label-danger'; $sTooltip = 'Active slider';
                                    } else { $sClassName = 'label-success'; $sTooltip = 'Inactive slider';}?>
                                    <tr>
                                        <td><?php if($iRow["product_id"] != '' && $iRow["product_id"] != '0') { echo $iRow['product_name']; } else if($iRow["slider_title"] != '') { echo $iRow["slider_title"]; } else { echo 'Banner';} ?></td>
                                        <td>
                                            <?php if($iRow["product_id"] != '' && $iRow["product_id"] != "0") {?>
                                                <img src="<?php echo base_url().'uploads/products/covers/'.$iRow["producr_cover_image"];?>" height="50" width="50"/>
                                            <?php } else {?>
                                                <img src="<?php echo base_url().'uploads/sliders/'.$iRow["slider_image"];?>" height="50" width="50"/>
                                            <?php } ?>
                                        </td>
                                        <!--<td><a class="label <?php echo $sClassName;?>" href="<?php echo site_url('admin/sliders').'/update_status/'.$iRow['slider_id'];?>" data-toggle="tooltip"><?php echo $iRow["slider_status"];?></a> </td>-->
                                        <td>
                                            <a data-toggle="tooltip" title="Edit slider" class="btn btn-default btn-xs" href="<?php echo site_url('admin/sliders').'/edit/'.$iRow['slider_id'];?>"><em class="fa fa-pencil"></em></a>
                                            <a data-toggle="tooltip" title="Delete slider" class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del_slider(<?php echo $iRow['slider_id'];?>);"><em class="fa fa-trash"></em></a>
                                        </td>

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
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    function del_slider(slider_id)
    {
        if(slider_id != '')
        {
            $.confirm({
                title: 'Benchmark',
                content: 'Are you sure you want to Delete this Slider?',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-danger',
                        keys: ['enter', 'shift'],
                        action: function(){
                            window.location.href = '<?php echo site_url('admin/sliders').'/delete/';?>'+slider_id;
                        }
                    },
                    cancel: {
                        text: 'Cancel',
                        btnClass: 'btn-default',
                        action: function(){
                        }
                    }
                },
                icon: 'fa fa-times'
            });
        }
    }
</script>