<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
    /*     * * Index Page for this controller. */

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Case_model');
        $this->load->model('Category_model');
        $this->load->model('Products_model');
        $this->load->model('Pages_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }

    public function index() {
        $data['title'] = $this->config->item('site_name') . ' - FAQ';

        $data['allcareer'] = $this->Case_model->allfaq();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/faq/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - FAQ';
        if ($this->input->post()) {

            $faq_question = $this->input->post("faq_question");
            $faq_answer = $this->input->post("faq_answer");
         
            if (!empty($faq_question) && !empty($faq_answer)) {

                $post_data = array(
                    'faq_question' => $faq_question,
                    'faq_answer' => $faq_answer,
                    'status' => '1'
                );

                $table_name = 'faq';
                $this->Pages_model->create_user($post_data, $table_name);
                $this->session->set_flashdata('faq', array('message' => 'FAQ Added Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/faq');
            } else {
                $this->session->set_flashdata('faq', array('message' => 'Please provide required field.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/faq');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/faq/add', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($iListId) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - FAQ';
        $data['iListId'] = $iListId;
        $data['case_study'] = $this->Case_model->allfaqadminbyid($iListId);

        if ($this->input->post()) {


             $faq_question = $this->input->post("faq_question");
            $faq_answer = $this->input->post("faq_answer");
         
            if (!empty($faq_question) && !empty($faq_answer)) {
                $post_data = array(
                    'faq_question' => $faq_question,
                    'faq_answer' => $faq_answer
                   
                );

                $this->Case_model->update_faq($iListId, $post_data);
                $this->session->set_flashdata('faq', array('message' => 'faq Updated Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/faq');
            } else {
                $this->session->set_flashdata('faq', array('message' => 'Please provide required field.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/faq');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/faq/edit', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function delete($iListId) {
        if ($iListId) {
            $this->Products_model->delete_product('id', $iListId, 'faq');

            $this->session->set_flashdata('faq', array('message' => ' Deleted Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible'));
            redirect('admin/faq');
        }
    }

    public function update_status($iListId) {
        if ($iListId !== NULL) {

            $product_data = $this->Case_model->allfaqadminbyid($iListId);
            //print_R(  $product_data);
            if (count($product_data) > 0) {
                if ($product_data[0]["status"] == '0') {

                    $status = "1";
                    $message = array('message' => "FAQ Activated Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'status' => $status,
                            //   'product_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Case_model->update_faqbyid($iListId, $post_data, 'faq');
                    $this->session->set_flashdata('faq', $message);
                    redirect('admin/faq');
                } else {
                    $status = "0";
                    $message = array('message' => "FAQ Inactive Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'status' => $status,
                            //'product_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Case_model->update_faqbyid($iListId, $post_data, 'faq');
                    $this->session->set_flashdata('faq', $message);
                    redirect('admin/faq');
                }
            }
        }
    }

    public function change_order() {
        $data['title'] = $this->config->item('site_name') . ' - Case Study';
        $data['category_data'] = $this->Category_model->get_category();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/category/change_order', $data);
        $this->load->view('admin/templates/footer_draggble');
    }

    public function update_order() {
        if ($this->input->post()) {
            $categoryID = $this->security->xss_clean($this->input->post('ids'));
            if ($categoryID != '') {
                $idArray = explode(",", $categoryID);
                $count = 1;
                foreach ($idArray as $id) {
                    $post_data = array(
                        'category_orderno' => $count,
                        'category_updateddate' => date('Y-m-d H:i:s')
                    );
                    $this->Category_model->update_category($id, $post_data);
                    $count ++;
                }
            }
        }
    }

}
