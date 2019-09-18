<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Pages_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }

    public function index() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - Home';
        $table_name = 'nc_home_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id', $table_name);

        //o$sUniqueSlug = $this->slug->create_uri($data);
        //echo $sUniqueSlug;
        ///exit;


        if ($this->input->post()) {

            $sNewsImage = '';

            if ($_FILES["file_newsimage"]["name"] != '') { //single file
                $new_name = $_FILES["file_newsimage"]["name"];
                $config['file_name'] = $new_name;
                $config['upload_path'] = "./uploads/home/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "5000";
                // $config['max_width']     =   "1920";
                //$config['max_height']    =   "1280";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("file_newsimage")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    $sNewsImage = $finfo['file_name'];
                }
            }


            $whatImage = '';

            if ($_FILES["file_weimage"]["name"] != '') { //single file
                $new_name = $_FILES["file_weimage"]["name"];
                $config['file_name'] = $new_name;
                $config['upload_path'] = "./uploads/home/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "5000";
                // $config['max_width']     =   "1920";
                //$config['max_height']    =   "1280";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("file_weimage")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    $whatImage = $finfo['file_name'];
                }
            }

            //$sTitle = $this->input->post("tb_pagetitle");
            $why_saketh = $this->input->post("why_saketh");
            $what_we_do = $this->input->post("what_we_do");
            if (!empty($why_saketh) && !empty($what_we_do)) {
                $post_data = array(
                    'whatImage' => $whatImage,
                    'why_image_url' => $sNewsImage,
                    'why_saketh' => $why_saketh,
                    'what_we_do' => $what_we_do,
                    'page_slug' => date('Y-m-d H:i:s')
                );

                $table_name = 'nc_home_page';
                $this->Pages_model->update_pages('home', $post_data, $table_name);
                $this->session->set_flashdata('home', array('message' => 'Page Updated Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
            } else {
                $this->session->set_flashdata('home', array('message' => 'Please enter required field.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect(current_url());
            }
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/content_pages/home', $data);
        $this->load->view('admin/templates/footer', $data);
    }

}
