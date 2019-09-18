<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Pages_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }

    public function index() {

        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - Projects';
        $data['page_data'] = $this->Pages_model->get_projects();
        if ($this->input->post()) {
            if ($_FILES["file_allimage"]["name"] != '') { //single file
                $image_bod_url = '';
                $new_name = $_FILES["file_allimage"]["name"];
                $config['file_name'] = $new_name;
                $config['upload_path'] = "./uploads/projects/";
                $config['allowed_types'] = "gif|jpg|jpeg|pdf|png";
                $config['max_size'] = "5000";
                // $config['max_width']     =   "1920";
                //$config['max_height']    =   "1280";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("file_allimage")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    $image_bod_url = $finfo['file_name'];
                }
            }

            $certificate_name = $this->input->post("certificate_name");
            if (!empty($image_bod_url)) {
                $post_data = array(
                    'project_image' => $image_bod_url,
                    'project_name' => $certificate_name
                );
                $table_name = 'tbl_projects';
                $this->Pages_model->create_user($post_data, $table_name);
                $this->session->set_flashdata('projects', array('message' => 'Project Image Updated Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
            } else {
                $this->session->set_flashdata('projects', array('message' => 'Please enter required field.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect(current_url());
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/content_pages/projects', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function remove_manual($iListId) {
        if ($iListId) {
            //$aManualData = $this->Pages_model->getManualDetail($iListId);           
            //REMOVE MANUAL
            //  if($aManualData["name"] != ''){
            //    unlink($this->"http://localhost/nutclamp/uploads/certificates/'.$aManualData['name'].'");                             
            // }
            $this->Pages_model->delete_projects_image($iListId, 'project_id');
            $this->session->set_flashdata('projects', array('message' => 'Image Deleted Successfully.', 'class' => 'alert-danger'));
            redirect('admin/projects/');
        }
    }

}
