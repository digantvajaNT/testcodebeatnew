<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Committee extends CI_Controller {
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
        $data['title'] = $this->config->item('site_name') . ' - Committee';
        $data['allcommittee'] = $this->Pages_model->allcommittee();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/committee/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - Committee';
        if ($this->input->post()) {

            $committee_name = $this->input->post("committee_name");
            $desgination = $this->input->post("desgination");
            $description = $this->input->post("description");

			$team_image = '';
				
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
                        $team_image = $finfo['file_name'];
                    }
                } 
				
				

            if ( !empty($committee_name) && !empty($desgination) && !empty($description)) {

                $post_data = array(
                    'team_image' => $team_image,
                    'committee_name' => $committee_name,
                    'desgination' => $desgination,
                    'description' => $description
                );
                $table_name = 'nc_committee_page';
                $this->Pages_model->create_user($post_data, $table_name);
                $this->session->set_flashdata('committee', array('message' => 'Team Member Added Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/committee');
            } else {
                $this->session->set_flashdata('committee', array('message' => 'Please provide required field.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/committee');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/committee/add', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($iListId) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - Committee';
        $data['iListId'] = $iListId;

        $data['category_data'] = $this->Pages_model->get_committee($iListId);

        if ($this->input->post()) {


            $committee_name = $this->input->post("committee_name");
            $desgination = $this->input->post("desgination");
            $description = $this->input->post("description");

            if($_FILES["file_newsimage"]["name"] != '') //single file
                    {
                        $new_name =  $_FILES["file_newsimage"]["name"];
                        $config['file_name'] = $new_name;
                        $config['upload_path']   =   "./uploads/home/";
                        $config['allowed_types'] =   "gif|jpg|jpeg|png";
                        $config['max_size']      =   "5000";
                        $config['max_width']     =   "1920";
                        $config['max_height']    =   "1280";
                        $this->load->library('uploads',$config);
                        if(!$this->uploads->do_upload("file_newsimage"))
                        {
                            echo $this->uploads->display_errors();
                        }
                        else {
                            $finfo = $this->uploads->data();
                            $team_image = $finfo['file_name'];
                        }
                    }

            if (!empty($committee_name) && !empty($desgination) && !empty($description)) {
                //exit;
                $post_data = array(
                    'team_image' => $team_image,
                    'committee_name' => $committee_name,
                    'desgination' => $desgination,
                    'description' => $description
                );

                $this->Pages_model->update_committee($iListId, $post_data);
                $this->session->set_flashdata('committee', array('message' => 'Committee Updated Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/committee');
            } else {
                $this->session->set_flashdata('committee', array('message' => 'Please provide required field.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/committee');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/committee/edit', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function delete($iListId) {
        if ($iListId) {
            $this->Products_model->delete_product('id', $iListId, 'nc_committee_page');

            $this->session->set_flashdata('committee', array('message' => ' Deleted Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible'));
            redirect('admin/committee');
        }
    }

    public function update_status($category_id) {
        if ($category_id !== NULL) {
            $aActiveCategories = $this->Category_model->get_activeCategories();
            $category_data = $this->Category_model->get_category($category_id);
            if (count($category_data) > 0) {
                if ($category_data["category_status"] == 'inactive') {
                    $status = "active";
                    $message = array('message' => "Category Activated Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
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
                        $message = array('message' => "Category Inactivated Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible');
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
