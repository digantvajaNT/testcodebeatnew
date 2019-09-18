<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="loading" style="display: none;" id="loader">Loading&#8230;</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product Management

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Products</h3>
                    </div>
                    <?php
                    if($this->session->flashdata('product')){
                        $message = $this->session->flashdata('product');
                        ?>
                        <div class=" <?php echo $message['class'];?>">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                        </div>
                    <?php }	?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="callout callout-info">
                                    <p> 1. Select Category from List, to list all products.<br/>
                                        2. Drag category row to reorder.<br/>
                                        3. Click 'Reorder categories' when finished. </p>
                                </div>
                            </div>
                            <?php if(count($products_data) > 0) {    ?>
                                <div class="col-md-2">
                                    <a class="pull-right btn bg-maroon btn-flat margin" id="save_reorder">Reorder products</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row ">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <div class="form-group">

                                            <select name="dd_category" id="dd_category"  class="form-control" onchange="filter(this.value);">
                                                <option value="">Select Category--</option>
                                                <?php if(count($category_data) > 0) {
                                                    foreach($category_data as $item) {
                                                        $sPReTs = '';
                                                        if($iListId == $item["category_id"])
                                                        {
                                                            $sPReTs = 'selected="selected"';
                                                        }
                                                        echo '<option value="'.$item["category_id"].'" '.$sPReTs.'>'.$item["category_name"].'</option>';
                                                    }
                                                }?>
                                            </select>

                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="hdn_contrl_name" id="hdn_contrl_name" value="products"/>

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody class="reorder-photos-list">
                            <?php if(count($products_data) > 0) {
                                foreach ($products_data as $iRow) {
                                    if($iRow["product_status"] == 'inactive') {
                                        $sClassName = 'label-danger'; $sTooltip = 'Active Product';
                                    } else { $sClassName = 'label-success'; $sTooltip = 'Inactive Product';}?>
                                    <tr class="ui-sortable-handle" id="image_li_<?php echo $iRow["product_category_id"];?>">
                                        <td><?php echo $iRow["product_name"];?></td>
                                        <td><?php echo $iRow["category_name"];?></td>
                                        <td><?php
                                            if($iRow["product_status"] == 'draft') {
                                                echo '<a href="javascript:void(0);" class="btn btn-xs '.$sClassName.'">Draft</a>';
                                            } else {
                                                echo '<a href="'.base_url('admin/products/update_status/'.$iRow["product_id"]).'" class="btn btn-xs '.$sClassName.'">'.ucfirst($iRow["product_status"]).'</a>';
                                            } ?>
                                        </td>
                                    </tr>
                                <?php } } else { ?>
                                    <tr><td colspan="3">No data found.</td></tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function filter(category_id)
    {
        if(category_id != '')
        {
            window.location.href = '<?php echo site_url('admin/products').'/change_order/';?>'+category_id;
        }
    }
</script>