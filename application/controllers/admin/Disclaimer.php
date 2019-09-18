<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Disclaimer extends CI_Controller
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
        $data['title'] = $this->config->item('site_name').' - About Us';
		$table_name='nc_about_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id',$table_name);
		//echo  $data['page_data']['home_img_url'];
		//print_R( $data['page_data']);
		//exit;
        if ($this->input->post())
        {
				

        	$disclaimer = $this->input->post("disclaimer");
        	
        	if(!empty($disclaimer)) {        		
	            $post_data = array(
	               // 'page_title' => $sTitle,
	                
	                'disclaimer' =>$disclaimer
	            );
                    $table_name='nc_about_page';
                   
	            $this->Pages_model->update_pages('aboutus',$post_data,$table_name);
	            $this->session->set_flashdata('page', array('message' => 'Page Updated Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
	            redirect(current_url());
        	} else {
        		$this->session->set_flashdata('page', array('message' => 'Please enter required field.','icon' => 'icon fa fa-ban','class' => 'alert alert-danger alert-dismissible'));
	            redirect(current_url());
        	}
            
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/content_pages/disclaimer', $data);
        $this->load->view('admin/templates/footer', $data);
    }
}