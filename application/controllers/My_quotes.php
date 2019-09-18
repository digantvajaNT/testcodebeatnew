<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_quotes extends CI_Controller
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
		if( !$this->session->userdata('loggedin_user') ) {
            redirect(base_url().'user');
        }
    }
	public function index()
    {
        $data['title'] = $this->config->item('site_name').' - My Quotes ';
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');   		 
        $data['current_page'] = 'my_quotes';
		$user_id = $this->session->userdata('temp_user_id');
		$data['past_quotes'] = $this->Cart_model->get_myQuotes($user_id);	
        $this->load->view('templates/header', $data);
        $this->load->view('my_quotes', $data);
        $this->load->view('templates/footer', $data);
    }
}