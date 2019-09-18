<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Career
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
<!--
                    <div class="box-header">
                        <h3 class="box-title">career</h3>
                    </div>
-->
                    <?php
                    if ($this->session->flashdata('career')) {
                        $message = $this->session->flashdata('career');
                        ?>
                        <div class=" <?php echo $message['class']; ?>">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                        </div>
                    <?php } ?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!--  <div class="col-xs-12">
                             <a href="<?php echo base_url('admin/career/add'); ?>" class="pull-right btn bg-maroon btn-flat margin">Add New</a>
                             <a href="<?php echo base_url('admin/career/change_order'); ?>" class="pull-right btn bg-purple btn-flat margin">Change order</a>
                         </div>-->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Experience</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($allcareer) > 0) {
                                    foreach ($allcareer as $iRow) {
                                         $sClassName = '';
                                    if($iRow["status"] == '1') {
                                        $sClassName = 'btn-success';
										$name='Active';
                                    }  else {
                                        $name='Inactive';
										$sClassName = 'btn-danger';
                                    }
                                     ?>
                                        <tr>
                                            <td><?php echo $iRow["tech_name"]; ?></td>
                                            <td><?php echo $iRow["experience"]; ?></td>
                                            <td><?php echo $iRow["location"]; ?></td>
                                             <td><?php
                                          //  if($iRow["status"] == 'active') {
                                          //      echo '<a href="javascript:void(0);" class="btn btn-xs '.$sClassName.'">Active</a>';
                                          //  } else {
                                                echo '<a href="'.base_url('admin/career/update_status/'.$iRow["c_id"]).'" class="btn btn-xs '.$sClassName.'">'.$name.'</a>';
                                           // } 
											?>
                                            </td>
                                            <td> 
                                                <a data-toggle="tooltip" title="Edit Career" class="btn btn-default btn-xs" href="<?php echo site_url('admin/career') . '/edit/' . $iRow['c_id']; ?>"><em class="fa fa-pencil"></em></a>
                                                <a data-toggle="tooltip" class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="return del_product(<?php echo $iRow["c_id"]; ?>);" title="Delete Career"><i class="fa fa-trash-o"></i></a>

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
                content: 'Are you sure you want to Delete this ?',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-danger',
                        keys: ['enter', 'shift'],
                        action: function () {
                            window.location.href = '<?php echo site_url('admin/career') . '/delete/'; ?>' + id;
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