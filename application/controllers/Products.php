<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller
{
    /*** Index Page for this controller.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
		$this->output->delete_cache();
        $this->load->model('Category_model');
        $this->load->model('Products_model');
		$this->load->model('Cart_model');
		$this->load->model('Pages_model');
		$this->load->model('Contact_Model');
		$this->load->model('Configuration_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		$this->load->helper('form');
		$this->load->library('session');
        $this->load->library('form_validation');
    }
    public function index($category)
    {
		$category1= $this->uri->segment(2);
		$maincategory=$this->uri->segment(3);
		$data['maincategory_data'] = $this->Products_model->get_category($maincategory);
		$data['maincategory_data1'] = $maincategory;
		$data['category1'] = $category1;
        $data['category_data'] = $this->Category_model->get_activeCategories();
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');
		$data['title'] = $this->config->item('site_name').' - Products';
        $data['current_page'] = 'Products';
		$data['awesome_products'] = $this->Products_model->get_featuredProducts();
		$data['product_options'] = array();
		$data['product_specifications'] = array();
		$perPage = 12;		
		$data['per_page'] = $perPage;
		$page_name='product';
		$data['seo'] = $this->Pages_model->get_titleBySlug($page_name);
		$data['contact_data'] = $this->Contact_Model->get_pages_detail();
        if($category1 != ''){
       
		$aCategory = $this->Category_model->get_categoryId($category1);
			$count = $this->Products_model->get_activetotalProducts($aCategory["category_id"]);
			
			$data['total_products'] = $count;
            $data['category_slug'] = $category1;
            $data['title'] = $this->config->item('site_name').' - '.$aCategory['category_name']. '- Products';
            $data['product_data'] = $this->Products_model->get_activeProducts($category1,$maincategory);
            $data['bredcrumb_title'] = $aCategory['category_name'].' Products';
            $this->load->view('templates/header', $data);
            $this->load->view('category-list', $data);
            $this->load->view('templates/footer', $data);
        }
        else {
			
        	$count = $this->Products_model->get_activetotalProducts();
			$data['total_products'] = $count;
            $data['category_slug'] = 'All';
			
            $data['title'] = $this->config->item('site_name').'- Products';
            $data['product_data'] = $this->Products_model->get_activeProducts($maincategory);
            
            $data['bredcrumb_title'] = 'All Products';
            $this->load->view('templates/header', $data);
            $this->load->view('products', $data);
            $this->load->view('templates/footer', $data);
        }
    }
	
	  public function Water($maincategory){
	  	
		$data['maincategory_data'] = $this->Products_model->get_category($maincategory);
		$data['maincategory_data1'] = $maincategory;
        $data['category_data'] = $this->Category_model->get_activeCategories();
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');
		$data['title'] = $this->config->item('site_name').' - Products';
        $data['current_page'] = 'Products';
		$data['awesome_products'] = $this->Products_model->get_featuredProducts();
		$data['product_options'] = array();
		$data['product_specifications'] = array();
		$perPage = 12;		
		$data['per_page'] = $perPage;
		$page_name='product';
		$data['seo'] = $this->Pages_model->get_titleBySlug($page_name);
		$data['contact_data'] = $this->Contact_Model->get_pages_detail();
   
			
        	$count = $this->Products_model->get_activetotalProducts();
			$data['total_products'] = $count;
            $data['category_slug'] = 'All';
			
            $data['title'] = $this->config->item('site_name').'- Products';
            $data['product_data'] = $this->Products_model->get_activeProducts1($maincategory);
           	//print_r($data['product_data']);exit();

            $data['bredcrumb_title'] = 'All Products';
            $this->load->view('templates/header', $data);
            $this->load->view('products', $data);
            $this->load->view('templates/footer', $data);
        
    }
	
    public function detail($product_slug)
    {
			
        $data['product_data'] = $this->Products_model->get_productInfoBySlug($product_slug,'');
		//print_r($data['product_data']);exit();
 $data['GetStates'] = $this->Contact_Model->get_AllStates();
        if($product_slug == $data['product_data']['product_unique_slug']){
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');
		$data['contact_data'] = $this->Contact_Model->get_pages_detail();
        $data['current_page'] = 'Products';
        $product_id = $data['product_data']['product_id'];
        $data['product_specifications'] = $this->Products_model->get_product_data('rds_product_features',$product_id,'specification');
        $data['product_options'] = $this->Products_model->get_product_data('rds_product_features',$product_id,'option');
        $data['product_photos'] = $this->Products_model->get_product_photo('rds_product_photos',$product_id);

        /*if(empty($data['product_photos'])){
        	$data['product_photos']['photo_name']='no_product_image.png';
        }*/
        //print_r($data['product_photos']);exit();

        $data['bredcrumb_title'] = $this->config->item('site_name').' - '.$data['product_data']['product_name'];
        $data['title'] = $this->config->item('site_name').' - '.$data['product_data']['product_name'];
		$page_name='product';
		$data['seo'] = $this->Pages_model->get_titleBySlug($page_name);
		
		if ($this->input->post()) {
            $this->form_validation->set_rules('user_first_name', 'Please enter person full name', 'required');


            $this->form_validation->set_rules('user_email_address', 'Please enter person email address.', 'required|valid_email');
            $this->form_validation->set_rules('user_mobile_no', 'Please enter person Contact number', 'required');
            $this->form_validation->set_rules('user_message', 'Please enter Organization', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('enquiry', array('message' => 'Please enter valid details.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-error'));
                redirect(current_url());
            } else {

			

                $form_array = array('user_first_name' => $_POST['user_first_name'], 'user_email_address' => $_POST['user_email_address'], 'user_mobile_no' => $_POST['user_mobile_no'],
                    'user_message' => $_POST['user_message'], 'user_address' => $_POST['user_address'], 'product_name' => $_POST['product_name']
                );


                $this->Contact_Model->create_user($form_array);
				$this->session->set_flashdata('detail', array('message' => 'contactus','icon' => '','class' => ''));
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Thanks for reaching to us. We will get back to you soon</div>');
               
                 header('Location: ' . $_SERVER['HTTP_REFERER']);

            }
        }
		
        $this->load->view('templates/header', $data);
        $this->load->view('detail', $data);
        $this->load->view('templates/footer', $data);
		}else{
		$this->load->view('templates/header', $data);
        $this->load->view('errors/html/404', $data);
        $this->load->view('templates/footer', $data);
		}
    }
	
	public function enquirycall()
    {
		
		if ($this->input->post()) {
            $this->form_validation->set_rules('user_first_name', 'Please enter person full name', 'required');


            $this->form_validation->set_rules('user_email_address', 'Please enter person email address.', 'required|valid_email');
            $this->form_validation->set_rules('user_mobile_no', 'Please enter person Contact number', 'required');
            $this->form_validation->set_rules('user_message', 'Please enter Organization', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('enquiry', array('message' => 'Please enter valid details.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-error'));
                redirect(current_url());
            } else {

			

                $form_array = array('user_first_name' => $_POST['user_first_name'], 'user_email_address' => $_POST['user_email_address'], 'user_mobile_no' => $_POST['user_mobile_no'],
                    'user_message' => $_POST['user_message'], 'user_address' => $_POST['user_address'], 'product_name' => $_POST['product_name']
                );


                $this->Contact_Model->create_user($form_array);
				$this->session->set_flashdata('detail', array('message' => 'contactus','icon' => '','class' => ''));
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Thanks for reaching to us. We will get back to you soon</div>');
               
                 header('Location: ' . $_SERVER['HTTP_REFERER']);

            }
        }
	}
    public function preview($mode = '',$product_slug)
    {
		
        $data['current_page'] = 'Products';
		$data['config_data'] = $this->Configuration_model->get_config('config_id','1');
		$data['contact_data'] = $this->Contact_Model->get_pages_detail();
        if($mode == "1")
        {
			
            $data['product_data'] = $this->Products_model->get_productInfoBySlug($product_slug,'_rds_products');
            $product_id = $data['product_data']['product_id'];
            $data['product_specifications'] = $this->Products_model->get_product_data('_rds_product_features',$product_id,'specification');
            $data['product_options'] = $this->Products_model->get_product_data('_rds_product_features',$product_id,'option');
            $data['product_photos'] = $this->Products_model->get_product_photo('_rds_product_photos',$product_id);
            $data['bredcrumb_title'] = $this->config->item('site_name').' - '.$data['product_data']['product_name'];
            $data['title'] = $this->config->item('site_name').' - '.$data['product_data']['product_name'];
            $this->load->view('templates/header', $data);
            $this->load->view('preview', $data);
            $this->load->view('templates/footer', $data);
        }
        else {
            redirect('notfound');
        }
    }
	public function p_search()
	{
		$sProductname = $this->security->xss_clean($this->input->get('q'));
		$aSearchData = $this->Products_model->search_products($sProductname);		
		if(count($aSearchData) > 0)
		{
			$aItems = array();
			foreach($aSearchData as $item)
			{
				$temp['name'] = $item["product_name"];
				$temp['slug'] = $item["product_unique_slug"];
				array_push($aItems, $temp);
				//array_push($aItems, str_replace('"',"", $item["Name"]));
			}
			echo json_encode($aItems);
		}
	}
	public function loadMore()
	{
		//print_r($_GET);exit();
		 $perPage = 12;
		 $count = $this->Products_model->get_activetotalProducts();
		 if(!empty($this->input->get("page")))
		 {
		 	$start = ceil($this->input->get("page") * $perPage);
		 	$slug = $this->input->get("slug");
		 	$page=$this->input->get("page");
		 	$offset =12*$page; 

			if($slug == 'All') {
				$data['product_data'] = $this->Products_model->get_activeProducts('',$start,$perPage,$offset);
			} else {
				
				$aCategory = $this->Category_model->get_categoryId($slug);
				//print_r($aCategory);exit();

				$data['product_data'] = $this->Products_model->get_activeProducts($aCategory["category_id"],$start,$perPage);
			}
			//print_r($data['product_data']);exit();
			$data['total_products']=$count;
			$result = $this->load->view('data', $data);
      		echo json_encode($result);
		 }
		 
	}
}