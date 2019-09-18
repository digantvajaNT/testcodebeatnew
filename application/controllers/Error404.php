<?php 
class Error404 extends CI_Controller 
{
 
   public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
		$this->output->delete_cache();
        $this->load->model('Pages_model');
        $this->load->model('Contact_Model');
        $this->load->model('Sliders_model');
		$this->load->helper('form');
		$this->load->model('Configuration_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		$this->load->library('session');
    }
	
 public function index() 
 { 
 		$table_name ='nc_about_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id',$table_name);
		$data['current_page'] = "error";
		$data['seo_details'] = $this->Pages_model->get_titleBySlug($data['current_page']);
	   $data['contact_data'] = $this->Contact_Model->get_pages_detail();

		$this->load->view('templates/header',$data);
		$this->load->view('errors/html/404', $data);
		$this->load->view('templates/footer',$data);
			
   // $this->output->set_status_header('404'); 
  //  $this->load->view('err404');//loading in custom error view
 } 
} 