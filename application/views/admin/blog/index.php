<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Blog</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Blog</h3>
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
                        <div class="col-xs-12">
                            <a href="<?php echo base_url('admin/products/add');?>" class="pull-right btn bg-maroon btn-flat margin">Add New</a>
                           
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="30%">Blog Name</th>
                                <th width="30%">Category</th>
                                <!--<th width="10%">Is Featured?</th>-->
                                <th width="8%">Status</th>
                                <th width="12%" class="nosort">Actions</th>
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
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $iRow["product_name"];?></td>
                                        <td><?php echo $iRow["category_name"];?></td>
<!--                                        <td>
                                        	<?php if($iRow["product_status"] == 'draft') { ?>
                                        		<a href="javascript:void(0);" class="btn btn-xs btn-default"><?php echo ucfirst($iRow["product_isFeatured"]);?></a>
                                        	<?php } else {?>
                                        		<a href="<?php echo base_url().'admin/products/featured/'.$iRow["product_id"];?>" class="btn btn-xs btn-primary"><?php echo ucfirst($iRow["product_isFeatured"]);?></a>                                        		
                                    		<?php  } ?></td>-->
                                        <td><?php
                                            if($iRow["product_status"] == 'draft') {
                                                echo '<a href="javascript:void(0);" class="btn btn-xs '.$sClassName.'">Draft</a>';
                                            } else {
                                                echo '<a href="'.base_url('admin/blog/update_status/'.$iRow["product_id"]).'" class="btn btn-xs '.$sClassName.'">'.ucfirst($iRow["product_status"]).'</a>';
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if($iRow["product_status"] != 'draft') {?>
                                            <a data-toggle="tooltip" class="btn btn-xs btn-primary" href="<?php echo base_url('admin/blog/edit/'.$iRow["product_id"]);?>" title="Edit Live Blog"><i class="fa fa-edit"></i></a>
                                            <?php } ?>
                                          
                                            <a data-toggle="tooltip" class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="return del_product(<?php echo $iRow["product_id"];?>);" title="Delete Blog"><i class="fa fa-trash-o"></i></a>

                                        </td>
                                    </tr>
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
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    function del_product(product_id)
    {
        if(product_id != '')
        {
            $.confirm({
                title: 'Saketh Exim LTD',
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