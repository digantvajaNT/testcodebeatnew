<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Store_Locator extends CI_Controller
{
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Category_model');
        $this->load->model('Store_model');
        $this->load->model('Products_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }
    public function index()
    {
        $data['title'] = $this->config->item('site_name').' - Store Management';
        $data['area_data'] = $this->Store_model->get_area();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/Store_Locator/index', $data);
       
        $this->load->view('admin/templates/footer');
    }
	public function List1()
    {
        $data['title'] = $this->config->item('site_name').' - Store Management';
        $data['List_data'] = $this->Store_model->get_store();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/Store_Locator/List', $data);
       
        $this->load->view('admin/templates/footer');
    }
    public function addarea()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Store Management';
        if($this->input->post())
        {
            if($this->input->post("tb_Areaname") != '')
            {
                $sAreaname = $this->security->xss_clean($this->input->post("tb_Areaname"));
              
                $data = array(
                    'title' => $sAreaname,
                );
                $config = array(
                    'field' => 'tb_name',
                    // 'title' => 'title',
                    'table' => 'nc_area',
                    'id' => 'tb_area_is',
                );
                $this->load->library('slug', $config);
                $sUniqueSlug = $this->slug->create_uri($data);
                $form_data = array(
                    'tb_name'              => $sAreaname,
                   
                );

                $iLastInsertId = $this->Store_model->create_area($form_data);
                $this->session->set_flashdata('Store', array('message' => 'Area Added Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect('admin/Store_Locator');
            }
            else{
                $this->session->set_flashdata('Store', array('message' => 'Please provide required field.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/Store_Locator');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/Store_Locator/add', $data);
        $this->load->view('admin/templates/footer');
    }
    public function edit($iListId)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Store Management';
        $data['iListId'] = $iListId;
        $data['area_data'] = $this->Store_model->get_area($iListId);
        if($this->input->post()) {
             if($this->input->post("tb_Areaname") != '')
            {
                $sAreaname = $this->security->xss_clean($this->input->post("tb_Areaname"));
              
            $form_data = array(
                    'tb_name'              => $sAreaname,
                   
                );

                $this->Store_model->update_area($iListId, $form_data);
                $this->session->set_flashdata('Store', array('message' => 'Area Updated Successfully.','icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/Store_Locator');
            } else {
                $this->session->set_flashdata('Store', array('message' => 'Please provide required field.','icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/Store_Locator');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/Store_Locator/edit', $data);
        $this->load->view('admin/templates/footer',$data);
    } 
	public function Locator_edit($iListId)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
		$data['area_data'] = $this->Store_model->get_area();
        $data['title'] = $this->config->item('site_name').' - Store Management';
        $data['iListId'] = $iListId;
        $data['locator_data'] = $this->Store_model->get_store($iListId);
        if($this->input->post()) {
             if($this->input->post("dd_Area") != '')
            {
                 $sArea = $this->security->xss_clean($this->input->post("dd_Area"));
                $sLocator = $this->security->xss_clean($this->input->post("tb_Locator"));
                $sAddress = $this->input->post("tb_Address");
                $sMobile1 = $this->security->xss_clean($this->input->post("tb_Mobile1"));
                $sMobile2 = $this->security->xss_clean($this->input->post("tb_Mobile2"));
              
              if(count($sArea) > 0)
            {
                for($r=0;$r<count($sArea);$r++)
                {
            $form_data = array(
                     'Area_id'              => $sArea[$r],
                    'locator_name'              => $sLocator,
                    'lovator_add'              => $sAddress,
                    'locator_mno1'              => $sMobile1,
                    'locator_mno2'              => $sMobile2,
                    'Updatedate'              => date('Y-m-d H:i:s')
                   
                );

                $this->Store_model->update_Store($iListId, $form_data);
                $this->session->set_flashdata('Store', array('message' => 'Sotre Locator Data Updated Successfully.','icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/Store_Locator/List1');
            } 
            } 
            } 
			else {
                $this->session->set_flashdata('Store', array('message' => 'Please provide required field.','icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/Store_Locator/List1');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/Store_Locator/store_locatonedit', $data);
        $this->load->view('admin/templates/footer',$data);
    }
    public function delete($iListId)
    {
        if($iListId)
        {
            //REMOVE PRODUCTS
           
        
                $this->Store_model->delete_category($iListId);
                $this->session->set_flashdata('Store', array('message' => 'Area Deleted Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/Store_Locator');
           

        }
    }   
	public function Locator_delete($iListId)
    {
        if($iListId)
        {
            //REMOVE PRODUCTS
           
        
                $this->Store_model->delete_locator($iListId);
                $this->session->set_flashdata('Store', array('message' => 'Sotre Locator Data Deleted Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/Store_Locator/List1');
           

        }
    }
    public function addLoocator()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');
		 $data['area_data'] = $this->Store_model->get_area();
		
        $data['title'] = $this->config->item('site_name').' - Store Management';
        if($this->input->post())
        {
            $rules = array(
                array(
                    'field' => 'tb_Locator',
                    'label' => 'Locator Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'tb_Address',
                    'label' => 'Locator Address'
                ),
                array(
                    'field' => 'latitude',
                    'label' => 'Latitude'
                ),
                array(
                    'field' => 'tb_Mobile1',
                    'label' => 'Mobile',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'tb_Mobile2',
                    'label' => 'Second Mobile',
                ),
            );
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/sidebar');
                $this->load->view('admin/Store_Locator/StoreLocator_add', $data);
            }else{
                if($this->input->post("dd_Area") != ''){
                    $sArea = $this->security->xss_clean($this->input->post("dd_Area"));
                    $sLocator = $this->security->xss_clean($this->input->post("tb_Locator"));
                    $sAddress = $this->security->xss_clean($this->input->post("tb_Address"));
                    $latitude = $this->security->xss_clean($this->input->post("latitude"));
                    $longitude = $this->security->xss_clean($this->input->post("longitude"));
                    $sMobile1 = $this->security->xss_clean($this->input->post("tb_Mobile1"));
                    $sMobile2 = $this->security->xss_clean($this->input->post("tb_Mobile2"));
                    
                    $data = array(
                        'title' => $sAreaname,
                    );
                    $config = array(
                        'field' => 'tb_name',
                        // 'title' => 'title',
                        'table' => 'nc_area',
                        'id' => 'tb_area_is',
                    );
                    if(count($sArea) > 0)
                    {
                        for($r=0;$r<count($sArea);$r++)
                        {
                           $this->load->library('slug', $config);
                            $sUniqueSlug = $this->slug->create_uri($data);
                            $form_data = array(
                                'Area_id'              => $sArea[$r],
                                'locator_name'              => $sLocator,
                                'lovator_add'              => $sAddress,
                                'locator_mno1'              => $sMobile1,
                                'locator_mno2'              => $sMobile2,
                                'lat'=>$latitude,
                                'long'=>$longitude,
                                'createddate'              => date('Y-m-d H:i:s'),

                            );

                            $iLastInsertId = $this->Store_model->create_locator($form_data);
                            $this->session->set_flashdata('Store', array('message' => 'Area Added Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                            redirect('admin/Store_Locator/List1');
                        }
                    }
                }else{
                $this->session->set_flashdata('Store', array('message' => 'Please provide required field.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/Store_Locator/List1');
                }
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/Store_Locator/StoreLocator_add', $data);
       
        $this->load->view('admin/templates/footer');
    }
}