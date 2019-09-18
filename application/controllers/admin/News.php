<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller {
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('News_model');
        $this->load->library('session');
        if( !$this->session->userdata('loggedin_admin') ) {
            redirect(base_url().'admin/login');
        }
    }
	public function index()
	{
		$data['title'] = $this->config->item('site_name').' - News Management';
        $data['news_data'] = $this->News_model->get_news();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/news/index', $data);
        $this->load->view('admin/templates/footer');
	}
	public function add()
	{
		$this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - News Management';
        if($this->input->post())
        {
            if($this->input->post("tb_title") != '')
            {
                $sTitle = $this->security->xss_clean($this->input->post("tb_title"));
				$sContent = $this->input->post("tb_content");
                $aMaxNumber = $this->News_model->get_MaxOrderno();
                $max_orderno = ($aMaxNumber[0]["max_orderno"] + 1);
                $data = array(
                    'news_title' => $sTitle,
                );
                $config = array(
                    'field' => 'news_title',
                    // 'title' => 'title',
                    'table' => 'rds_news',
                    'id' => 'news_unique_url',
                );
                $this->load->library('slug', $config);
                $sUniqueSlug = $this->slug->create_uri($data);
				$sNewsImage = '';
				if($_FILES["file_newsimage"]["name"] != '') //single file
                {
                    $new_name =  $_FILES["file_newsimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/news/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                   // $config['max_width']     =   "1920";
                    //$config['max_height']    =   "1280";
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload("file_newsimage"))
                    {
                        echo $this->upload->display_errors();
                    }
                    else {
                        $finfo = $this->upload->data();
                        $sNewsImage = $finfo['file_name'];
                    }
                } 
				
				
                $form_data = array(
                	'news_title'              	=> $sTitle,
                    'news_unique_url'           => $sUniqueSlug,
                    'news_content'              => $sContent,
                    'news_image'              	=> $sNewsImage,
                    'news_orderno'              => $max_orderno,
                    'news_status'       	 	=>  'active',
                    'news_createddate'   	 =>  date('Y-m-d H:i:s'),
                    'news_updateddate'       =>  date('Y-m-d H:i:s')
                );
                $iLastInsertId = $this->News_model->create_news($form_data);
                $this->session->set_flashdata('news', array('message' => 'News Added Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect('admin/news');
            }
            else{
                $this->session->set_flashdata('news', array('message' => 'Please provide required field.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/news');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/news/add', $data);
        $this->load->view('admin/templates/footer');
	}
	public function edit($iListId)
	{
		$this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - News Management';
		$data['iListId'] = $iListId;
        $data['news_data'] = $this->News_model->get_news($iListId);
        if($this->input->post())
        {
            if($this->input->post("tb_title") != '')
            {
                $sTitle = $this->security->xss_clean($this->input->post("tb_title"));
				$sContent = $this->input->post("tb_content");            
                
				$sNewsImage = '';
				if($_FILES["file_newsimage"]["name"] != '') //single file
                {
                    $new_name =  $_FILES["file_newsimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/news/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                  //  $config['max_width']     =   "1920";
                  //  $config['max_height']    =   "1280";
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload("file_newsimage"))
                    {
                        echo $this->upload->display_errors();
                    }
                    else {
                        $finfo = $this->upload->data();
                        $sNewsImage = $finfo['file_name'];
                    }
                } 
				else {
					 $sNewsImage = $data['news_data']['news_image'];
				}
                $form_data = array(
                	'news_title'              	=> $sTitle,                   
                    'news_content'              => $sContent,
                    'news_image'              	=> $sNewsImage,                   
                    'news_updateddate'       =>  date('Y-m-d H:i:s')
                );
                $this->News_model->update_news($iListId, $form_data);
                $this->session->set_flashdata('news', array('message' => 'News updated Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect('admin/news');
            }
            else{
                $this->session->set_flashdata('category', array('message' => 'Please provide required field.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/category');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/news/edit', $data);
        $this->load->view('admin/templates/footer');
	}
	public function delete($iListId)
	{
	 	$this->News_model->delete_news($iListId);
        $this->session->set_flashdata('news', array('message' => 'News Deleted Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
        redirect('admin/news');
	}
	public function update_status($iListId)
    {
        if($iListId !== NULL)
        {            
            $news_data = $this->News_model->get_news($iListId);
            if(count($news_data) > 0)
            {
                if($news_data["news_status"] == 'inactive')
                {
                    $status = "active";
                    $message = array('message' => "News Activated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'news_status' => $status,
                        'news_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->News_model->update_news($iListId,$post_data);
                    $this->session->set_flashdata('news', $message);
                    redirect('admin/news');
                }
                else
                {
                    $status = "inactive";
                    $message = array('message' => "News Inactivated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible');
                    $post_data = array(
                        'news_status' => $status,
                        'news_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                     $this->News_model->update_news($iListId,$post_data);
                    $this->session->set_flashdata('news', $message);
                    redirect('admin/news');
                }
            }
        }
    }
	public function change_order()
    {
        $data['title'] = $this->config->item('site_name').' - News Management';
        $data['news_data'] = $this->News_model->get_news();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/news/change_order', $data);
        $this->load->view('admin/templates/footer_draggble');
    }
    public function update_order()
    {
        if($this->input->post())
        {
            $newsID = $this->security->xss_clean($this->input->post('ids'));
            if($newsID != '')
            {
                $idArray = explode(",",$newsID);
                $count = 1;
                foreach ($idArray as $id){
                    $post_data = array(
                        'news_orderno' => $count,
                        'news_updateddate' => date('Y-m-d H:i:s')
                    );
                    $this->News_model->update_news($id,$post_data);
                    $count ++;
                }
            }
			$this->session->set_flashdata('news', array('message' => 'News reordered successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
        }
    }
}