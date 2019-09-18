<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Privacypolicy extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Pages_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Privacy Policy';
        $data['page_data'] = $this->Pages_model->get_page('page_slug','privacy-policy');
        if ($this->input->post())
        {
			exit;
            $sTitle = $this->input->post("tb_pagetitle");
            $sContent = $this->input->post("tb_description");
			if(!empty($sTitle) && !empty($sContent)) {
				$post_data = array(
	                'page_title' => $sTitle,
	                'page_description' => $sContent,
	                'page_updateddate' => date('Y-m-d H:i:s')
	            );
	            $this->Pages_model->update_page('page_slug','privacy-policy',$post_data);
	            $this->session->set_flashdata('page', array('message' => 'Page Updated Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
	            redirect(current_url());
			} else {
				$this->session->set_flashdata('page', array('message' => 'Please enter required field.','icon' => 'icon fa fa-ban','class' => 'alert alert-danger alert-dismissible'));
	            redirect(current_url());
			}
            
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/content_pages/privacy_policy', $data);
        $this->load->view('admin/templates/footer', $data);
    }
}