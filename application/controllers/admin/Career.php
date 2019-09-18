<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller {
    /*     * * Index Page for this controller. */

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Case_model');
        $this->load->model('Category_model');
        $this->load->model('Products_model');
        $this->load->model('Pages_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }

    public function index() {
        $data['title'] = $this->config->item('site_name') . ' - Career';

        $data['allcareer'] = $this->Case_model->allcareeradmin();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/career/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - Career';
        if ($this->input->post()) {

            $tech_name = $this->input->post("tech_name");
            $experience = $this->input->post("experience");
            $location = $this->input->post("location");
            $job_description = $this->input->post("job_description");
            $job_benefits = $this->input->post("job_benefits");
            $job_requirement = $this->input->post("job_requirement");




            if ($_FILES["fileb_newsimages"]["name"] != '') {
                //single file
                $banner_img = '';
                $new_name = $_FILES["fileb_newsimages"]["name"];
                $config['file_name'] = $new_name;
                $config['upload_path'] = "./assets/images/banner/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "5000";
                // $config['max_width']     =   "1920";
                //$config['max_height']    =   "1280";
                $this->load->library('uploadd', $config);
                if (!$this->uploadd->do_upload("fileb_newsimages")) {
                    echo $this->uploadd->display_errors();
                } else {
                    $finfo = $this->uploadd->data();
                    $banner_img = $finfo['file_name'];
                }
            }



            if (!empty($tech_name) && !empty($experience) && !empty($location) && !empty($job_description)) {

                $post_data = array(
                    'tech_name' => $tech_name,
                    'experience' => $experience,
                    'location' => $location,
                    'job_description' => $job_description,
                    'job_benefits' => $job_benefits,
                    'job_requirement' => $job_requirement,
                    'img_url' => $banner_img,
                    'status' => '1'
                );

                $table_name = 'careers';
                $this->Pages_model->create_user($post_data, $table_name);
                $this->session->set_flashdata('career', array('message' => 'Career Added Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/career');
            } else {
                $this->session->set_flashdata('career', array('message' => 'Please provide required field.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/career');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/career/add', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($iListId) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - Career';
        $data['iListId'] = $iListId;

        $data['case_study'] = $this->Case_model->allcareeradminbyid($iListId);

        if ($this->input->post()) {


            $tech_name = $this->input->post("tech_name");
            $experience = $this->input->post("experience");
            $location = $this->input->post("location");
            $job_description = $this->input->post("job_description");
            $job_benefits = $this->input->post("job_benefits");
            $job_requirement = $this->input->post("job_requirement");



            if ($_FILES["fileb_newsimages"]["name"] != '') {
                //single file

                $banner_img = '';
                $new_name = $_FILES["fileb_newsimages"]["name"];
                $config['file_name'] = $new_name;
                $config['upload_path'] = "./assets/images/banner/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "5000";
                //$config['max_width']=   "1920";
                //$config['max_height']    =   "1280";
                $this->load->library('uploadd', $config);
                if (!$this->uploadd->do_upload("fileb_newsimages")) {
                    echo $this->uploadd->display_errors();
                } else {
                    $finfo = $this->uploadd->data();
                    $banner_img = $finfo['file_name'];
                }
            } else {

                $banner_img = $data['case_study'][0]['img_url'];
            }

            if (isset($website_url)) {
                $website_url = $this->input->post("website_url");
            }
            if (isset($android_url)) {
                $android_url = $this->input->post("android_url");
            }
            if (isset($ios_url)) {
                $ios_url = $this->input->post("ios_url");
            }

            if (!empty($tech_name) && !empty($experience) && !empty($location) && !empty($job_description)) {
                $post_data = array(
                    'tech_name' => $tech_name,
                    'experience' => $experience,
                    'location' => $location,
                    'job_description' => $job_description,
                    'job_benefits' => $job_benefits,
                    'job_requirement' => $job_requirement,
                    'img_url' => $banner_img
                );

                $this->Case_model->update_career($iListId, $post_data);
                $this->session->set_flashdata('career', array('message' => 'career Updated Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/career');
            } else {
                $this->session->set_flashdata('career', array('message' => 'Please provide required field.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/career');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/career/edit', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function delete($iListId) {
        if ($iListId) {
            $this->Products_model->delete_product('c_id', $iListId, 'careers');

            $this->session->set_flashdata('career', array('message' => ' Deleted Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible'));
            redirect('admin/career');
        }
    }

    public function update_status($iListId) {
        if ($iListId !== NULL) {

            $product_data = $this->Case_model->allcareeradminbyid($iListId);
            //print_R(  $product_data);
            if (count($product_data) > 0) {
                if ($product_data[0]["status"] == '0') {

                    $status = "1";
                    $message = array('message' => "Career Activated Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'status' => $status,
                            //   'product_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Case_model->update_careerbyid($iListId, $post_data, 'careers');
                    $this->session->set_flashdata('career', $message);
                    redirect('admin/career');
                } else {
                    $status = "0";
                    $message = array('message' => "Career Inactive Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'status' => $status,
                            //'product_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Case_model->update_careerbyid($iListId, $post_data, 'careers');
                    $this->session->set_flashdata('casestudy', $message);
                    redirect('admin/career');
                }
            }
        }
    }

    public function change_order() {
        $data['title'] = $this->config->item('site_name') . ' - Case Study';
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
