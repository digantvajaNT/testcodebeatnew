<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->output->delete_cache();
        $this->load->model('Pages_model');
        $this->load->helper('form');
        $this->load->model('Configuration_model');
        $this->load->model('Contact_Model');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        ('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        $this->load->library('session');
     
        
    }

    function _remap($method) {
        $method = str_replace('-', '_', $method);
        $params = array_slice($this->uri->segment_array(), 2);
        if (!method_exists($this, $method))
            show_404();

        return call_user_func_array(array($this, $method), $params);
    }

    public function index() {
        $data['title'] = $this->config->item('site_name') . ' - About Us';
        $data['config_data'] = $this->Configuration_model->get_config('config_id', '1');
        $table_name = 'nc_about_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id', $table_name);
        $data['team_data'] = $this->Pages_model->get_team();
        $data['allcareer'] = $this->Pages_model->get_career();
        $data['current_page'] = 'About';
	    $data['contact_data'] = $this->Contact_Model->get_pages_detail();
        $data['page_banner'] = $this->Pages_model->get_banner_details($data['current_page']);
        $data['seo_details'] = $this->Pages_model->get_titleBySlug($data['current_page']);

        $this->load->view('templates/header', $data);
        $this->load->view('career', $data);
        $this->load->view('templates/footer', $data);
    }

    public function career_detail($id) {
        $data['title'] = $this->config->item('site_name') . ' - About Us';
        $data['config_data'] = $this->Configuration_model->get_config('config_id', '1');
        $table_name = 'nc_about_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id', $table_name);
        $data['team_data'] = $this->Pages_model->get_careerdetails($id);
		
   $data['contact_data'] = $this->Contact_Model->get_pages_detail();
            $data['current_page'] = 'team-detail';
            $data['seo_details'] = $this->Pages_model->get_titleBySlug($data['current_page']);
            $data['page_banner'] = $this->Pages_model->get_banner_details($data['current_page']);
            $this->load->view('templates/header', $data);
            $this->load->view('career-detail', $data);
            $this->load->view('templates/footer', $data);
       
    }

}
