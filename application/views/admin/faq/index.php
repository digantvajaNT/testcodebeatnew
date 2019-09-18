<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            FAQ
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
                    <div class="box-header">
                        <h3 class="box-title">FAQ</h3>
                    </div>
                    <?php
                    if ($this->session->flashdata('faq')) {
                        $message = $this->session->flashdata('faq');
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
                                    <th>Question</th>
                                    <th>Answer</th>
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
                                            <td><?php echo $iRow["faq_question"]; ?></td>
                                            <td><?php echo $iRow["faq_answer"]; ?></td>
                                             <td><?php
                                          //  if($iRow["status"] == 'active') {
                                          //      echo '<a href="javascript:void(0);" class="btn btn-xs '.$sClassName.'">Active</a>';
                                          //  } else {
                                                echo '<a href="'.base_url('admin/faq/update_status/'.$iRow["id"]).'" class="btn btn-xs '.$sClassName.'">'.$name.'</a>';
                                           // } 
											?>
                                            </td>
                                            <td> 
                                                <a data-toggle="tooltip" title="Edit FAQ" class="btn btn-default btn-xs" href="<?php echo site_url('admin/faq') . '/edit/' . $iRow['id']; ?>"><em class="fa fa-pencil"></em></a>
                                                <a data-toggle="tooltip" class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="return del_product(<?php echo $iRow["id"]; ?>);" title="Delete FAQ"><i class="fa fa-trash-o"></i></a>

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
                title: 'BenchMark',
                content: 'Are you sure you want to Delete this FAQ?',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-danger',
                        keys: ['enter', 'shift'],
                        action: function () {
                            window.location.href = '<?php echo site_url('admin/faq') . '/delete/'; ?>' + id;
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