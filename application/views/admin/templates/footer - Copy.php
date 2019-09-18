<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <strong>Powered By <a href="https://www.nichetech.in/" target="_blank">NicheTech</a></strong>
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="http://www.radiationshieldinginc.com/" target="_blank">Radiation
            Shielding Inc.</a></strong> All rights
    reserved.
</footer>
</div>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.ckeditor.com/4.10.0/basic/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admin/js/demo.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.js"></script>
<?php if ($this->uri->segment(2) == "products") { ?>
    <script src="<?php echo base_url(); ?>assets/admin/js/products.js"></script>
<?php } else { ?>
    <script src="<?php echo base_url(); ?>assets/admin/js/form_validations.js"></script>
<?php } ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/select2/select2.full.min.js"></script>
<Script type="text/javascript">
    $(function () {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        $(".select2").select2();

        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "aaSorting": [],
            columnDefs: [{orderable: false, "targets": "nosort"}],
        });
    });
    //CKEDITOR.replace( 'tb_description' );
    $(function () {
        $('.editor').each(function (e) {
            CKEDITOR.replace(this.id);
        });
    });
</Script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/jquery.uploadfile.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/uploadfile.css" type="text/css">
<script>
    $(document).ready(function () {

        var photos = new Array();
        var sp_photos = new Array();
        var op_photos = new Array();
        $("#imageUploader").uploadFile({
            url: "<?php echo base_url();?>/admin/products/uploadPhotos",
            fileName: "file_image",
            allowedTypes: "jpeg,jpg,png,gif",
            onSuccess: function (files, data, xhr, pd) {
                photos.push(data);
                $("#photo_json").val(JSON.stringify(photos));
            },
        });
        $("#featureUploader").uploadFile({
            url: "<?php echo base_url();?>/admin/products/uploadSpImages",
            fileName: "file_specification",
            dragdropWidth: '100%',
            statusBarWidth: '100%',
            allowedTypes: "jpeg,jpg,png,gif",
            onSuccess: function (files, data, xhr, pd) {
                sp_photos.push(data);
                $("#specification_img_json").val(JSON.stringify(sp_photos));
            },
        });
        $("#opUploader").uploadFile({
            url: "<?php echo base_url();?>/admin/products/uploadOpImages",
            fileName: "file_option",
            dragdropWidth: '100%',
            statusBarWidth: '100%',
            allowedTypes: "jpeg,jpg,png,gif",
            onSuccess: function (files, data, xhr, pd) {
                op_photos.push(data);
                $("#option_img_json").val(JSON.stringify(op_photos));
            },
        });
        $("#editDraftimageUploader").uploadFile({
            formData: {product_id: $("#hdn_product_id").val()},
            url: "<?php echo base_url();?>/admin/products/uploadDraftPhotos",
            fileName: "file_prd_photo",
            dragdropWidth: '100%',
            statusBarWidth: '100%',
            allowedTypes: "jpeg,jpg,png,gif",
            onSuccess: function (files, data, xhr, pd) {

            },
        });
        $("#editPrdimageUploader").uploadFile({
            formData: {product_id: $("#hdn_product_id").val()},
            url: "<?php echo base_url();?>/admin/products/uploadProductPhotos",
            fileName: "file_prd_photo",
            dragdropWidth: '100%',
            statusBarWidth: '100%',
            allowedTypes: "jpeg,jpg,png,gif"
        });
    });
</script>
<?php if ($this->uri->segment(3) == "edit" || $this->uri->segment(3) == "update_draft") { ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#hdn_product_type").val();
        if ($("#hdn_sp_id").val() != '') {
            var aIds = $("#hdn_sp_id").val().split(",");
            $.each(aIds, function (index, value) {
                $("#spImageUploader-" + value).uploadFile({
                    formData: {
                        product_id: $("#hdn_product_id").val(),
                        feature_id: value,
                        p_type: $("#hdn_product_type").val()
                    },
                    url: site_url + "admin/products/uploadPrdSpPhoto",
                    fileName: "file_sp_photo",
                    dragdropWidth: '100%',
                    statusBarWidth: '100%',
                    allowedTypes: "jpeg,jpg,png,gif"
                });
            });

        }
        if ($("#hdn_op_id").val() != '') {
            var oIDs = $("#hdn_op_id").val().split(",");
            $.each(oIDs, function (index, value) {
                $("#opImageUplaoder-" + value).uploadFile({
                    formData: {
                        product_id: $("#hdn_product_id").val(),
                        feature_id: value,
                        p_type: $("#hdn_product_type").val()
                    },
                    url: site_url + "admin/products/uploadPrdSpPhoto",
                    fileName: "file_op_photo",
                    dragdropWidth: '100%',
                    statusBarWidth: '100%',
                    allowedTypes: "jpeg,jpg,png,gif"
                });
            });

        }

    });
</script>
<?php } ?>
</body>
</html>
