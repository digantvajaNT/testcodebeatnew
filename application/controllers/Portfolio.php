<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Portfolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
		$this->output->delete_cache();
        $this->load->model('Pages_model');
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
        $data['title'] = $this->config->item('site_name').' - Portfolio';
		$data['clients_data'] = $this->Sliders_model->getclients();
		$data['category_data'] = $this->Sliders_model->getcategory();

		$data['product_data'] = $this->Sliders_model->getproduct_details('commercial-building');
		$data['product_data_education'] = $this->Sliders_model->getproduct_details_education('education');
		$data['product_data_health'] = $this->Sliders_model->getproduct_details_health('health-facilities');
		$data['product_data_higher'] = $this->Sliders_model->getproduct_details_higher('higher-education');
		$data['product_data_historical'] = $this->Sliders_model->getproduct_details_historical('historical');
		$data['product_data_industrial'] = $this->Sliders_model->getproduct_details_industrial('industrial-laboratories');
		$data['product_data_parks'] = $this->Sliders_model->getproduct_details_parks('parks-libraries');
		$data['product_data_public'] = $this->Sliders_model->getproduct_details_public('public-works');
		$data['product_data_residential'] = $this->Sliders_model->getproduct_details_residential('residential');
		
		
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');
        $data['current_page'] = 'Portfolio';
		$table_name ='nc_about_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id',$table_name);
		$data['page_banner'] = $this->Pages_model->get_banner_details($data['current_page']);
		$data['seo_details'] = $this->Pages_model->get_titleBySlug($data['current_page']);

        $this->load->view('templates/header', $data);
        $this->load->view('portfolio', $data);
        $this->load->view('templates/footer', $data);
    }
	
	public function portfolio_detail($slug)
    {
		
		$data['clients_data'] = $this->Sliders_model->getclients();
		$data['details_data'] = $this->Sliders_model->getportfoliodetails($slug);

			if($data['details_data']){
				
		$category_id = $data['details_data'][0]['category_id'];
		$data['category_data'] = $this->Sliders_model->getcategorydetails($category_id);
		$table_name ='nc_about_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id',$table_name);
		$data['current_page'] = 'Portfolio-details';
		$data['page_banner'] = $this->Pages_model->get_banner_details($data['current_page']);
		//print_R($data);exit;
		
		
		$this->load->view('templates/header',$data);
        $this->load->view('portfolio-details', $data);
        $this->load->view('templates/footer',$data);
		}else{
			
		$table_name ='nc_about_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id',$table_name);
		
			$this->load->view('templates/header',$data);
			$this->load->view('errors/html/404', $data);
			$this->load->view('templates/footer',$data);
			}
	}
	
	
}