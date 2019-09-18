<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Changepassword extends CI_Controller
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
        $data['title'] = $this->config->item('site_name'). ' - Change Password';

        $aAdminUser = $this->session->userdata('loggedin_admin');
        $data['admin_data'] = $this->admin_model->get_admindetails($aAdminUser["user_id"]);
        if ($this->input->post())
        {
            $sNewPass =  $this->security->xss_clean($this->input->post("tb_newpassword"));
            $iVerifyOldpass = $this->admin_model->check_OldPassword($aAdminUser["user_id"],md5($sNewPass));
            if($iVerifyOldpass == 0)
            {
                $post_data = array(
                    'admin_password' => md5($sNewPass),
                    'admin_updateddate' => date('Y-m-d H:i:s')
                );
                //update password
                $this->admin_model->update_user($aAdminUser["user_id"],$post_data);
                // Display success message
                $this->session->set_flashdata('update', array('message' => 'Password changed successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
            }
            else
            {
                $this->session->set_flashdata('update', array('message' => 'Old password and New password should not be same.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect(current_url());
            }
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/changepassword', $data);
        $this->load->view('admin/templates/footer', $data);
    }
}