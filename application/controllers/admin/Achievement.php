<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Achievement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Pages_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - About Us';
		$table_name='tbl_achievement';
        $data['page_data'] = $this->Pages_model->get_pages('config_id',$table_name);
		//echo  $data['page_data']['home_img_url'];
		//print_R( $data['page_data']);
		//exit;
        if ($this->input->post())
        {
				if($_FILES["file_newsimage"]["name"] != '') //single file
                {
						//$activity_image = '';
                    $new_name =  $_FILES["file_newsimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/home/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                   // $config['max_width']     =   "1920";
                    //$config['max_height']    =   "1280";
                    $this->load->library('uploads',$config);
                    if(!$this->uploads->do_upload("file_newsimage"))
                    {
                        echo $this->uploads->display_errors();
                    }
                    else {
                        $finfo = $this->uploads->data();
                        $activity_image = $finfo['file_name'];
                    }
                }else{
					
					  $activity_image = $data['page_data']['activity_image'];
				} 
				
        	$firm_profile = $this->input->post("firm_profile");
	       
        	if(!empty($firm_profile)) {        		
	            $post_data = array(
	              	'description' => $firm_profile,
					'image_url' => $activity_image,
	                'page_updateddate' => date('Y-m-d H:i:s')
	            );
				$table_name='tbl_achievement';
				
	            $this->Pages_model->update_pages('achievement',$post_data,$table_name);
	            $this->session->set_flashdata('page', array('message' => 'Page Updated Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
	            redirect(current_url());
        	} else {
        		$this->session->set_flashdata('page', array('message' => 'Please enter required field.','icon' => 'icon fa fa-ban','class' => 'alert alert-danger alert-dismissible'));
	            redirect(current_url());
        	}
            
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/content_pages/achievement', $data);
        $this->load->view('admin/templates/footer', $data);
    }
}