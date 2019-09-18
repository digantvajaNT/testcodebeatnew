<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
    /*     * * Index Page for this controller. */

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Category_model');
        $this->load->model('Products_model');
        $this->load->model('Pages_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }

    public function index() {
        $data['title'] = $this->config->item('site_name') . ' - Services';
        $data['bod_data'] = $this->Pages_model->allbod();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/services/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - BOD';
	
        if ($this->input->post()) {
	


            $names = $this->input->post("name");
            $description = $this->input->post("description");

			$image_service_url = '';
				
				if($_FILES["file_newsimage"]["name"] != '') //single file
                {
                    $new_name =  $_FILES["file_newsimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/home/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                   // $config['max_width']     =   "1920";
                    //$config['max_height']    =   "1280";
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload("file_newsimage"))
                    {
                        echo $this->upload->display_errors();
                    }
                    else {
                        $finfo = $this->upload->data();
                        $image_service_url = $finfo['file_name'];
                    }
                } 
				
				
				$home_image = '';
				
				if($_FILES["ddfile_newsimage"]["name"] != '') //single file
                {
                    $new_name =  $_FILES["ddfile_newsimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/front/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                   // $config['max_width']     =   "1920";
                    //$config['max_height']    =   "1280";
                    $this->load->library('uploads',$config);
                    if(!$this->uploads->do_upload("ddfile_newsimage"))
                    {
                        echo $this->uploads->display_errors();
                    }
                    else {
                        $finfo = $this->uploads->data();
                        $home_image = $finfo['file_name'];
                    }
                } 
				
            if (!empty($names) && !empty($description)) {
                $post_data = array(
                    'image_service_url' => $image_service_url,
                    'name' => $names,
                    'description' => $description,
                    'home_image' => $home_image,
                );
                $table_name = 'nc_board_page';
				
                $this->Pages_model->create_user($post_data, $table_name);
                $this->session->set_flashdata('services', array('message' => 'Service Added Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/services');
            } else {
                $this->session->set_flashdata('services', array('message' => 'Please provide required field.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/services');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/services/add', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($iListId) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - services';
        $data['iListId'] = $iListId;

        $data['category_data'] = $this->Pages_model->get_bod($iListId);

        if ($this->input->post()) {

				
				
				if($_FILES["file_newsimage"]["name"] != '') //single file
                {
					$image_service_url = '';
                    $new_name =  $_FILES["file_newsimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/home/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                   // $config['max_width']     =   "1920";
                    //$config['max_height']    =   "1280";
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload("file_newsimage"))
                    {
                        echo $this->upload->display_errors();
                    }
                    else {
                        $finfo = $this->upload->data();
                        $image_service_url = $finfo['file_name'];
                    }
                }else{
					$image_service_url =$data['category_data'][0]['image_service_url'];
				} 
				
				if($_FILES["ddfile_newsimage"]["name"] != '') //single file
                {
					$home_image = '';
                    $new_name =  $_FILES["ddfile_newsimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/front/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                   // $config['max_width']     =   "1920";
                    //$config['max_height']    =   "1280";
                    $this->load->library('uploads',$config);
                    if(!$this->uploads->do_upload("ddfile_newsimage"))
                    {
                        echo $this->uploads->display_errors();
                    }
                    else {
                        $finfo = $this->uploads->data();
                        $home_image = $finfo['file_name'];
                    }
                }else{
					$home_image =$data['category_data'][0]['home_image'];
				} 
            $name = $this->input->post("name");
            $description = $this->input->post("description");


            if (!empty($name) && !empty($description)) {

                $post_data = array(
                    'name' => $name,
                    'description' => $description,
                    'image_service_url' => $image_service_url,
                    'home_image' => $home_image,
                );

                $this->Pages_model->update_bod($iListId, $post_data);
                $this->session->set_flashdata('services', array('message' => 'Service Updated Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/services');
            } else {
                $this->session->set_flashdata('services', array('message' => 'Please provide required field.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/services');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/services/edit', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function delete($iListId) {
        if ($iListId) {
            $this->Products_model->delete_product('id', $iListId, 'nc_board_page');

            $this->session->set_flashdata('services', array('message' => ' Deleted Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible'));
            redirect('admin/services');
        }
    }

    public function update_status($category_id) {
        if ($category_id !== NULL) {
            $aActiveCategories = $this->Category_model->get_activeCategories();
            $category_data = $this->Category_model->get_category($category_id);
            if (count($category_data) > 0) {
                if ($category_data["category_status"] == 'inactive') {
                    $status = "active";
                    $message = array('message' => "Service Activated Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'category_status' => $status,
                        'category_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Category_model->update_category($category_id, $post_data);
                    $this->session->set_flashdata('category', $message);
                    redirect('admin/category');
                } else {
                    if (count($aActiveCategories) > 1) {
                        $status = "inactive";
                        $message = array('message' => "Service Inactivated Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible');
                        $post_data = array(
                            'category_status' => $status,
                            'category_updateddate' => date('Y-m-d H:i:s')
                        );
                        //update status
                        $this->Category_model->update_category($category_id, $post_data);
                        $this->session->set_flashdata('category', $message);
                        redirect('admin/category');
                    } else {
                        $status = "inactive";
                        $message = array('message' => "You can't Inactive category. At least one category should be active.", 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible');
                        $this->session->set_flashdata('category', $message);
                        redirect('admin/category');
                    }
                }
            }
        }
    }

    public function change_order() {
        $data['title'] = $this->config->item('site_name') . ' - Category Management';
        $data['category_data'] = $this->Category_model->get_category();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/category/change_order', $data);
        $this->load->view('admin/templates/footer_draggble');
    }

    public function update_order() {
        if ($this->input->post()) {
            $categoryID = $this->security->xss_clean($this->input->post('ids'));
            if ($categoryID != '') {
                $idArray = explode(",", $categoryID);
                $count = 1;
                foreach ($idArray as $id) {
                    $post_data = array(
                        'category_orderno' => $count,
                        'category_updateddate' => date('Y-m-d H:i:s')
                    );
                    $this->Category_model->update_category($id, $post_data);
                    $count ++;
                }
            }
        }
    }

}
