<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Events extends CI_Controller {
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Events_model');
        $this->load->library('session');
        if( !$this->session->userdata('loggedin_admin') ) {
            redirect(base_url().'admin/login');
        }
    }
	public function index()
	{
		$data['title'] = $this->config->item('site_name').' - events Management';
        $data['events_data'] = $this->Events_model->get_events();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/events/index', $data);
        $this->load->view('admin/templates/footer');
	}
	public function add()
	{
		$this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Events Management';
        if($this->input->post())
        {
            if($this->input->post("tb_title") != '')
            {
                $sTitle = $this->security->xss_clean($this->input->post("tb_title"));
				$sContent = $this->input->post("tb_content");
				$sVenue = $this->input->post("tb_venue");
				$sStartDate = date("Y-m-d",strtotime($this->input->post("tb_startdate")));
				$sEndDate = date("Y-m-d",strtotime($this->input->post("tb_enddate")));
                $aMaxNumber = $this->Events_model->get_MaxOrderno();
                $max_orderno = ($aMaxNumber[0]["max_orderno"] + 1);
                $data = array(
                    'event_title' => $sTitle,
                );
                $config = array(
                    'field' => 'event_title',
                    // 'title' => 'title',
                    'table' => 'rds_events',
                    'id' => 'event_unique_url',
                );
                $this->load->library('slug', $config);
                $sUniqueSlug = $this->slug->create_uri($data);
				$sEventsImage = '';
				if($_FILES["file_eventsimage"]["name"] != '') //single file
                {
                    $new_name =  $_FILES["file_eventsimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/events/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                   // $config['max_width']     =   "1920";
                 //   $config['max_height']    =   "1280";
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload("file_eventsimage"))
                    {
                        echo $this->upload->display_errors();
                    }
                    else {
                        $finfo = $this->upload->data();
                        $sEventsImage = $finfo['file_name'];
                    }
                } 
                $form_data = array(
                	'event_title'              => $sTitle,
                    'event_description'        => $sContent,
                    'event_venue'              => $sVenue,
                    'event_enddate'            => $sEndDate,
                    'event_startdate'          => $sStartDate,
                    'event_orderno'            => $max_orderno,
                    'event_banner'             => $sEventsImage,
                    'event_unique_url'         => $sUniqueSlug,
                    'event_status'       	   =>  'active',
                    'event_createddate'   	   =>  date('Y-m-d H:i:s'),
                    'event_updateddate'       =>  date('Y-m-d H:i:s')
                );
				
                $iLastInsertId = $this->Events_model->create_event($form_data);
                $this->session->set_flashdata('events', array('message' => 'Events Added Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect('admin/events');
            }
            else{
                $this->session->set_flashdata('events', array('message' => 'Please provide required field.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/events');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/events/add', $data);
        $this->load->view('admin/templates/footer');
	}
	public function edit($iListId)
	{
		$this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - events Management';
		$data['iListId'] = $iListId;
        $data['event_data'] = $this->Events_model->get_events($iListId);
        if($this->input->post())
        {
            if($this->input->post("tb_title") != '')
            {
                $sTitle = $this->security->xss_clean($this->input->post("tb_title"));
				$sContent = $this->input->post("tb_content");
				$sVenue = $this->input->post("tb_venue");
				$sStartDate = date("Y-m-d",strtotime($this->input->post("tb_startdate")));
				$sEndDate = date("Y-m-d",strtotime($this->input->post("tb_enddate")));          
                
				$sEventsImage = '';
				if($_FILES["file_eventsimage"]["name"] != '') //single file
                {
                    $new_name =  $_FILES["file_eventsimage"]["name"];
                    $config['file_name'] = $new_name;
                    $config['upload_path']   =   "./uploads/events/";
                    $config['allowed_types'] =   "gif|jpg|jpeg|png";
                    $config['max_size']      =   "5000";
                   // $config['max_width']     =   "1920";
                   // $config['max_height']    =   "1280";
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload("file_eventsimage"))
                    {
                        echo $this->upload->display_errors();
                    }
                    else {
                        $finfo = $this->upload->data();
                        $sEventsImage = $finfo['file_name'];
                    }
                } 
				else {
					 $sEventsImage = $data['event_data']['event_banner'];
				}
                $form_data = array(
                	'event_title'              => $sTitle,
                    'event_description'        => $sContent,
                    'event_venue'              => $sVenue,
                    'event_enddate'            => $sEndDate,
                    'event_startdate'          => $sStartDate,                    
                    'event_banner'             => $sEventsImage,                   
                    'event_updateddate'       =>  date('Y-m-d H:i:s')
                );
                $this->Events_model->update_event($iListId, $form_data);
                $this->session->set_flashdata('events', array('message' => 'Event updated Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect('admin/events');
            }
            else{
                $this->session->set_flashdata('category', array('message' => 'Please provide required field.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/events');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/events/edit', $data);
        $this->load->view('admin/templates/footer');
	}
	public function delete($iListId)
	{
	 	$this->Events_model->delete_event($iListId);
        $this->session->set_flashdata('events', array('message' => 'Event Deleted Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
        redirect('admin/events');
	}
	public function update_status($iListId)
    {
        if($iListId !== NULL)
        {            
            $events_data = $this->Events_model->get_events($iListId);
            if(count($events_data) > 0)
            {
                if($events_data["event_status"] == 'inactive')
                {
                    $status = "active";
                    $message = array('message' => "Event Activated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'event_status' => $status,
                        'event_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Events_model->update_event($iListId,$post_data);
                    $this->session->set_flashdata('events', $message);
                    redirect('admin/events');
                }
                else
                {
                    $status = "inactive";
                    $message = array('message' => "Event Inactivated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible');
                    $post_data = array(
                        'event_status' => $status,
                        'event_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                     $this->Events_model->update_event($iListId,$post_data);
                    $this->session->set_flashdata('events', $message);
                    redirect('admin/events');
                }
            }
        }
    }
	public function change_order()
    {
        $data['title'] = $this->config->item('site_name').' - Events Management';
        $data['events_data'] = $this->Events_model->get_events();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/events/change_order', $data);
        $this->load->view('admin/templates/footer_draggble');
    }
    public function update_order()
    {
        if($this->input->post())
        {
            $eventsID = $this->security->xss_clean($this->input->post('ids'));
            if($eventsID != '')
            {
                $idArray = explode(",",$eventsID);
                $count = 1;
                foreach ($idArray as $id){
                    $post_data = array(
                        'event_orderno' => $count,
                        'event_updateddate' => date('Y-m-d H:i:s')
                    );
                    $this->Events_model->update_event($id,$post_data);
                    $count ++;
                }
            }
			$message = array('message' => "Events reordered.",'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
			$this->session->set_flashdata('events', $message);
        }
    }
}