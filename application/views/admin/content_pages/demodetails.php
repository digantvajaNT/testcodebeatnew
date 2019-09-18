<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Get Demo Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">  Get Demo Details</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">  Get Demo Details</h3>
                    </div>
                  
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!--  <div class="col-xs-12">
                             <a href="<?php echo base_url('admin/category/add'); ?>" class="pull-right btn bg-maroon btn-flat margin">Add New</a>
                             <a href="<?php echo base_url('admin/category/change_order'); ?>" class="pull-right btn bg-purple btn-flat margin">Change order</a>
                         </div>-->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>User Email</th>
                                    <th>User Mobile</th>
                                    <th>User Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($page_data) > 0) {
                                    foreach ($page_data as $iRow) {

                                        //if($iRow["category_status"] == 'inactive') {
                                        //    $sClassName = 'label-danger'; $sTooltip = 'Active Category';
                                        //} else { $sClassName = 'label-success'; $sTooltip = 'Inactive Category';}
                                        ?>
                                        <tr>
                                            <td><?php echo $iRow["user_first_name"]; ?></td>
                                            <td><?php echo $iRow["user_email_address"]; ?></td>
                                            <td><?php echo $iRow["user_mobile_no"]; ?></td>
                                            <td><?php echo $iRow["user_message"]; ?></td>
                                            <td><?php echo $iRow["date"]; ?></td>
                                         </tr>
                                    <?php } }  ?>
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
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    function del_product(id)
    {
        if (id != '')
        {
            $.confirm({
                title: 'Saketh Exim LTD',
                content: 'Are you sure you want to Delete this Board Of Directors?',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-danger',
                        keys: ['enter', 'shift'],
                        action: function () {
                            window.location.href = '<?php echo site_url('admin/bod') . '/delete/'; ?>' + id;
                        }
                    },
                    cancel: {
                        text: 'Cancel',
                        btnClass: 'btn-default',
                        action: function () {
                        }
                    }
                },
                icon: 'fa fa-times',
            });
        }
    }
</script>