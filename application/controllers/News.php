<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');        
		$this->output->delete_cache();
		$this->load->model('Configuration_model');
		$this->load->model('News_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		$this->load->library('session');
    }
    public function index()
    {
        $data['title'] = $this->config->item('site_name').' - News';
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');   
		$data['news_data'] = $this->News_model->get_activeNews();    
        $data['current_page'] = 'News';

        $this->load->view('templates/header', $data);
        $this->load->view('news', $data);
        $this->load->view('templates/footer', $data);
    }
	public function detail($news_slug)
    {
        $data['title'] = $this->config->item('site_name').' - News';
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');   
		$data['news_data'] = $this->News_model->get_newsByslug($news_slug);    
        $data['current_page'] = 'News';

        $this->load->view('templates/header', $data);
        $this->load->view('news_detail', $data);
        $this->load->view('templates/footer', $data);
    }
}