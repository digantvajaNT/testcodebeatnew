<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>

            <li class="<?php if ($this->uri->segment(2) == "dashboard") { echo 'active';}?>"><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="<?php if ($this->uri->segment(2) == "aboutus") { echo 'active';}?>"><a href="<?php echo base_url('admin/aboutus');?>"><i class="fa fa-info-circle"></i> <span>About Us</span></a></li>
            
            <li class="treeview <?php if ($this->uri->segment(2) == "category") { echo 'active';}?>">

                <a href="#">

                    <i class="fa fa-server"></i> <span>Category</span>

                    <span class="pull-right-container">

              <i class="fa fa-angle-right pull-right"></i>

            </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url('admin/category/add');?>"><i class="fa fa-circle-o"></i> Add New</a></li>

                    <li><a href="<?php echo base_url('admin/category/index');?>"><i class="fa fa-circle-o"></i> List Categories</a></li>

                </ul>

            </li> 
            
            <li class="treeview <?php if ($this->uri->segment(2) == "products") { echo 'active';}?>" >

                <a href="#">

                    <i class="fa fa-cube"></i> <span>Product</span>

                    <span class="pull-right-container">

              <i class="fa fa-angle-right pull-right"></i>

            </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url('admin/products/add');?>"><i class="fa fa-circle-o"></i> Add New</a></li>

                    <li><a href="<?php echo base_url('admin/products/index');?>"><i class="fa fa-circle-o"></i> List Product</a></li>

                </ul>

            </li>
            
            
			
				<li class="<?php if ($this->uri->segment(2) == "achievement") { echo 'active';}?>"><a href="<?php echo base_url('admin/achievement');?>"><i class="fa fa-child"></i> <span>Achievement</span></a></li>

<!--            <li class="<?php if ($this->uri->segment(2) == "terms") { echo 'active';}?>"><a href="<?php echo base_url('admin/terms');?>"><i class="fa fa-cogs"></i> <span>Terms</span></a></li>-->

            <li class="<?php if ($this->uri->segment(2) == "demodetails") { echo 'active';}?>"><a href="<?php echo base_url('admin/demodetails');?>"><i class="fa fa-archive"></i> <span>Get A Demo</span></a></li>
			
            

<!--            <li class="<?php if ($this->uri->segment(2) == "privacypolicy") { echo 'active';}?>"><a href="<?php echo base_url('admin/privacypolicy');?>"><i class="fa fa-user-secret"></i> <span>Privacy Policy</span></a></li>-->

  <li class="<?php if ($this->uri->segment(2) == "banner") { echo 'active';}?>"><a href="<?php echo base_url('admin/banner');?>"><i class="fa fa-building-o"></i> <span>Showroom</span></a></li>

  <li class="<?php if ($this->uri->segment(2) == "office") { echo 'active';}?>"><a href="<?php echo base_url('admin/office');?>"><i class="fa fa-building"></i> <span>Office</span></a></li>

  <li class="<?php if ($this->uri->segment(2) == "projects") { echo 'active';}?>"><a href="<?php echo base_url('admin/projects');?>"><i class="fa fa-file-image-o"></i> <span>Projects</span></a></li>

            <li class="<?php if ($this->uri->segment(2) == "clients") { echo 'active';}?>"><a href="<?php echo base_url('admin/clients');?>"><i class="fa fa-users"></i> <span>Clients</span></a></li>

            
            <li class="treeview <?php if ($this->uri->segment(2) == "sliders") { echo 'active';}?>">

                <a href="#">

                    <i class="fa fa-file-image-o"></i> <span>Slider</span>

                    <span class="pull-right-container">

              <i class="fa fa-angle-right pull-right"></i>

            </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url('admin/sliders/add');?>"><i class="fa fa-circle-o"></i> Add New</a></li>

                    <li><a href="<?php echo base_url('admin/sliders/index');?>"><i class="fa fa-circle-o"></i> List Sliders</a></li>

                </ul>

            </li>
            <li class="treeview <?php if ($this->uri->segment(2) == "career") { echo 'active';}?>">
                <a href="#">
                    <i class="fa fa-tag"></i> <span>Career</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('admin/career/add');?>"><i class="fa fa-circle-o"></i> Add New Career</a></li>
                    <li><a href="<?php echo base_url('admin/career/index');?>"><i class="fa fa-circle-o"></i> List Career</a></li>
                </ul>
            </li>
            
            <li class="treeview <?php if ($this->uri->segment(2) == "faq") { echo 'active';}?>">
                <a href="#">
                    <i class="fa fa-question-circle"></i> <span>FAQ</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('admin/faq/add');?>"><i class="fa fa-circle-o"></i> Add New faq</a></li>
                    <li><a href="<?php echo base_url('admin/faq/index');?>"><i class="fa fa-circle-o"></i> List faq</a></li>
                </ul>
            </li>
             <!--<li class="treeview <?php if ($this->uri->segment(2) == "blog") { echo 'active';}?>" >
                <a href="#">
                    <i class="fa fa-product-hunt"></i> <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('admin/blog/add');?>"><i class="fa fa-circle-o"></i> Add New</a></li>
                    <li><a href="<?php echo base_url('admin/blog/index');?>"><i class="fa fa-circle-o"></i> List blog</a></li>
                </ul>
            </li>-->

			 <li class="treeview <?php if ($this->uri->segment(2) == "committee") { echo 'active';}?>">

                <a href="#">

                    <i class="fa fa-user"></i> <span>Testimonial</span>

                    <span class="pull-right-container">

              <i class="fa fa-angle-right pull-right"></i>

            </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url('admin/committee/add');?>"><i class="fa fa-circle-o"></i> Add New Testimonial</a></li>

                    <li><a href="<?php echo base_url('admin/committee/index');?>"><i class="fa fa-circle-o"></i> List Testimonial</a></li>

                </ul>

            </li>

			 <!--<li class="treeview <?php if ($this->uri->segment(2) == "category") { echo 'active';}?>">

                <a href="#">

                    <i class="fa fa-cogs"></i> <span>Services</span>

                    <span class="pull-right-container">

              <i class="fa fa-angle-right pull-right"></i>

            </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url('admin/services/add');?>"><i class="fa fa-circle-o"></i> Add New services</a></li>

                    <li><a href="<?php echo base_url('admin/services/index');?>"><i class="fa fa-circle-o"></i> List services</a></li>

                </ul>

            </li>-->

			
			  <li class="treeview <?php if ($this->uri->segment(2) == "Store Locator") { echo 'active';}?>">

                <a href="#">

                    <i class="fa fa-map-marker"></i> <span>Store Locator</span>

                    <span class="pull-right-container">

              <i class="fa fa-angle-right pull-right"></i>

            </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url('admin/Store_Locator/addarea');?>"><i class="fa fa-circle-o"></i> Add New Area</a></li>

                    <li><a href="<?php echo base_url('admin/Store_Locator/index');?>"><i class="fa fa-circle-o"></i> List Area Details</a></li>
                    <li><a href="<?php echo base_url('admin/Store_Locator/addLoocator');?>"><i class="fa fa-circle-o"></i>Add Store Locator Details</a></li>
					<li><a href="<?php echo base_url('admin/Store_Locator/List1');?>"><i class="fa fa-circle-o"></i> List Store Locator Details</a></li>

                </ul>

            </li>

            

<!--            <li class="treeview <?php if ($this->uri->segment(2) == "news") { echo 'active';}?>" >

                <a href="#">

                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>

                    <span>News</span>

                    <span class="pull-right-container">

              <i class="fa fa-angle-right pull-right"></i>

            </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url('admin/news/add');?>"><i class="fa fa-circle-o"></i> Add New</a></li>

                    <li><a href="<?php echo base_url('admin/news/index');?>"><i class="fa fa-circle-o"></i> List News</a></li>

                </ul>

            </li>-->

<!--            <li class="treeview <?php if ($this->uri->segment(2) == "events") { echo 'active';}?>" >

                <a href="#">

                    <i class="fa fa-calendar"></i> <span>Events</span>

                    <span class="pull-right-container">

              <i class="fa fa-angle-right pull-right"></i>

            </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="<?php echo base_url('admin/events/add');?>"><i class="fa fa-circle-o"></i> Add New</a></li>

                    <li><a href="<?php echo base_url('admin/events/index');?>"><i class="fa fa-circle-o"></i> List Events</a></li>

                </ul>

            </li>-->

           <li class="<?php if ($this->uri->segment(2) == "configuration") { echo 'active';}?>"><a href="<?php echo base_url('admin/configuration');?>"><i class="fa fa-gear"></i> <span>Configuration</span></a></li>

            <!--<li class="<?php if ($this->uri->segment(2) == "users") { echo 'active';}?>"><a href="<?php echo base_url('admin/users');?>"><i class="fa fa-users"></i> <span>Customers</span></a></li>-->
            
            <li class="<?php if ($this->uri->segment(2) == "disclaimer") { echo 'active';}?>"><a href="<?php echo base_url('admin/disclaimer');?>"><i class="fa fa-openid"></i> <span>Disclaimer</span></a></li>
			<li class="<?php if ($this->uri->segment(2) == "privacy") { echo 'active';}?>"><a href="<?php echo base_url('admin/privacy');?>"><i class="fa fa-lock"></i> <span>Privacy Policy</span></a></li>
            
            <li class="<?php if ($this->uri->segment(2) == "contactus") { echo 'active';}?>"><a href="<?php echo base_url('admin/contactus');?>"><i class="fa fa-phone"></i> <span>Contact Us</span></a></li>
            <li class="<?php if ($this->uri->segment(2) == "contactdetails") { echo 'active';}?>"><a href="<?php echo base_url('admin/contactdetails');?>"><i class="fa fa-phone-square"></i> <span>Contact Us Details</span></a></li>

        </ul>

    </section>

    <!-- /.sidebar -->

</aside>

