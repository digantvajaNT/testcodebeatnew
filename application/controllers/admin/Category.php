<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller
{
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Category_model');
        $this->load->model('Products_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }
    public function index()
    {
        $data['title'] = $this->config->item('site_name').' - Category Management';
        $data['category_data'] = $this->Category_model->get_category();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/category/index', $data);
        $this->load->view('admin/templates/footer');
    }
    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Category Management';
        if($this->input->post())
        {
            if($this->input->post("tb_categoryname") != '')
            {
                $sCatName = $this->security->xss_clean($this->input->post("tb_categoryname"));
                $dd_maincategory = $this->security->xss_clean($this->input->post("dd_maincategory"));
                $category_description = $this->security->xss_clean($this->input->post("category_description"));
                $aMaxNumber = $this->Category_model->get_MaxOrderno();
                $max_orderno = ($aMaxNumber[0]["max_orderno"] + 1);
                $data = array(
                    'title' => $sCatName,
                );
                $config = array(
                    'field' => 'category_name',
                    // 'title' => 'title',
                    'table' => 'rds_categories',
                    'id' => 'category_slug',
                );
                $this->load->library('slug', $config);
                $sUniqueSlug = $this->slug->create_uri($data);
                $form_data = array(
                    'category_name'              => $sCatName,
                    'category_orderno'           => $max_orderno,
                    'category_description'       => $category_description,
                    'category_slug'              => $sUniqueSlug,
                    'category_status'       	 =>  'active',
                    'category_createddate'   	 =>  date('Y-m-d H:i:s'),
                    'category_updateddate'       =>  date('Y-m-d H:i:s'),
                    'ManuCtegory_id'       =>  $dd_maincategory
                );

                $iLastInsertId = $this->Category_model->create_category($form_data);
                $this->session->set_flashdata('category', array('message' => 'Category Added Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-success alert-dismissible'));
                redirect('admin/category');
            }
            else{
                $this->session->set_flashdata('category', array('message' => 'Please provide required field.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/category');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/category/add', $data);
        $this->load->view('admin/templates/footer');
    }
    public function edit($iListId)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Category Management';
        $data['iListId'] = $iListId;
        $data['category_data'] = $this->Category_model->get_category($iListId);
        if($this->input->post()) {
            if ($this->input->post("tb_categoryname") != '') {
                $sCatName = $this->security->xss_clean($this->input->post("tb_categoryname"));
				$dd_maincategory = $this->security->xss_clean($this->input->post("dd_maincategory"));
                $category_description = $this->security->xss_clean($this->input->post("category_description"));

                $form_data = array(
                    'category_name'              => $sCatName,
                    'category_description'       => $category_description,
                    'category_updateddate'       =>  date('Y-m-d H:i:s'),
					 'ManuCtegory_id'       =>  $dd_maincategory
                );

                $this->Category_model->update_category($iListId, $form_data);
                $this->session->set_flashdata('category', array('message' => 'Category Updated Successfully.','icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/category');
            } else {
                $this->session->set_flashdata('category', array('message' => 'Please provide required field.','icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/category');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/category/edit', $data);
        $this->load->view('admin/templates/footer',$data);
    }
    public function delete($iListId)
    {
        if($iListId)
        {
            //REMOVE PRODUCTS
            $aProducts = $this->Products_model->get_category_products($iListId);
            if(count($aProducts) == 0) {
                /*foreach($aProducts as $itmProduct)
                {
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'rds_products');
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'_rds_products');
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'rds_product_categories');
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'_rds_product_categories');
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'rds_product_features');
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'_rds_product_features');
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'rds_product_photos');
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'_rds_product_photos');
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'rds_product_feature_photo');
                    $this->Products_model->delete_product('product_id',$itmProduct["product_id"],'_rds_product_feature_photo');
                }*/
                $this->Category_model->delete_category($iListId);
                $this->session->set_flashdata('category', array('message' => 'Category Deleted Successfully.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/category');
            } else {

                $this->session->set_flashdata('category', array('message' => 'You can\'t delete this category because it contains products.','icon' => 'icon fa fa-check','class' => 'alert alert-danger alert-dismissible'));
                redirect('admin/category');
            }

        }
    }
    public function update_status($category_id)
    {
        if($category_id !== NULL)
        {
            $aActiveCategories = $this->Category_model->get_activeCategories();
            $category_data = $this->Category_model->get_category($category_id);
            if(count($category_data) > 0)
            {
                if($category_data["category_status"] == 'inactive')
                {
                    $status = "active";
                    $message = array('message' => "Category Activated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'category_status' => $status,
                        'category_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Category_model->update_category($category_id,$post_data);
                    $this->session->set_flashdata('category', $message);
                    redirect('admin/category');
                }
                else
                {
                    if(count($aActiveCategories) > 1)
                    {
                        $status = "inactive";
                        $message = array('message' => "Category Inactivated Successfully",'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible');
                        $post_data = array(
                            'category_status' => $status,
                            'category_updateddate' => date('Y-m-d H:i:s')
                        );
                        //update status
                        $this->Category_model->update_category($category_id,$post_data);
                        $this->session->set_flashdata('category', $message);
                        redirect('admin/category');
                    }
                    else
                    {
                        $status = "inactive";
                        $message = array('message' => "You can't Inactive category. At least one category should be active.",'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible');
                        $this->session->set_flashdata('category', $message);
                        redirect('admin/category');
                    }
                }
            }

        }
    }
    public function change_order()
    {
        $data['title'] = $this->config->item('site_name').' - Category Management';
        $data['category_data'] = $this->Category_model->get_category();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/category/change_order', $data);
        $this->load->view('admin/templates/footer_draggble');
    }
    public function update_order()
    {
        if($this->input->post())
        {
            $categoryID = $this->security->xss_clean($this->input->post('ids'));
            if($categoryID != '')
            {
                $idArray = explode(",",$categoryID);
                $count = 1;
                foreach ($idArray as $id){
                    $post_data = array(
                        'category_orderno' => $count,
                        'category_updateddate' => date('Y-m-d H:i:s')
                    );
                    $this->Category_model->update_category($id,$post_data);
                    $count ++;
                }
            }
        }
    }
}