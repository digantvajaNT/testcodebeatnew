<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Budlong | Forgot Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/custom.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/admin/img/logo.png" alt="Logo" /></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
        <?php
        if($this->session->flashdata('forgotpwd')){
            $message = $this->session->flashdata('forgotpwd');
            ?>
            <div class="<?php echo $message['class'];?>"><i class="<?php echo $message["icon"];?>"></i><?php echo $message['message']; ?>
                <button class="close" type="button" data-dismiss="bs-callout">×</button></div>
        <?php }	?>
        <?php
        $attributes = array('role' => 'form', 'id' => 'recoverform', 'name' => 'recoverform', 'class' => 'form-vertical');
        echo form_open('index.php/admin/forgotpassword',$attributes);
        ?>
        <div class="form-group has-feedback" id="div_un">
            <input type="text" class="form-control"  maxlength="40" id="tb_emailaddress" name="tb_emailaddress" placeholder="E-mail address" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-6">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Retrieve Password</button>
            </div>
            <!-- /.col -->
        </div>
        <?php echo form_close();?>
        <br/>
        <a href="<?php echo base_url().'index.php/admin/login';?>">Back to Login</a><br>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/login.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
