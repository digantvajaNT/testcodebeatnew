<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sliders extends CI_Controller
{
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Sliders_model');
        $this->load->model('Products_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }
    public function index()
    {
        $data['title'] = $this->config->item('site_name').' - Sliders Management';
        $data['slider_data'] = $this->Sliders_model->get_slider();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/sliders/index', $data);
        $this->load->view('admin/templates/footer');
    }
    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['product_data'] = $this->Products_model->get_activeProducts();
        $data['title'] = $this->config->item('site_name').' - Sliders Management';
        if($this->input->post())
        {
                $sDup = 0;
//                if($this->input->post("dd_products") != '') {
//                    $aDupSlider = $this->Sliders_model->chk_duplicate($this->input->post("dd_products"));
//                    $sDup = count($aDupSlider);
//                }
                
                     
                if($sDup == 0) {
                    $sTitle = $this->security->xss_clean($this->input->post("tb_slidertitle"));
                    $sDescription = $this->security->xss_clean($this->input->post("tb_description"));
                   // $sProductId = $this->input->post("dd_products");
                    $sLink = $this->security->xss_clean($this->input->post("tb_link"));
                    $sliderImage = '';
                    //UPLOAD IMAGE
                    if($_FILES["file_sliderimage"]["name"] != '') //single file
                    {
                        $new_name =  $_FILES["file_sliderimage"]["name"];
                        $config['file_name'] = $new_name;
                        $config['upload_path']   =   "./uploads/sliders/";
                        $config['allowed_types'] =   "gif|jpg|jpeg|png";
                        $config['max_size']      =   "5000";
                        $config['max_width']     =   "1920";
                        $config['max_height']    =   "1280";
                        $this->load->library('upload',$config);
                        if(!$this->upload->do_upload("file_sliderimage"))
                        {
                            echo $this->upload->display_errors();
                        }
                        else {
                            $finfo = $this->upload->data();
                            $sliderImage = $finfo['file_name'];
                        }
                    }
					
					if($_FILES["file_allimage"]["name"] != '') //single file
                    {
                        $new_name =  $_FILES["file_allimage"]["name"];
                        $config['file_name'] = $new_name;
                        $config['upload_path']   =   "./uploads/mob_sliders/";
                        $config['allowed_types'] =   "gif|jpg|jpeg|png";
                        $config['max_size']      =   "5000";
                        $config['max_width']     =   "1920";
                        $config['max_height']    =   "1280";
                        $this->load->library('uploads',$config);
                        if(!$this->uploads->do_upload("file_allimage"))
                        {
                            echo $this->uploads->display_errors();
                        }
                        else {
                            $finfo = $this->uploads->data();
                            $mobsliderImage = $finfo['file_name'];
                        }
                    }
                    $aMaxNumber = $this->Sliders_model->get_MaxOrderno();
                    $max_orderno = ($aMaxNumber[0]["max_orderno"] + 1);
                    $form_data = array(
                        'slider_title'              => $sTitle,
                        'slider_content'            => $sDescription,
                        'slider_image'				=> $sliderImage,
                        'slider_mob_image'			=> $mobsliderImage,
                        'slider_redirect_link'		=> $sLink,
                        'slider_orderno'            => $max_orderno,
                        'slider_status'       		=>  'active',
                        'slider_createddate'   		=>  date('Y-m-d H:i:s'),
                        'slider_updateddate'   		=>  date('Y-m-d H:i:s')
                    );

                    $iLastInsertId = $this->Sliders_model->create_slider($form_data);
                    $this->session->set_flashdata('slider', array('message' => 'Slider Added Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                    redirect('admin/sliders');
                }
                else{
                    $this->session->set_flashdata('slider', array('message' => 'This product already added as a slider.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                    redirect('admin/sliders');
                }

        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/sliders/add', $data);
        $this->load->view('admin/templates/footer');
    }
    public function edit($iListId)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Sliders Management';
        $data['product_data'] = $this->Products_model->get_activeProducts();
        $data['iListId'] = $iListId;
        $data['slider_data'] = $this->Sliders_model->get_slider($iListId);
        if($this->input->post()) {
            //if ($this->input->post("tb_slidertitle") != '') {
                $sDup = 0;
                if($this->input->post("dd_products") != '') {
                    $aDupSlider = $this->Sliders_model->chk_duplicate($this->input->post("dd_products"),$iListId);
                    $sDup = count($aDupSlider);
                }

                if($sDup == 0) {
                    $sTitle = $this->security->xss_clean($this->input->post("tb_slidertitle"));
                    $sProductId = $this->input->post("dd_products");
                    $sDescription = $this->input->post("tb_description");
                    $sLink = $this->security->xss_clean($this->input->post("tb_link"));
					
                    if($_FILES["file_sliderimage"]["name"] != '') //single file
                    {
                        $new_name =  $_FILES["file_sliderimage"]["name"];
                        $config['file_name'] = $new_name;
                        $config['upload_path']   =   "./uploads/sliders/";
                        $config['allowed_types'] =   "gif|jpg|jpeg|png";
                        $config['max_size']      =   "5000";
                        $config['max_width']     =   "1920";
                        $config['max_height']    =   "1280";
                        $this->load->library('upload',$config);
                        if(!$this->upload->do_upload("file_sliderimage"))
                        {
                            echo $this->upload->display_errors();
                        }
                        else {
                            $finfo = $this->upload->data();
                            $sliderImage = $finfo['file_name'];
                        }
                    }
                    else {
                        $sliderImage = $data['slider_data']["slider_image"];
                    }

					
					if($_FILES["file_allimage"]["name"] != '') //single file
                    {
                        $new_name =  $_FILES["file_allimage"]["name"];
                        $config['file_name'] = $new_name;
                        $config['upload_path']   =   "./uploads/mob_sliders/";
                        $config['allowed_types'] =   "gif|jpg|jpeg|png";
                        $config['max_size']      =   "5000";
                        $config['max_width']     =   "1920";
                        $config['max_height']    =   "1280";
                        $this->load->library('uploads',$config);
                        if(!$this->uploads->do_upload("file_allimage"))
                        {
                            echo $this->uploads->display_errors();
                        }
                        else {
                            $finfo = $this->uploads->data();
                            $mobsliderImage = $finfo['file_name'];
                        }
                    }
					
					 else {
                        $mobsliderImage = $data['slider_data']["slider_mob_image"];
                    }
					
                    $form_data = array(
                        'slider_title' => $sTitle,
                        'product_id'              => $sProductId,
                        'slider_content' => $sDescription,
                        'slider_image' => $sliderImage,
						'slider_mob_image'			=> $mobsliderImage,
                        'slider_redirect_link' => $sLink,
                        'slider_updateddate' => date('Y-m-d H:i:s')
                    );

                    $this->Sliders_model->update_slider($iListId, $form_data);
                    $this->session->set_flashdata('slider', array('message' => 'Slider Updated Successfully.','icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                    redirect('admin/sliders');
                }
           else {
                $this->session->set_flashdata('slider', array('message' => 'Product already exists as a Slider..','icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/sliders');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/sliders/edit', $data);
        $this->load->view('admin/templates/footer',$data);
    }
    public function delete($iListId)
    {
        if($iListId)
        {
            $this->Sliders_model->delete_slider($iListId);
            $this->session->set_flashdata('slider', array('message' => 'Slider Deleted Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
            redirect('admin/sliders');
        }
    }
    public function update_status($slider_id)
    {
        if($slider_id !== NULL)
        {
            $aActiveSliders = $this->Sliders_model->get_activesliders();

            $slider_data = $this->Sliders_model->get_slider($slider_id);
            if(count($slider_data) > 0)
            {
                if($slider_data["slider_status"] == 'inactive')
                {
                    $status = "active";
                    $message = array('message' => "Slider Activated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'slider_status' => $status,
                        'slider_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Sliders_model->update_slider($slider_id,$post_data);
                    $this->session->set_flashdata('slider', $message);
                    redirect('admin/sliders');
                }
                else
                {
                    if(count($aActiveSliders) > 1)
                    {
                        $status = "inactive";
                        $message = array('message' => "Slider Inactivated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible');
                        $post_data = array(
                            'slider_status' => $status,
                            'slider_updateddate' => date('Y-m-d H:i:s')
                        );
                        //update status
                        $this->Sliders_model->update_slider($slider_id,$post_data);
                        $this->session->set_flashdata('slider', $message);
                        redirect('admin/sliders');
                    }
                    else
                    {
                        $status = "inactive";
                        $message = array('message' => "You can't Inactive slider. At least one slider should be active.",'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible');
                        $this->session->set_flashdata('slider', $message);
                        redirect('admin/sliders');
                    }
                }
            }

        }
    }
    public function change_order()
    {
        $data['title'] = $this->config->item('site_name').' - Sliders Management';
        $data['slider_data'] = $this->Sliders_model->get_slider();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/sliders/change_order', $data);
        $this->load->view('admin/templates/footer_draggble');
    }
    public function update_order()
    {
        if($this->input->post())
        {
            $sliderIds = $this->security->xss_clean($this->input->post('ids'));
            if($sliderIds != '')
            {
                $idArray = explode(",",$sliderIds);
                $count = 1;
                foreach ($idArray as $id){
                    $post_data = array(
                        'slider_orderno' => $count,
                        'slider_updateddate' => date('Y-m-d H:i:s')
                    );
                    $this->Sliders_model->update_slider($id,$post_data);
                    $count ++;
                }
            }
        }
    }
}