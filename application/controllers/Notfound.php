<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notfound extends CI_Controller
{
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
		$this->load->model('Configuration_model');
		$this->load->library('session');
    }
    public function index()
    {
        $data['title'] = $this->config->item('site_name').' -  Page not found';
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');
        $this->load->view('templates/header', $data);
        $this->load->view('not-found', $data);
        $this->load->view('templates/footer', $data);
    }
}