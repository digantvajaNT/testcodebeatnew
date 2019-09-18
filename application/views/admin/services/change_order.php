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
                    <div class="callout callout-info">
                        <p> 1. Drag category row to reorder.<br/>
                            2. Click 'Reorder categories' when finished. </p>
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
                        <input type="hidden" name="hdn_contrl_name" id="hdn_contrl_name" value="category"/>
                        <div class="col-xs-12">
                            <a href="jabascript:void(0)" id="save_reorder"  class="pull-right btn bg-maroon btn-flat margin">Reorder categories</a>

                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody class="reorder-photos-list">
                            <?php if(count($category_data) > 0) {
                                foreach ($category_data as $iRow) {
                                    if($iRow["category_status"] == 'inactive') {
                                        $sClassName = 'label-danger'; $sTooltip = 'Active Category';
                                    } else { $sClassName = 'label-success'; $sTooltip = 'Inactive Category';}?>
                                    <tr class="ui-sortable-handle" id="image_li_<?php echo $iRow["category_id"];?>">
                                        <td><?php echo $iRow["category_name"];?></td>
                                        <td><a class="label <?php echo $sClassName;?>" href="<?php echo site_url('admin/category').'/update_status/'.$iRow['category_id'];?>" data-toggle="tooltip"><?php echo $iRow["category_status"];?></a> </td>
                                        <td>
                                            <a data-toggle="tooltip" title="Edit category" class="btn btn-default btn-xs" href="<?php echo site_url('admin/category').'/edit/'.$iRow['category_id'];?>"><em class="fa fa-pencil"></em></a>
                                            <a data-toggle="tooltip" title="Delete category" class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del_category(<?php echo $iRow['category_id'];?>);"><em class="fa fa-trash"></em></a>
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
