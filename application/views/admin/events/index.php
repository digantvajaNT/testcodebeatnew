<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Event Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Events</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Events</h3>
                    </div>
                    <?php
                    if($this->session->flashdata('events')){
                        $message = $this->session->flashdata('events');
                        ?>
                        <div class=" <?php echo $message['class'];?>">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                        </div>
                    <?php }	?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-xs-12">
                            <a href="<?php echo base_url('admin/events/add');?>" class="pull-right btn bg-maroon btn-flat margin">Add New</a>
                            <a href="<?php echo base_url('admin/events/change_order');?>" class="pull-right btn bg-purple btn-flat margin">Change order</a>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="nosort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($events_data) > 0) {
                                foreach ($events_data as $iRow) {
                                    if($iRow["event_status"] == 'inactive') {
                                        $sClassName = 'label-danger'; $sTooltip = 'Active Event';
                                    } else { $sClassName = 'label-success'; $sTooltip = 'Inactive Event';}?>
                                    <tr>
                                        <td><?php echo $iRow["event_title"];?></td>
                                        <td><?php echo $iRow["event_venue"];?></td>
                                        <td><?php echo date("m-d,Y",strtotime($iRow["event_startdate"])).' - '.date("m-d,Y",strtotime($iRow["event_enddate"]));;?></td>
                                        <td><a class="label <?php echo $sClassName;?>" href="<?php echo site_url('admin/events').'/update_status/'.$iRow['event_id'];?>" data-toggle="tooltip"><?php echo $iRow["event_status"];?></a> </td>
                                      	<td>
                                            <a data-toggle="tooltip" title="Edit Event" class="btn btn-default btn-xs" href="<?php echo site_url('admin/events').'/edit/'.$iRow['event_id'];?>"><em class="fa fa-pencil"></em></a>
                                            <a data-toggle="tooltip" title="Delete Event" class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del_event(<?php echo $iRow['event_id'];?>);"><em class="fa fa-trash"></em></a>
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

    function del_event(event_id)
    {
        if(event_id != '')
        {
             $.confirm({
                    title: 'Saketh Exim LTD',
                    content: 'Are you sure you want to Delete this Event?',
                    buttons: {
                        confirm: {
                            text: 'Confirm',
                            btnClass: 'btn-danger',
                            keys: ['enter', 'shift'],
                            action: function(){
                                window.location.href = '<?php echo site_url('admin/events').'/delete/';?>'+event_id;
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