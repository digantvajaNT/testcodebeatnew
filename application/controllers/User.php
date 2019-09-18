<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
		$this->output->delete_cache();        
		$this->load->model('Configuration_model');
		$this->load->model('Users_model');
		$this->load->model('Cart_model');
		$this->load->model('Contry_state_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		$this->load->helper('form');
		$this->load->library('session');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = $this->config->item('site_name').' - Registration';
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');       
        $data['current_page'] = 'Registration';
		$data['country_data'] = $this->Contry_state_model->get_country();
		$data['state_data'] = $this->Contry_state_model->get_states('US');	
		if($this->input->get('ref') != '') {
			$data['ref'] = '?ref='.$this->input->get('ref');
			$data['refval'] = $this->input->get('ref');
		} else {
			$data['ref'] = '';
			$data['refval'] = '';
		}
		
		if($this->input->post())
		{			
			if($this->input->post('hdn_mode') == "register") {				
				$this->form_validation->set_rules('tb_firstname', '', 'required');
				$this->form_validation->set_rules('tb_lastname', '', 'required');
				$this->form_validation->set_rules('tb_emailaddress', '', 'required|valid_email');
				$this->form_validation->set_rules('tb_password', '', 'required');
				if ($this->form_validation->run() == FALSE)
			    {			    	
			       	$this->session->set_flashdata('user', array('message' => 'Please enter valid Email address & password.','icon' => 'icon fa fa-ban','class' => 'alert alert-error'));
	            	redirect(current_url());
			    }
			    else
			    {			    	
			    	$isDuplicate = $this->Users_model->chk_duplicate($this->input->post("tb_emailaddress"));
					if($isDuplicate == 0)
					{
						$arrInput = array(
							"user_firstname"	=>	 $this->security->xss_clean($this->input->post("tb_firstname")),
							"user_lastname"		=>	 $this->security->xss_clean($this->input->post("tb_lastname")),
							"user_emailaddress"	=>	 $this->security->xss_clean($this->input->post("tb_emailaddress")),
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
							"user_verifycode"	=>	 '',
							'user_status'	=>	 'pending',
							"user_created_date"	=>	 date('Y-m-d H:i:s'),
							"user_updated_date"	=>	 date('Y-m-d H:i:s')							
						);
						$iLastInsertId = $this->Users_model->create_user($arrInput); #Last User Id
						if($this->input->get('ref') == "1") {
							$this->session->set_userdata('temp_user_id', $iLastInsertId);
						}
						$aUserInfo = $this->Users_model->get_user($iLastInsertId);
						$sAddress = '';
						if($aUserInfo["user_address"] != '') {$sAddress .= $aUserInfo["user_address"].', '; }
						if($aUserInfo["user_city"] != '') {$sAddress .= $aUserInfo["user_city"].', '; }
						if($aUserInfo["user_state"] != '') {$sAddress .= $aUserInfo["user_state"].', '; }
						if($aUserInfo["user_country"] != '') {$sAddress .= $aUserInfo["user_country"]; }
						if($aUserInfo["user_zipcode"] != '') {$sAddress .= ' - '.$aUserInfo["user_zipcode"]; }
						$data['user_info'] = $aUserInfo;
						$data['user_address'] = $sAddress;
						//SEND USER REGISTRATION EMAIL 
						$sContent = $this->load->view('email_template/new_user',$data,true);
                		$sSubject = $this->config->item('site_name').' - New user has been regsitered.';
                		$aEmails = explode(",", $data['config_data']['quote_emails']);
                		if(count($aEmails) > 0)
						{
							for($count=0;$count<count($aEmails);$count++) {
								$config = Array(
			                        'protocol' => 'mail',
			                        'mailtype'  => 'html',
			                        'charset'   => 'iso-8859-1'
			                    );
			                    $this->load->library('email', $config);
			                    $this->email->clear();
								$this->email->from('sales@radiationshieldinginc.com', 'Radiation Shielding Inc.');
								$this->email->to($aEmails[$count]);
			                    $this->email->subject($sSubject);
			                    $this->email->message($sContent);
			                    $status = $this->email->send(FALSE);
			                    $this->email->print_debugger(array('headers'));
			                    $this->email->clear();
							}
						}
						//SEND THANK YOU EMAIL.
						$sThankyouContent = $this->load->view('email_template/registration_thankyou',$data,true);
                		$sThankyouSubject = $this->config->item('site_name').' - Registration Successful.';
						$config = Array(
	                        'protocol' => 'mail',
	                        'mailtype'  => 'html',
	                        'charset'   => 'iso-8859-1'
	                    );
						$this->load->library('email', $config);
	                    $this->email->clear();
						$this->email->from('test@nichetechsolutions.com', 'Radiation Shielding Inc.');
						$this->email->to($this->input->post("tb_emailaddress"));
	                    $this->email->subject($sThankyouSubject);
	                    $this->email->message($sThankyouContent);
	                    $status = $this->email->send(FALSE);
	                    $this->email->print_debugger(array('headers'));
	                    $this->email->clear();
						//ENDS 
						#echo $sContent; die;
						if($this->input->get('ref') == "1") {
							redirect('quote_summary?ref=1');
						} else {
							$this->session->set_userdata('new_userdata','');	
							$this->session->set_flashdata('register', array('message' => 'contactus','icon' => '','class' => ''));
							redirect('thankyou');
						}
						
						
					} else {
						$this->session->set_userdata('new_userdata',$_POST);	
						$this->session->set_flashdata('register', array('message' => 'Sorry, the email you have entered is already in use.','icon' => 'fa fa-times','class' => 'Message Message--red'));
						redirect(current_url());
					}
			    }
			}
			else if($this->input->post('hdn_loginmode') == "login") {
				$this->session->set_userdata('new_userdata','');	
				$this->form_validation->set_rules('tb_loginemailaddress', 'Please enter valid Email address.', 'required|valid_email');
				$this->form_validation->set_rules('tb_loginpassword', 'Please enter Password.', 'required');
				if ($this->form_validation->run() == FALSE)
			    {
			       	$this->session->set_flashdata('login', array('message' => 'Please enter valid Email address & password.','icon' => 'fa fa-times','class' => 'Message Message--red'));
	            	redirect(current_url());
			    }
			    else
			    {
			    	$sUserEmail = $this->security->xss_clean($this->input->post("tb_loginemailaddress"));
					$sPassword = $this->security->xss_clean($this->input->post("tb_loginpassword"));
					$iUserResult = $this->Users_model->login($sUserEmail, md5($sPassword)); 
					if(count($iUserResult) > 0) {
						if($iUserResult['user_status'] == 'active') {
							//SET THE SESSION
							$sessiondata = array(
								'user_id' 			=> $iUserResult['user_id'],
								'user_fullname' 	=> $iUserResult['user_firstname'].' '.$iUserResult['user_lastname'],
								'user_name' 		=> $iUserResult['user_firstname'],
								'user_email'		=> $iUserResult['user_emailaddress']								
							);
							$this->session->set_userdata('loggedin_user',$sessiondata);
							$this->session->set_userdata('temp_user_id', $iUserResult['user_id']);
							redirect(base_url());
						} else {
							$this->session->set_flashdata('login', array('message' => 'Your account has been Inactivated. Please contact to Website Owner.','icon' => 'fa fa-times','class' => 'Message Message--red'));
	            			redirect(current_url());
						}
					} else {
						$this->session->set_flashdata('login', array('message' => 'Invalid Email address or Password.','icon' => 'fa fa-times','class' => 'Message Message--red'));
            			redirect(current_url());
					}
			    }				
			}
			else if($this->input->post('hdn_forgotmode') == "forgot_pass") {
				$this->session->set_userdata('new_userdata','');				
				$this->form_validation->set_rules('tb_forgotemail', 'Please enter person email address.', 'required|valid_email');
				if ($this->form_validation->run() == FALSE)
			    {
			       	$this->session->set_flashdata('forgotpwd', array('message' => 'Please enter valid Email address.','icon' => 'fa fa-times','class' => 'Message Message--red'));
	            	redirect(current_url());
			    }
			    else
			    {
			    		
			    	$aUserProfile = $this->Users_model->forgot_pass($this->input->post("tb_forgotemail"));
					$this->load->helper('string');	
					if(count($aUserProfile) > 0) {						
						if($aUserProfile['user_status'] == 'active') {							
							$data['code'] = random_string('alnum',20);
							$data['user_firstname'] = $aUserProfile['user_firstname'];	
							$post_data = array(
								'user_verifycode' => $data['code'],
								'user_updated_date' => date('Y-m-d H:i:s')
							);			
							$this->Users_model->update_user($aUserProfile['user_id'],$post_data);
							//SEND EMAIL 	
							$sContent = $this->load->view('email_template/user_forgot_pass',$data,true);
                			$sSubject = $this->config->item('site_name').' - Password Help.';
							$config = Array(
			                        'protocol' => 'mail',
			                        'mailtype'  => 'html',
			                        'charset'   => 'iso-8859-1'
			                    );
		                    $this->load->library('email', $config);
		                    $this->email->clear();
							$this->email->from('test@nichetechsolutions.com', 'Radiation Shielding Inc.');
							$this->email->to($aUserProfile['user_emailaddress']);
		                    $this->email->subject($sSubject);
		                    $this->email->message($sContent);
		                    $status = $this->email->send(FALSE);
		                    $this->email->print_debugger(array('headers'));
		                    $this->email->clear();
							//var_dump($status);
							#echo $sContent;die;						
							$this->session->set_flashdata("forgotpwd",array('message' => "Reset Password link has been sent to your email address.",'icon' => 'fa fa-check','class' => 'Message Message--green'));
							redirect(current_url());					
							
						} else {
							$this->session->set_flashdata('forgotpwd', array('message' => 'Your account has been Inactivated. Please contact to Website Owner.','icon' => 'fa fa-times','class' => 'Message Message--red'));
	            			redirect(current_url());
						}						
					} else {
						$this->session->set_flashdata('forgotpwd', array('message' => 'Sorry, the email you have entered does not Exists.','icon' => 'fa fa-times','class' => 'Message Message--red'));
            			redirect(current_url());
					}
			    }			
			} 
			
		}
        $this->load->view('templates/header', $data);
        $this->load->view('user_registration', $data);
        $this->load->view('templates/footer', $data);
    }
	public function resetpassword($code) {
		$this->load->helper('form');
		$this->load->library('form_validation');		
		$data['title'] = $this->config->item('site_name').' - Reset Password';	
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');       
        $data['current_page'] = 'reset_password';
		$data['code'] = $code;	
		if($code != '')
		{
			$aUserData = $this->Users_model->reset_password($code); 
			$this->session->set_userdata('new_userdata','');	
			if (count($aUserData) > 0) //active user record is present
			{
				$iListId  = $aUserData['user_id'];				
				if ($this->input->post()) {
					
					$this->form_validation->set_rules('tb_newPassword', '', 'required');
					if ($this->form_validation->run() == FALSE)
				    {
				       	$this->session->set_flashdata('user', array('message' => 'Please enter valid Email address.','icon' => 'icon fa fa-ban','class' => 'alert alert-error'));
		            	redirect(current_url());
				    }	
					else {
						$post_data = array(
							'user_password' => md5($this->security->xss_clean($this->input->post('tb_newPassword'))),
							'user_verifycode' => '',
							'user_updated_date' => date('Y-m-d H:i:s')
						);	
										
						$this->Users_model->update_user($iListId,$post_data);					
						$this->session->set_flashdata('resetpass', array('message' => 'You have successfully reset your password, please login with your username and new password.','icon' => 'fa fa-check','class' => 'Message Message--green'));
						redirect("user");	
					}
				}				
			}
			else
			{
				//code is not matching in database then redirect to forgot pwd page
				$this->session->set_flashdata('forgotpwd', array('message' => 'Please try again.','icon' => 'fa fa-times','class' => 'Message Message--red'));
				redirect("Forgotpass");	
			}
			$this->load->view('templates/header', $data);
            $this->load->view('reset-password', $data);
    		$this->load->view('templates/footer', $data);
		}		
	}
	public function guest_regsitration()
    {    	
        $data['title'] = $this->config->item('site_name').' - Submit quote As a Guest User';
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');       
        $data['current_page'] = 'guest_user';
		$data['country_data'] = $this->Contry_state_model->get_country();
		$data['state_data'] = $this->Contry_state_model->get_states('US');	
		if($this->session->userdata('temp_user_id') == '') {
			redirect('products');
		}	
		if($this->input->post()) {
			$data['guest_user_data'] = $_POST;
			$data['cart_data'] = $this->Cart_model->get_cartinfo($this->session->userdata('temp_cart_id'));
			$data['cart_item_data'] = $this->Cart_model->get_cartItems($this->session->userdata('temp_cart_id'));	
			$sAddress = '';
			if($data['guest_user_data']['tb_address'] != '') {$sAddress .= $data['guest_user_data']["tb_address"].', '; }
			if($data['guest_user_data']['tb_city'] != '') {$sAddress .= $data['guest_user_data']["tb_city"].', '; }
			if($data['guest_user_data']["dd_province"] != '') {$sAddress .= $data['guest_user_data']["dd_province"].', '; }
			if($data['guest_user_data']["dd_country"] != '') {$sAddress .= $data['guest_user_data']["dd_country"]; }
			if($data['guest_user_data']["dd_zipcode"] != '') {$sAddress .= ' - '.$data['guest_user_data']["dd_zipcode"]; }
			$data['user_address'] = $sAddress;
			$sMax_order = $this->Cart_model->generate_orderno();	
			if($sMax_order["max_order"] != "")
			{
				$sOrderId = 'ORD'.date('Ym').'-'.($sMax_order["max_order"]+1);
			} else {
				$sOrderId = 'ORD'.date('Ym').'-'.'01';
			}
			$cart_status = 'delivered';
			$data['order_unique_id'] = $sOrderId;
			$form_array = array(
				'user_id'			=>	$this->session->userdata('temp_user_id'),
				'order_unique_id'	=> $sOrderId,
				'cart_status'		=> $cart_status,
				'user_type'			=>	'guest',
				'cart_updated_date'	=> date('Y-m-d H:i:s')	
			);
			$this->Cart_model->update_data('rds_cart','cart_id',$this->session->userdata('temp_cart_id'),$form_array);
			//GENETATE EMAIL TEMPLATE 
			$sContent = $this->load->view('email_template/guest_user_quote',$data,true);
			#echo $sContent; die;
    		$sSubject = $this->config->item('site_name').' - Quote From '.$data['guest_user_data']['tb_firstname'].' '.$data['guest_user_data']['tb_lastname'];
    		$aEmails = explode(",", $data['config_data']['quote_emails']);
			if(count($aEmails) > 0)
			{
				for($count=0;$count<count($aEmails);$count++) {
					$config = Array(
                        'protocol' => 'mail',
                        'mailtype'  => 'html',
                        'charset'   => 'iso-8859-1'
                    );
                    $this->load->library('email', $config);
                    $this->email->clear();
					$this->email->from('test@nichetechsolutions.com', 'Radiation Shielding Inc.');
					$this->email->to($aEmails[$count]);
                    $this->email->subject($sSubject);
                    $this->email->message($sContent);
                    $status = $this->email->send(FALSE);
                    $this->email->print_debugger(array('headers'));
                    $this->email->clear();
				}
			}
			//ENDS
			$this->session->unset_userdata('temp_user_id');
			$this->session->unset_userdata('temp_cart_id');
			$this->session->set_flashdata('guest_quote', array('message' => '','icon' => '','class' => ''));
			redirect("thankyou");
		}
        $this->load->view('templates/header', $data);
        $this->load->view('guest_user', $data);
        $this->load->view('templates/footer', $data);
    }
	public function logout()
    {
        // Removing session data
        $this->session->unset_userdata('loggedin_user');
		$this->session->unset_userdata('temp_cart_id');
		$this->session->unset_userdata('temp_user_id');
        redirect(base_url());
    }
	public function get_states()
	{		 
       		if($this->input->post())
        	{        		
				$ctr_id = $this->security->xss_clean($this->input->post('ctr_id'));          
				$aCountryInfo = $this->Contry_state_model->get_ctrCode($ctr_id);
				$aStates  = $this->Contry_state_model->get_states($aCountryInfo['ctr_code']);
				if(count($aStates > 0))
				{
					$sContent = '';
					$sContent.='<option value="">Select State</option>';
					foreach($aStates as $iROw) {
						
						$sContent .= '<option value="'.$iROw["states_code"].'">'.$iROw["states_name"].'</option>';
					}
			}
            $status = array("data"=>$sContent);
           echo json_encode ($status);	
		}
	}
	
}