<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Resetpassword extends CI_Controller {
	/*** Index Page for this controller.*/	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper('url_helper');
		$this->load->library('session');		
		if( $this->session->userdata('loggedin_admin') ) {
			redirect("admin/dashboard");
		}		
	}
	public function index($code)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');		
		$data['title'] = 'Reset Password';	
		$data['code'] = '';			
		//check if code is correct
		if($code != '')
		{
		    $data['title'] = $this->config->item('site_name').' - Reset password';
			$data['code'] = $code;	
			$aAdminData = $this->admin_model->reset_password($code);
			if (count($aAdminData) > 0) //active user record is present
			{
				$iListId  = $aAdminData['admin_id'];				
				if ($this->input->post()) {					
					$post_data = array(
						'admin_password' => md5($this->security->xss_clean($this->input->post('tb_npassword'))),
						'admin_code' => '',
						'admin_updateddate' => date('Y-m-d H:i:s')
					);					
					$this->admin_model->update_user($iListId,$post_data);					
					$this->session->set_flashdata('login', array('message' => 'You have successfully reset your password, please login with your username and new password.','class' => 'alert alert-success'));
					redirect("admin/login");	
				}
				else
				{
					$this->load->view('admin/resetpassword', $data);
				}
			}
			else
			{
				//code is not matching in database then redirect to forgot pwd page
				$this->session->set_flashdata('resetpasswd', array('message' => 'Please try again.','class' => 'alert alert-error'));
				redirect("admin/forgotpassword",$data);
			}
		}
		else
		{
			//If code is not getting then redirect to forgot pwd page
			$this->session->set_flashdata('forgotpassword', array('message' => 'Please try again.','class' => 'alert alert-error'));
			redirect("admin/forgotpassword",$data);
		}
	}
}