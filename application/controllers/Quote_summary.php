<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quote_summary extends CI_Controller
{
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
		$this->output->delete_cache();        
        $this->load->model('Products_model');
		$this->load->model('Cart_model');
		$this->load->model('Users_model');
		$this->load->model('Configuration_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		$this->load->helper('form');
		$this->load->library('session');
        $this->load->library('form_validation');
    }
	public function index()
    {
        $data['title'] = $this->config->item('site_name').' - Quote Summary ';
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');   		 
        $data['current_page'] = 'Quote summary';
		//echo '<pre>'; print_r($_SESSION); die;
		if($this->input->get('ref') != '') {						
			$data['ref'] = '?ref='.$this->input->get('ref');
		} else {
			$data['ref'] = '';
		}
		if($this->session->userdata('temp_user_id') == '') {			
			$data['cart_data'] = array();
			$data['cart_item_data'] = array();
		} else {
			$user_id = $this->session->userdata('temp_user_id');
			$form_array = array(
				'user_id'			=>	$user_id,				
				'cart_updated_date'	=> date('Y-m-d H:i:s')	
			);
			$this->Cart_model->update_data('rds_cart','cart_id',$this->session->userdata('temp_cart_id'),$form_array);
			$data['cart_data'] = $this->Cart_model->get_cartData($user_id);								
			$data['cart_item_data'] = $this->Cart_model->get_cartItems($data['cart_data']['cart_id']);			
		}	
		if($this->input->post()) {
			$sMax_order = $this->Cart_model->generate_orderno();	
			if($sMax_order["max_order"] != "")
			{
				$sOrderId = 'ORD'.date('Ym').'-'.($sMax_order["max_order"]+1);
			} else {
				$sOrderId = 'ORD'.date('Ym').'-'.'01';
			}
			if($this->input->get('ref') == "1") {
				$cart_status = 'in-review';
			} else {
				$cart_status = 'delivered';
			}
			$form_array = array(
				'user_id'			=>	$user_id,
				'order_unique_id'	=> $sOrderId,
				'cart_status'		=> $cart_status,
				'user_type'			=>	'registered',
				'cart_updated_date'	=> date('Y-m-d H:i:s')	
			);
			$this->Cart_model->update_data('rds_cart','cart_id',$this->session->userdata('temp_cart_id'),$form_array);
			//SEND EMAIL TO QUOTE RECEIPENT 
			$data['user_info'] = $this->Users_model->get_users($user_id);
			$data['order_unique_id'] = $sOrderId;
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
			//END
			//SEND EMAL TO CUSTOMERS 
			if($this->input->get('ref') != "1") {
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
			}
			//ENDS
			$this->session->unset_userdata('temp_cart_id');
			$this->session->set_flashdata('quote', array('message' => '','icon' => '','class' => ''));
			redirect("thankyou");
		}
        $this->load->view('templates/header', $data);
        $this->load->view('quote_summary', $data);
        $this->load->view('templates/footer', $data);
    }
}