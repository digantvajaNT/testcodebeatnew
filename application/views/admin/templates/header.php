<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$aAdminUser = $this->session->userdata('loggedin_admin'); ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <title><?php echo $title; ?></title>

    <meta charset="UTF-8"/>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon/favicon.png" type="image/png">

    <!-- Bootstrap 3.3.6 -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    <!-- Theme style -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/select2/select2.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins

         folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">

    <!-- iCheck -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/all.css">

    <!-- Morris chart -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/morris/morris.css">







</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->

        <a href="<?php echo base_url();?>" class="logo" target="_blank">

            <img src="<?php echo base_url().'assets/admin/img/logo.png';?>" height="50" width="150"/>

        </a>

        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top">

            <!-- Sidebar toggle button-->

            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

                <span class="sr-only">Toggle navigation</span>

            </a>



            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">

                    <!-- Messages: style can be found in dropdown.less-->



                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <span class="hidden-xs"><?php echo $aAdminUser['user_fullname'];?></span>

                        </a>

                        <ul class="dropdown-menu">

                            <!-- User image -->

                            <li class="user-header">

                                <p>

                                    <?php echo $aAdminUser['user_fullname'];?>

                                </p>

                            </li>

                            <li class="user-body">

                                <div class="row">

                                    <div class="col-xs-4 text-center">

                                        <a href="<?php echo base_url('admin/profile');?>">Edit Profile</a>

                                    </div>

                                    <div class="col-xs-4 text-center">

                                        <a href="<?php echo base_url('admin/changepassword');?>">Change Password</a>

                                    </div>

                                    <div class="col-xs-4 text-center">

                                        <a href="<?php echo base_url('admin/dashboard/logout');?>">Logout</a>

                                    </div>

                                </div>

                                <!-- /.row -->

                            </li>



                        </ul>

                    </li>

                </ul>

            </div>

        </nav>

    </header>