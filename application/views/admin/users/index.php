<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customers Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customers</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Customers</h3>
                    </div>
                    <?php
                    if($this->session->flashdata('users')){
                        $message = $this->session->flashdata('users');
                        ?>
                        <div class=" <?php echo $message['class'];?>">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                        </div>
                    <?php }	?>
                    <!-- /.box-header -->
                    <div class="box-body">                       
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Facility Name</th>
                                <th>Customer Name</th>
                                <th>Email Address</th>
                                <th>Contact No</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="nosort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($user_data) > 0) {
                                foreach ($user_data as $iRow) {
                                    ?>
                                    <tr>
                                        <td><?php echo $iRow["user_facility_name"];?></td>
                                        <td><?php echo $iRow["user_firstname"].' '.$iRow["user_lastname"];?></td>
                                        <td><?php echo $iRow["user_emailaddress"];?></td>
                                        <td><?php echo $iRow["user_contactno"];?></td>
                                        <td><?php echo date("M-d-Y",strtotime($iRow["user_updated_date"]));?></td>
                                        
                                        <td>
                                        	<?php if($iRow["user_status"] == "pending") { ?>
                                        		<a class="label label-primary" title="Approve Customers" href="<?php echo site_url('admin/users').'/approve/'.$iRow['user_id'];?>" data-toggle="tooltip">
                                        			<?php //echo $iRow["user_status"];?>Approve
                                    			</a> 
                                        	<?php } else if($iRow["user_status"] == "active") { ?>
                                        		<a class="label label-success" title="Inacitve Customers" href="<?php echo site_url('admin/users').'/update_status/'.$iRow['user_id'];?>" data-toggle="tooltip">
                                        			<?php echo $iRow["user_status"];?>
                                    			</a> 
                                        	<?php } else if($iRow["user_status"] == "inactive") { ?>
                                        		<a class="label label-danger" title="Active Customers" href="<?php echo site_url('admin/users').'/update_status/'.$iRow['user_id'];?>" data-toggle="tooltip">
                                        			<?php echo $iRow["user_status"];?>
                                    			</a> 
                                        	<?php }?>
                                        </td>	
                                        <td>
                                            <a data-toggle="tooltip" title="Edit Customer" class="btn btn-default btn-xs" href="<?php echo site_url('admin/users').'/edit/'.$iRow['user_id'];?>">
                                            	<em class="fa fa-pencil"></em>
                                        	</a> 
                                        	<?php if($iRow["user_status"] == "pending") { ?>                                           
                                            <a data-toggle="tooltip" title="Delete Customer" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/users').'/reject/'.$iRow['user_id'];?>">
                                            	<em class="fa fa-trash"></em>
                                        	</a>
                                        	<?php }?>
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

    function del_news(news_id)
    {
        if(news_id != '')
        {
             $.confirm({
                    title: 'Saketh Exim LTD',
                    content: 'Are you sure you want to Delete this News?',
                    buttons: {
                        confirm: {
                            text: 'Confirm',
                            btnClass: 'btn-danger',
                            keys: ['enter', 'shift'],
                            action: function(){
                                window.location.href = '<?php echo site_url('admin/news').'/delete/';?>'+news_id;
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