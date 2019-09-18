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
            <li class="active">Store Locator </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Area Details</h3>
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
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="<?php echo base_url('admin/Store_Locator/addarea');?>" class="pull-right btn bg-maroon btn-flat margin">Add New</a>
                                <!--<a href="<?php //echo base_url('admin/Store_Locator/change_order');?>" class="pull-right btn bg-purple btn-flat margin">Change order</a>-->
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Area Name</th>
                                
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($area_data) > 0) {
                                foreach ($area_data as $iRow) {
                                    // if($iRow["category_status"] == 'inactive') {
                                        // $sClassName = 'label-danger'; $sTooltip = 'Active Category';
                                    // } else { $sClassName = 'label-success'; $sTooltip = 'Inactive Category';}?>
                                    <tr>
                                        <td><?php echo $iRow["tb_name"];?></td>
                                        <td>
                                            <a data-toggle="tooltip" title="Edit category" class="btn btn-default btn-xs" href="<?php echo site_url('admin/Store_Locator').'/edit/'.$iRow['tb_area_id'];?>"><em class="fa fa-pencil"></em></a>
                                            <a data-toggle="tooltip" title="Delete category" class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del_category(<?php echo $iRow['tb_area_id'];?>,<?php echo $iRow["live_products"];?>);"><em class="fa fa-trash"></em></a>
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

    function del_category(tb_area_id)
    {
        if(tb_area_id != '')
        {
           
                $.confirm({
                    title: 'Budlong',
                    content: 'Are you sure you want to Delete this Area?',
                    buttons: {
                        confirm: {
                            text: 'Confirm',
                            btnClass: 'btn-danger',
                            keys: ['enter', 'shift'],
                            action: function(){
                                window.location.href = '<?php echo site_url('admin/Store_Locator').'/delete/';?>'+tb_area_id;
                            }
                        },
                        cancel: {
                            text: 'Cancel',
                            btnClass: 'btn-default',
                            action: function(){
                            }
                        }
                    },
                    icon: 'fa fa-times',
                });
           

        }
    }
</script>