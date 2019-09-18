<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('admin_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        $data['title'] = $this->config->item('site_name').' - Edit Profile';
        $aAdminUser = $this->session->userdata('loggedin_admin');
        $data['admin_data'] = $this->admin_model->get_admindetails($aAdminUser["user_id"]);

        if ($this->input->post())
        {
            $sFirstname = $this->security->xss_clean($this->input->post("tb_firstname"));
            $sLastname = $this->security->xss_clean($this->input->post("tb_lastname"));
            $sEmail = $this->security->xss_clean($this->input->post("tb_emailaddress"));
            $post_data = array(
                'admin_firstname' => $sFirstname,
                'admin_lastname' => $sLastname,
                'admin_email' => $sEmail,
                'admin_updateddate' => date('Y-m-d H:i:s')
            );
            if($this->admin_model->update_user($aAdminUser["user_id"],$post_data))
            {
                $sessiondata = array(
                    'user_id' 			=> $aAdminUser["user_id"],
                    'user_fullname' 	=> $sFirstname.' '.$sLastname,
                    'user_name' 		=> $aAdminUser["user_name"],
                    'user_email'		=> $sEmail
                );
                $this->session->unset_userdata('loggedin_admin');
                $this->session->set_userdata('loggedin_admin',$sessiondata);
                // Display success message
                $this->session->set_flashdata('update', array('message' => 'Profile Updated Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/templates/footer', $data);
    }
}