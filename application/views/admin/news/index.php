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
                        <div class="col-xs-12">
                            <a href="<?php echo base_url('admin/news/add');?>" class="pull-right btn bg-maroon btn-flat margin">Add New</a>
                            <a href="<?php echo base_url('admin/news/change_order');?>" class="pull-right btn bg-purple btn-flat margin">Change order</a>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th class="nosort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($news_data) > 0) {
                                foreach ($news_data as $iRow) {
                                    if($iRow["news_status"] == 'inactive') {
                                        $sClassName = 'label-danger'; $sTooltip = 'Active News';
                                    } else { $sClassName = 'label-success'; $sTooltip = 'Inactive News';}?>
                                    <tr>
                                        <td><?php echo $iRow["news_title"];?></td>
                                        <td><a class="label <?php echo $sClassName;?>" href="<?php echo site_url('admin/news').'/update_status/'.$iRow['news_id'];?>" data-toggle="tooltip"><?php echo $iRow["news_status"];?></a> </td>
                                        <td>
                                            <a data-toggle="tooltip" title="Edit news" class="btn btn-default btn-xs" href="<?php echo site_url('admin/news').'/edit/'.$iRow['news_id'];?>"><em class="fa fa-pencil"></em></a>
                                            <a data-toggle="tooltip" title="Delete news" class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del_news(<?php echo $iRow['news_id'];?>);"><em class="fa fa-trash"></em></a>
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