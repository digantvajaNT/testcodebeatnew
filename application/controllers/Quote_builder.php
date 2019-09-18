<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quote_builder extends CI_Controller
{
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
		$this->output->delete_cache();        
        $this->load->model('Products_model');
		$this->load->model('Cart_model');
		$this->load->model('Configuration_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		$this->load->helper('form');
		$this->load->library('session');
        $this->load->library('form_validation');
    }
	public function index() {
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');		
        $data['current_page'] = 'quote_builder';
		$data['bredcrumb_title'] = $this->config->item('site_name').' - Quote builder';
        $data['title'] = $this->config->item('site_name').' - Quote builder';
		if($this->session->userdata('temp_user_id') == '') {			
			$data['cart_data'] = array();
			$data['cart_item_data'] = array();
		} else {
			$user_id = $this->session->userdata('temp_user_id');
			$data['cart_data'] = $this->Cart_model->get_cartData($user_id);								
			$data['cart_item_data'] = $this->Cart_model->get_cartItems($data['cart_data']['cart_id']);			
		}	
		if($this->input->post()) {
			$aCartId = $this->input->post('hdn_cart_item_id');
			$aQty = $this->input->post('tb_quantity');
			$aComments = $this->input->post('tb_quote_comments');
			if(count($this->input->post('hdn_cart_item_id')) > 0) {
				for($i=0;$i<count($aCartId);$i++) {
					$cart_data = array(
						"product_quantity" =>	$aQty[$i],
						"comments"		=>	$aComments[$i],
						"updated_date" => date('Y-m-d H:i:s')
					);	
					$this->Cart_model->update_data('rds_cart_items','cart_item_id',$aCartId[$i],$cart_data);					
				}
				if($this->input->post('btn_quote')) {
					if($this->session->userdata('loggedin_user') == '') {
						redirect('user?ref=1');
					} else {
						redirect('quote_summary');
					}
				}
				else if($this->input->post('btn_update')) {
					$this->session->set_flashdata('quote', array('message' => 'Items updated successfully.','icon' => 'fa fa-check','class' => 'Message Message--green'));
					redirect('quote_builder');
				} 
				else {
					redirect('quote_builder');
				}
			}			
		}
		$this->load->view('templates/header', $data);
        $this->load->view('quote_builder', $data);
        $this->load->view('templates/footer', $data);
	}
	public function delete($iListId) {
		if($iListId) {
			$this->Cart_model->delete_data('rds_cart_items','cart_item_id',$iListId);
			$this->session->set_flashdata('quote', array('message' => 'Items remvoed from quote builder.','icon' => 'fa fa-trash','class' => 'Message Message--red'));
			redirect('quote_builder');	
		}
	}
}