<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Users_model');
		$this->load->model('Cart_model');
		$this->load->model('Configuration_model');		
		$this->load->model('Contry_state_model');
        $this->load->library('session');
        if( !$this->session->userdata('loggedin_admin') ) {
            redirect(base_url().'admin/login');
        }
    }
	public function index()
	{
		$data['title'] = $this->config->item('site_name').' - Users Management';
        $data['user_data'] = $this->Users_model->get_users();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/users/index', $data);
        $this->load->view('admin/templates/footer');
	}
	public function update_status($iListId)
    {
        if($iListId !== NULL)
        {            
            $user_data = $this->Users_model->get_users($iListId);
            if(count($user_data) > 0)
            {
                if($user_data["user_status"] == 'inactive')
                {
                    $status = "active";
                    $message = array('message' => "User Activated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'user_status' => $status,
                        'user_updated_date' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Users_model->update_user($iListId,$post_data);
                    $this->session->set_flashdata('users', $message);
                    redirect('admin/users');
                }
                else
                {
                    $status = "inactive";
                    $message = array('message' => "User Inactivated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible');
                    $post_data = array(
                        'user_status' => $status,
                        'user_updated_date' => date('Y-m-d H:i:s')
                    );
                    //update status
                     $this->Users_model->update_user($iListId,$post_data);
                    $this->session->set_flashdata('users', $message);
                    redirect('admin/users');
                }
            }
        }
    }
	public function approve($iListId)
    {
        if($iListId !== NULL)
        {            
            $user_data = $this->Users_model->get_users($iListId);
			$data['user_info'] = $user_data;
			$data['config_data'] = $this->Configuration_model->get_config('config_id','1');   	
			$data["title"] = '';
            if(count($user_data) > 0)
            {
                if($user_data["user_status"] == 'pending')
                {
                	$aCartData = $this->Cart_model->get_cartData($iListId,'in-review');
                	if(count($aCartData) > 0) {
                		$cart_data = array(
							'user_id'			=>	$iListId,						
							'cart_status'		=> 'delivered',
							'cart_updated_date'	=> date('Y-m-d H:i:s')	
						);
						$this->Cart_model->update_data('rds_cart','cart_id',$aCartData['cart_id'],$cart_data);
						//update cart 
						$sMax_order = $this->Cart_model->generate_orderno();	
						if($sMax_order["max_order"] != "")
						{
							$sOrderId = 'ORD'.date('Ym').'-'.($sMax_order["max_order"]+1);
						} else {
							$sOrderId = 'ORD'.date('Ym').'-'.'01';
						}
						$cart_status = 'delivered';
						$form_array = array(
							'user_id'			=>	$iListId,
							'order_unique_id'	=> $sOrderId,
							'cart_status'		=> $cart_status,
							'cart_updated_date'	=> date('Y-m-d H:i:s')	
						);
						$this->Cart_model->update_data('rds_cart','cart_id',$aCartData['cart_id'],$form_array);
						$data['order_unique_id'] = $sOrderId;
						$data['cart_item_data'] = $this->Cart_model->get_cartItems($aCartData['cart_id']);								
						
						//SEND EMAL TO CUSTOMERS 
						$sContent_customer = $this->load->view('email_template/quote_email_customer',$data,true); 
						
		    			$sSubject_customer = $this->config->item('site_name').' - Quote request placed successfully.';
		    			$config = Array(
		                        'protocol' => 'mail',
		                        'mailtype'  => 'html',
		                        'charset'   => 'iso-8859-1'
		                    );
		                $this->load->library('email', $config);
		                $this->email->clear();
						$this->email->from('test@nichetechsolutions.com', 'Radiation Shielding Inc.');
						$this->email->to($data['user_info']['user_emailaddress']);
		                $this->email->subject($sSubject_customer);
		                $this->email->message($sContent_customer);
		                $status = $this->email->send(FALSE);
		                $this->email->print_debugger(array('headers'));
		                $this->email->clear();
						
						//ENDS
						//SEND EMAL TO QUOTE RECEIPIENT  
						$sContent = $this->load->view('email_template/quote_request',$data,true);
			    		$sSubject = 'Quote Request From '.$data['user_info']['user_firstname'].' '.$data['user_info']['user_lastname'];
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
                	}
					else {
						//SEND EMAL TO CUSTOMERS 
						$sApproval_content = $this->load->view('email_template/approval_successful',$data,true);
		    			$sApproval_subject = $this->config->item('site_name').' - Account Approved.';
		    			$config = Array(
		                        'protocol' => 'mail',
		                        'mailtype'  => 'html',
		                        'charset'   => 'UTF-8'
		                    );
		                $this->load->library('email', $config);
		                $this->email->clear();
						$this->email->from('test@nichetechsolutions.com', 'Radiation Shielding Inc.');
						$this->email->to($data['user_info']['user_emailaddress']);
		                $this->email->subject($sApproval_subject);
		                $this->email->message($sApproval_content);
		                $status = $this->email->send(FALSE);
		                $this->email->print_debugger(array('headers'));
		                $this->email->clear();
						
					}					
                    $status = "active";
                    $message = array('message' => "User Activated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'user_status' => $status,
                        'user_updated_date' => date('Y-m-d H:i:s')
                    );
                    //update status
                   $this->Users_model->update_user($iListId,$post_data);
                   $this->session->set_flashdata('users', $message);
                   redirect('admin/users');
                }                
            }
        }
    }
	public function reject($iListId)
    {
        if($iListId !== NULL)
        {            
            $news_data = $this->Users_model->get_users($iListId);
			
            if(count($news_data) > 0)
            {
                if($news_data["user_status"] == 'pending')
                {
                	//REMOVE CART ITEMS 
					$aCartData = $this->Cart_model->get_cartData($iListId);
					$this->Cart_model->delete_data('rds_cart_items','cart_id',$aCartData['cart_id']);
					$this->Cart_model->delete_data('rds_cart','user_id',$iListId);
					//ENDS 
					
                    $status = "deleted";
                    $message = array('message' => "User Rejected Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'user_status' => $status,
                        'user_updated_date' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Users_model->update_user($iListId,$post_data);					
                    $this->session->set_flashdata('users', $message);
                    redirect('admin/users');
                }                
            }
        }
    }
	public function edit($iListId)
	{		
		$this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Customers Management';
		$data['iListId'] = $iListId;
        $data['user_data'] = $this->Users_model->get_users($iListId);
		$data['country_data'] = $this->Contry_state_model->get_country();
		if($data['user_data']['user_country'] != '')
		{
			$aCountryInfo = $this->Contry_state_model->get_ctrCode($data['user_data']['user_country']);
			#var_dump($aCountryInfo);die;
			$data['state_data'] = $this->Contry_state_model->get_states($aCountryInfo['ctr_code']);
		}
		else
		{
			$data['state_data'] = $this->Contry_state_model->get_states('US');
		}
		 if($this->input->post())
		 {
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
			$this->Users_model->update_user($data['user_data']["user_id"],$arrInput);
			$this->session->set_flashdata('users', array('message' => 'Customer information updated.','icon' => 'fa fa-check','class' => 'Message Message--green'));
			redirect('admin/users');
		 }
		$this->load->view('admin/templates/header', $data);
	    $this->load->view('admin/templates/sidebar');
	    $this->load->view('admin/users/edit', $data);
	    $this->load->view('admin/templates/footer');
	}
	
}