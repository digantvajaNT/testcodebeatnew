<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Configuration extends CI_Controller {
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Configuration_model');
        $this->load->library('session');
        if( !$this->session->userdata('loggedin_admin') ) {
            redirect(base_url().'admin/login');
        }
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Website Configuration';
        $data['config_data'] = $this->Configuration_model->get_config('config_id','1');
        if ($this->input->post())
        {
            if($this->input->post('hdn_mode') == 'quote')
            {
                $sEmails = $this->input->post("tb_quoteemails");
                $sContent = $this->input->post("tb_quote_thankyou");
                $post_data = array(
                    'quote_emails' => $sEmails,
                    'quote_thankyou' => $sContent,
                    'config_updateddate' => date('Y-m-d H:i:s')
                );
                $this->Configuration_model->update_config('config_id','1',$post_data);
                $this->session->set_flashdata('quote', array('message' => 'Quote configuration updated.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
            }
			else if($this->input->post('hdn_mode') == 'contact')
            {
                $sEmails = $this->input->post("tb_contactemails");
                $sContent = $this->input->post("tb_contact_thank_you");
                $post_data = array(
                    'contact_emails' => $sEmails,
                    'contact_thankyou' => $sContent,
                    'config_updateddate' => date('Y-m-d H:i:s')
                );
                $this->Configuration_model->update_config('config_id','1',$post_data);
                $this->session->set_flashdata('contact', array('message' => 'Contact us configuration updated.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
            }
            else if($this->input->post('hdn_mode') == 'social')
            {
                $post_data = array(
                    'facebook_url' => $this->input->post("tb_facebookurl"),
                    'google_url' => $this->input->post("tb_googleplus"),
                    'twitter_url' => $this->input->post("tb_twitterurl"),
                    'linkedin_url' => $this->input->post("tb_linkedinurl"),
                    'config_updateddate' => date('Y-m-d H:i:s')
                );
                $this->Configuration_model->update_config('config_id','1',$post_data);
                $this->session->set_flashdata('social', array('message' => 'Social configuration updated.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
            }
            else if($this->input->post('hdn_mode') == 'meta')
            {
                $post_data = array(
                    'site_contactno' => $this->input->post("tb_contactno"),
                    'site_title' => $this->input->post("tb_webtitle"),
                    'site_description' => $this->input->post("tb_meta_description"),
                    'site_keywords' => $this->input->post("tb_meta_keywords"),
                    'config_updateddate' => date('Y-m-d H:i:s')
                );
                $this->Configuration_model->update_config('config_id','1',$post_data);
                $this->session->set_flashdata('meta', array('message' => 'Meta details updated.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
            }
			else if($this->input->post('hdn_mode') == 'home')
			{
				$sHomeImage = ''; $sCatalog = '';
				if($_FILES["file_homeimage"]["name"] != '') //single file
                {
                    $new_name =  $_FILES["file_homeimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/general/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                   // $config['max_width']     =   "1920";
                    //$config['max_height']    =   "1280";
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload("file_homeimage"))
                    {
                        echo $this->upload->display_errors();
                    }
                    else {
                        $finfo = $this->upload->data();
                        $sHomeImage = $finfo['file_name'];
                    }
                } 
				else {
					$sHomeImage = $data['config_data']['homepage_image'];
				}
				if($_FILES["file_catalog"]["name"] != '') //single file
                {
                    $new_name =  $_FILES["file_catalog"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/general/";
                    $config['allowed_types'] =   "pdf";
                   
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload("file_catalog"))
                    {
                        echo $this->upload->display_errors(); 
                    }
                    else {
                        $finfo = $this->upload->data();
                        $sCatalog = $finfo['file_name'];
                    }
                }
				else {
					  $sCatalog = $data['config_data']['catalog_name'];
				}
				$post_data = array(                    
                    'homepage_content' => $this->input->post("txt_home_content"),
                    'homepage_image' => $sHomeImage, 
                    'catalog_name' => $sCatalog,                     
                    'config_updateddate' => date('Y-m-d H:i:s')
                );
                $this->Configuration_model->update_config('config_id','1',$post_data);
                $this->session->set_flashdata('home', array('message' => 'Home page content updated.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect(current_url());
			}
        }
        $data['is_validate'] = FALSE;
        $data['validate_src'] = '';

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/configuration', $data);
        $this->load->view('admin/templates/footer', $data);
    }


}