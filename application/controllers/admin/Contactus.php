<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contactus extends CI_Controller
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
        $data['title'] = $this->config->item('site_name').' - Contact Us';
		$table_name='tbl_contact_admin';
        $data['page_data'] = $this->Pages_model->get_pages('1', $table_name);
        if ($this->input->post())
        {
        	$name_one = $this->input->post("name_one");
            $address_one = $this->input->post("address_one");
            $phone_one = $this->input->post("phone_one");
            $email_one = $this->input->post("email_one");
            $name_second = $this->input->post("name_second");
            $address_second = $this->input->post("address_second");
            $phone_second = $this->input->post("phone_second");
            $mail_second = $this->input->post("mail_second");
			
        	if(!empty($name_one) && !empty($name_one)) {
        		$post_data = array(
	                'name_one' => $name_one,
	                'address_one' => $address_one,
	                'phone_one' => $phone_one,
	                'email_one' => $email_one,
	                'name_second' => $name_second,
	                'address_second' => $address_second,
	                'phone_second' => $phone_second,
	                'mail_second' => $mail_second
	            );
				
	            $this->Pages_model->update_pages('1', $post_data,$table_name);
	            $this->session->set_flashdata('contactus', array('message' => 'Page Updated Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
	            redirect(current_url());
        	} else {
        		$this->session->set_flashdata('contactus', array('message' => 'Please enter required field.','icon' => 'icon fa fa-ban','class' => 'alert alert-danger alert-dismissible'));
	            redirect(current_url());
        	}
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/content_pages/contactus', $data);
        $this->load->view('admin/templates/footer', $data);
    }
}