<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('admin_model');
        $this->load->model('Category_model');
        $this->load->model('Products_model');
		$this->load->model('Events_model');
		$this->load->model('Users_model');
        $this->load->library('session');
        if( !$this->session->userdata('loggedin_admin') ) {
            redirect(base_url().'admin/login');
        }
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Dashboard';
        $data['category_count'] = $this->Category_model->get_totalCategories();
        $data['product_count'] = $this->Products_model->get_totalProducts();
        $data['user_count'] = $this->Users_model->get_totalUsers();
        $data['events_count'] = $this->Events_model->get_totalEvents();

        $data['is_validate'] = FALSE;
        $data['validate_src'] = '';

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }


    public function logout()
    {
        // Removing session data
        $this->session->unset_userdata('loggedin_admin');
        redirect(base_url().'admin/login');
    }
}