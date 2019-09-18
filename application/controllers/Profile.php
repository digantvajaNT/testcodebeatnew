<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
		$this->output->delete_cache();        
		$this->load->model('Configuration_model');
		$this->load->model('Users_model');
		$this->load->model('Contry_state_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		$this->load->helper('form');
		$this->load->library('session');
        $this->load->library('form_validation');
		if( !$this->session->userdata('loggedin_user') ) {
            redirect(base_url().'user');
        }
    }
	public function index()
	{
		if(!$this->session->userdata('loggedin_user') ) {
			 redirect(site_url());
		}
		$data['title'] = $this->config->item('site_name').' - Edit Profile';
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');       
        $data['current_page'] = 'Edit Profile';
		//FETCH PROFILE OF USER
		$auser = $this->session->userdata('loggedin_user');
		$data['user_profile'] = $this->Users_model->get_user($auser["user_id"]);
		$data['country_data'] = $this->Contry_state_model->get_country();
		if($data['user_profile']['user_country'] != '')
		{
			$aCountryInfo = $this->Contry_state_model->get_ctrCode($data['user_profile']['user_country']);
			#var_dump($aCountryInfo);die;
			$data['state_data'] = $this->Contry_state_model->get_states($aCountryInfo['ctr_code']);
		}
		else
		{
			$data['state_data'] = $this->Contry_state_model->get_states('US');
		}
		
		if($this->input->post())
		{
			if($this->input->post("tb_password") != '')
			{
				$arrInput = array(
					"user_firstname"	=>	 $this->security->xss_clean($this->input->post("tb_firstname")),
					"user_lastname"		=>	 $this->security->xss_clean($this->input->post("tb_lastname")),	
					"user_password"		=>	 md5($this->security->xss_clean($this->input->post("tb_password"))),			
					"user_state"	=>	 $this->security->xss_clean($this->input->post("dd_province")),
					"user_country"	=>	 $this->security->xss_clean($this->input->post("dd_country")),
					"user_zipcode"	=>	 $this->security->xss_clean($this->input->post("dd_zipcode")),
					"user_department"	=>	 $this->security->xss_clean($this->input->post("tb_department")),
					"user_city"	=>	 $this->security->xss_clean($this->input->post("tb_city")),
					"user_address"	=>	 $this->security->xss_clean($this->input->post("tb_address")),
					"user_contactno"	=>	 $this->security->xss_clean($this->input->post("tb_contactno")),
					"user_account_no"	=>	 $this->security->xss_clean($this->input->post("tb_accno")),
					"user_facility_name"	=>	 $this->security->xss_clean($this->input->post("tb_facilityname")),				
					"user_updated_date"	=>	 date('Y-m-d H:i:s')							
				);
			} else {
				$arrInput = array(
				"user_firstname"	=>	 $this->security->xss_clean($this->input->post("tb_firstname")),
				"user_lastname"		=>	 $this->security->xss_clean($this->input->post("tb_lastname")),				
				"user_state"	=>	 $this->security->xss_clean($this->input->post("dd_province")),
				"user_country"	=>	 $this->security->xss_clean($this->input->post("dd_country")),
				"user_zipcode"	=>	 $this->security->xss_clean($this->input->post("dd_zipcode")),
				"user_department"	=>	 $this->security->xss_clean($this->input->post("tb_department")),
				"user_city"	=>	 $this->security->xss_clean($this->input->post("tb_city")),
				"user_address"	=>	 $this->security->xss_clean($this->input->post("tb_address")),
				"user_contactno"	=>	 $this->security->xss_clean($this->input->post("tb_contactno")),
				"user_account_no"	=>	 $this->security->xss_clean($this->input->post("tb_accno")),
				"user_facility_name"	=>	 $this->security->xss_clean($this->input->post("tb_facilityname")),				
				"user_updated_date"	=>	 date('Y-m-d H:i:s')							
			);
			}
			
			$this->Users_model->update_user($auser["user_id"],$arrInput);
			$this->session->set_flashdata('profile', array('message' => 'Profile information updated.','icon' => 'fa fa-check','class' => 'Message Message--green'));
			redirect('profile');
		}
		$this->load->view('templates/header', $data);
        $this->load->view('edit_profile', $data);
        $this->load->view('templates/footer', $data);
	}
} 
?>