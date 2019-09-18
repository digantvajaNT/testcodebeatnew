<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Products Management
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
                            <div class="col-xs-12">
                                <a href="<?php echo base_url('admin/products/add');?>" class="pull-right btn bg-maroon btn-flat margin">Add New</a>
                                <a href="<?php echo base_url('admin/products/change_order');?>" class="pull-right btn bg-purple btn-flat margin">Change order</a>
                            </div>
                        </div>
                        <div class="scrolltable">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr> <th width="30%">Category</th>
                                <th width="30%">Product Name</th>
                                <th width="30%">Capacity</th>
                                <th width="30%">Product Type</th>
                                <th width="30%">Features</th>
                                <th width="30%">Technical Specifications</th>
								<th width="10%">Warranty</th>
								<th width="10%">Color Available</th>
								<th width="10%">Ideal For</th>
                                <th width="10%">Is Featured?</th>
                                <th width="10%">Status</th>
                                <th width="10%" class="nosort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($product_data as $iRow) {
                                    $sClassName = '';
                                    if($iRow["product_status"] == 'draft') {
                                        $sClassName = 'btn-info';
                                    } else if($iRow["product_status"] == 'active') {
                                        $sClassName = 'btn-success';
                                    } else if($iRow["product_status"] == 'inactive') {
                                        $sClassName = 'btn-danger';
                                    }?>
                                    <tr>
									 <td><?php echo $iRow["category_name"];?></td>
                                        <td><?php echo $iRow["product_name"];?></td>
                                        <td><?php echo $iRow["product_Capacity"];?></td>
                                        <td><?php echo $iRow["product_type"];?></td>
                                        <td><?php echo $iRow["product_isFeatured2"];?></td>
                                        <td><?php echo $iRow["product_description"];?></td>
                                        <td><?php echo $iRow["product_modelno"];?></td>
                                        <td><?php echo $iRow["product_color"];?></td>
                                        <td><?php echo $iRow["product_Idealfor"];?></td>
                                       
                                        <td>
                                        	<?php if($iRow["product_status"] == 'draft') { ?>
                                        		<a href="javascript:void(0);" class="btn btn-xs btn-default"><?php echo ucfirst($iRow["product_isFeatured"]);?></a>
                                        	<?php } else {?>
                                        		<a href="<?php echo base_url().'admin/products/featured/'.$iRow["product_id"];?>" class="btn btn-xs btn-primary"><?php echo ucfirst($iRow["product_isFeatured"]);?></a>                                        		
                                    		<?php  } ?></td>
                                        <td><?php
                                            if($iRow["product_status"] == 'draft') {
                                                echo '<a href="javascript:void(0);" class="btn btn-xs '.$sClassName.'">Draft</a>';
                                            } else {
                                                echo '<a href="'.base_url('admin/products/update_status/'.$iRow["product_id"]).'" class="btn btn-xs '.$sClassName.'">'.ucfirst($iRow["product_status"]).'</a>';
                                            } ?>
                                        </td>
                                        <td class="actionbtns">
                                            <?php if($iRow["product_status"] != 'draft') {?>
                                            <a data-toggle="tooltip" class="btn btn-xs btn-primary" href="<?php echo base_url('admin/products/edit/'.$iRow["product_id"]);?>" title="Edit Live Product"><i class="fa fa-edit"></i></a>
                                            <?php } ?>
                                            <a data-toggle="tooltip" class="btn btn-xs btn-info" href="<?php echo base_url('admin/products/update_draft/'.$iRow["product_id"]);?>" title="Edit Draft"><i class="fa fa-paper-plane"></i></a>
                                            <a data-toggle="tooltip" class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="return del_product(<?php echo $iRow["product_id"];?>);" title="Delete Product"><i class="fa fa-trash-o"></i></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>
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

    function del_product(product_id)
    {
        if(product_id != '')
        {
            $.confirm({
                title: 'Benchmark Solution',
                content: 'Are you sure you want to Delete this Product?',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-danger',
                        keys: ['enter', 'shift'],
                        action: function(){
                            window.location.href = '<?php echo site_url('admin/products').'/delete/';?>'+product_id;
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