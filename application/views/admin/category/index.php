<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Categories</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Categories</h3>
                    </div>
                    <?php
                    if($this->session->flashdata('category')){
                        $message = $this->session->flashdata('category');
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
                                <div class="pull-right">
                                    <a href="<?php echo base_url('admin/category/add');?>" class="btn bg-maroon btn-flat margin" style="margin-right:0px;">Add New</a>
                                </div>
                                <!--<a href="<?php //echo base_url('admin/category/change_order');?>" class="pull-right btn bg-purple btn-flat margin">Change order</a>-->
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($category_data) > 0) {
                                foreach ($category_data as $iRow) {
                                    if($iRow["category_status"] == 'inactive') {
                                        $sClassName = 'label-danger'; $sTooltip = 'Active Category';
                                    } else { $sClassName = 'label-success'; $sTooltip = 'Inactive Category';}?>
                                    <tr>
                                        <td><?php echo $iRow["category_name"];?></td>
                                        <td><?php echo $iRow["category_description"];?></td>
                                        <td><a class="label <?php echo $sClassName;?>" href="<?php echo site_url('admin/category').'/update_status/'.$iRow['category_id'];?>" data-toggle="tooltip"><?php echo $iRow["category_status"];?></a> </td>
                                        <td>
                                            <a data-toggle="tooltip" title="Edit category" class="btn btn-default btn-xs" href="<?php echo site_url('admin/category').'/edit/'.$iRow['category_id'];?>"><em class="fa fa-pencil"></em></a>
                                            <a data-toggle="tooltip" title="Delete category" class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del_category(<?php echo $iRow['category_id'];?>,<?php echo $iRow["live_products"];?>);"><em class="fa fa-trash"></em></a>
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

    function del_category(category_id,item_count)
    {
        if(category_id != '')
        {
            if(item_count == 0) {
                $.confirm({
                    title: 'Budlong',
                    content: 'Are you sure you want to Delete this Category?',
                    buttons: {
                        confirm: {
                            text: 'Confirm',
                            btnClass: 'btn-danger',
                            keys: ['enter', 'shift'],
                            action: function(){
                                window.location.href = '<?php echo site_url('admin/category').'/delete/';?>'+category_id;
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
            } else {
                $.alert({
                    title: 'Budlong',
                    content: 'You can\'t delete this category because it contains products.',
                });
            }

        }
    }
</script>