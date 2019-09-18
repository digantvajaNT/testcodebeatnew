<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Events Management

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
                    <div class="callout callout-info">
                        <p> 1. Drag events row to reorder.<br/>
                            2. Click 'Reorder events' when finished. </p>
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
                        <input type="hidden" name="hdn_contrl_name" id="hdn_contrl_name" value="events"/>
                        <div class="col-xs-12">
                            <a href="jabascript:void(0)" id="save_reorder"  class="pull-right btn bg-maroon btn-flat margin">Reorder events</a>

                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody class="reorder-photos-list">
                            <?php if(count($events_data) > 0) {
                                foreach ($events_data as $iRow) {
                                   if($iRow["event_status"] == 'inactive') {
                                        $sClassName = 'label-danger'; $sTooltip = 'Active Event';
                                    } else { $sClassName = 'label-success'; $sTooltip = 'Inactive Event';}?>
                                    <tr class="ui-sortable-handle" id="image_li_<?php echo $iRow["event_id"];?>">
                                        <td><?php echo $iRow["event_title"];?></td>
                                        <td><?php echo $iRow["event_venue"];?></td>
                                        <td><?php echo date("m-d,Y",strtotime($iRow["event_startdate"])).' - '.date("m-d,Y",strtotime($iRow["event_enddate"]));;?></td>
                                        <td><a class="label <?php echo $sClassName;?>"  data-toggle="tooltip"><?php echo $iRow["event_status"];?></a> </td>
                                        
                                                                                

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
