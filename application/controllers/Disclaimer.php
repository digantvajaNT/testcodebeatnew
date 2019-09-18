<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Disclaimer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
	$this->output->delete_cache();
        $this->load->model('Pages_model');
        $this->load->model('Sliders_model');
        $this->load->model('Contact_Model');
	$this->load->helper('form');
	$this->load->model('Configuration_model');
	$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	$this->output->set_header('Pragma: no-cache');
	$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	$this->load->library('session');
    }
    public function index()
    {
		$data['title'] = $this->config->item('site_name').' - Disclaimer';
		$data['clients_data'] = $this->Sliders_model->getclients();
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');
		$data['current_page'] = 'Clients';
		$table_name = 'nc_about_page';
		$data['contact_data'] = $this->Contact_Model->get_pages_detail();
		$data['page_data'] = $this->Pages_model->get_pages('config_id', $table_name);
		$data['page_banner'] = $this->Pages_model->get_banner_details($data['current_page']);
		$data['seo_details'] = $this->Pages_model->get_titleBySlug($data['current_page']);
        $this->load->view('templates/header', $data);
        $this->load->view('disclaimer', $data);
        $this->load->view('templates/footer', $data);
    }
}