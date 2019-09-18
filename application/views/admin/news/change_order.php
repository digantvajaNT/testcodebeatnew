<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            News Management

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">News</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">News</h3>
                    </div>
                    <div class="callout callout-info">
                        <p> 1. Drag news row to reorder.<br/>
                            2. Click 'Reorder news' when finished. </p>
                    </div>
                    <?php
                    if($this->session->flashdata('news')){
                        $message = $this->session->flashdata('news');
                        ?>
                        <div class=" <?php echo $message['class'];?>">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p><i class="icon fa fa-check"></i> <?php echo $message['message']; ?></p>
                        </div>
                    <?php }	?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <input type="hidden" name="hdn_contrl_name" id="hdn_contrl_name" value="news"/>
                        <div class="col-xs-12">
                            <a href="jabascript:void(0)" id="save_reorder"  class="pull-right btn bg-maroon btn-flat margin">Reorder news</a>

                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>News title</th>                               
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody class="reorder-photos-list">
                            <?php if(count($news_data) > 0) {
                                foreach ($news_data as $iRow) {
                                    if($iRow["news_status"] == 'inactive') {
                                        $sClassName = 'label-danger'; $sTooltip = 'Active News';
                                    } else { $sClassName = 'label-success'; $sTooltip = 'Inactive News';}?>
                                    <tr class="ui-sortable-handle" id="image_li_<?php echo $iRow["news_id"];?>">
                                        <td><?php echo $iRow["news_title"];?></td>
                                        <td><a class="label <?php echo $sClassName;?>"  data-toggle="tooltip"><?php echo $iRow["news_status"];?></a> </td>
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
