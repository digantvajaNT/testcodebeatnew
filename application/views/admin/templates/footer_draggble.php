<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="https://www.nichetech.in">NicheTech</a>.</strong> All rights
    reserved.
</footer>
</div>  
<!-- ./wrapper --> 
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/admin/ui/jquery.min.js"></script>
<!-- Bootstrap 3.3.5 --> 
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script> 
<!-- App min--> 
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/app.min.js"></script> 

<script src="<?php echo base_url();?>assets/admin/ui/jquery-ui.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/ui/jquery-ui.css" type="text/css">

<script type="text/javascript">
$("tbody.reorder-photos-list").sortable({ tolerance: 'pointer' });
$('.ui-sortable-handle').css("cursor","move");

$("#save_reorder").click(function( e ){
    if( !$("#save_reorder i").length ){
        var h = []; var contrl_name = $("#hdn_contrl_name").val();
        $("tbody.reorder-photos-list tr").each(function() {  h.push($(this).attr('id').substr(9));  });
        
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/');?>"+contrl_name+"/update_order",
            data: {ids: " " + h + ""},
            success: function(data){
                window.location.reload();                
            }
        });	
        return false;
    }	
    e.preventDefault();		
});
</script>
