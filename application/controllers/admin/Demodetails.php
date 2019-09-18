<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Demodetails extends CI_Controller {

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
        $data['title'] = $this->config->item('site_name') . ' - Contact details';
        $data['page_data'] = $this->Pages_model->get_demo_us();
		
        if ($this->input->post()) {

           

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
        $this->load->view('admin/content_pages/demodetails', $data);
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
