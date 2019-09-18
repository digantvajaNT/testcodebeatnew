<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Testimonials
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Testimonials</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
<!--
                    <div class="box-header">
                        <h3 class="box-title">  Team Member</h3>
                    </div>
-->
                    <?php
                    if ($this->session->flashdata('committee')) {
                        $message = $this->session->flashdata('committee');
                        ?>
                        <div class=" <?php echo $message['class']; ?>">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                        </div>
                    <?php } ?>
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
                                    <th>Designation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($allcommittee) > 0) {
                                    foreach ($allcommittee as $iRow) {

                                        //if($iRow["category_status"] == 'inactive') {
                                        //    $sClassName = 'label-danger'; $sTooltip = 'Active Category';
                                        //} else { $sClassName = 'label-success'; $sTooltip = 'Inactive Category';}
                                        ?>
                                        <tr>
                                            <td><?php echo $iRow["committee_name"]; ?></td>
                                            <td><?php echo $iRow["desgination"]; ?></td>
                                            <td> 
                                                <a data-toggle="tooltip" title="Edit" class="btn btn-default btn-xs" href="<?php echo site_url('admin/committee') . '/edit/' . $iRow['id']; ?>"><em class="fa fa-pencil"></em></a>
                                                <a data-toggle="tooltip" class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="return del_product(<?php echo $iRow["id"]; ?>);" title="Delete"><i class="fa fa-trash-o"></i></a>

                                            </td>


                                        </tr>
                                    <?php }
                                }
                                ?>
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
                title: 'Benchmark',
                content: 'Are you sure you want to Delete?',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-danger',
                        keys: ['enter', 'shift'],
                        action: function () {
                            window.location.href = '<?php echo site_url('admin/committee') . '/delete/'; ?>' + id;
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