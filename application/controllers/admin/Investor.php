<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Investor extends CI_Controller {

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
        $data['title'] = $this->config->item('site_name') . ' - Investor';
        $data['page_data'] = $this->Pages_model->get_investor();
        if ($this->input->post()) {

            if ($_FILES["file_allimage"]["name"] != '') { //single file

                $image_url = '';
                $new_name = $_FILES["file_allimage"]["name"];
                $config['file_name'] = $new_name;
                $config['upload_path'] = "./uploads/investor/";
                $config['allowed_types'] = "gif|jpg|jpeg|pdf|png";
                $config['max_size'] = "500000";
                // $config['max_width']     =   "1920";
                //$config['max_height']    =   "1280";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("file_allimage")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    $image_url = $finfo['file_name'];
                }
            }

            $name = $this->input->post("name");
            // $sContent = $this->input->post("tb_description");
            if (!empty($name)) {
                $post_data = array(
                    'name' => $name,
                    'image_url' => $image_url
                );
                $table_name = 'nc_investor';
                $this->Pages_model->create_user($post_data, $table_name);
                $this->session->set_flashdata('page', array('message' => 'Page Updated Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
            } else {
                $this->session->set_flashdata('page', array('message' => 'Please enter required field.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect(current_url());
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/content_pages/investor', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function remove_manual($iListId) {
        if ($iListId) {
            //$aManualData = $this->Pages_model->getManualDetail($iListId);           
            //REMOVE MANUAL
            //  if($aManualData["name"] != ''){
            //    unlink($this->"http://localhost/nutclamp/uploads/certificates/'.$aManualData['name'].'");                             
            // }
            $this->Pages_model->delete_investor_manual_items($iListId, 'id');
            $this->session->set_flashdata('investor', array('message' => 'Manual Deleted Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert-danger'));
            redirect('admin/investor/' . $aManualData["id"]);
        }
    }

}
