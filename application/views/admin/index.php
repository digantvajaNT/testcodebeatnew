<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $category_count;?></h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pricetags"></i>
                    </div>
                    <a href="<?php echo base_url();?>/admin/category/index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $product_count;?></h3>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pricetag"></i>
                    </div>
                    <a href="<?php echo base_url();?>/admin/products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
<!--            <div class="col-lg-3 col-xs-6">
                 small box 
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $user_count;?></h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url();?>/admin/users/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>-->
            <!-- ./col -->
<!--            <div class="col-lg-3 col-xs-6">
                 small box 
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $events_count;?></h3>
                        <p>Events</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-calendar"></i>
                    </div>
                    <a href="<?php echo base_url();?>/admin/events" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>-->
            <!-- ./col -->
        </div>
    </section>
</div>