<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Products_model');
        $this->load->model('Category_model');
        $this->load->library('session');
        if (!$this->session->userdata('loggedin_admin')) {
            redirect(base_url() . 'admin/login');
        }
    }

    public function index() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - Blog Management';
        $data['product_data'] = $this->Products_model->get_products();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/blog/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function add() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - Blog Management';
        $data['category_data'] = $this->Category_model->get_activeCategories();
        if ($this->input->post()) {
            $sProductName = $this->security->xss_clean($this->input->post("tb_productname"));
            $sDescription = $this->input->post("tb_description");
            $sCategory = $this->input->post("dd_category");
            $product_details = $this->input->post("product_details");
			$category_id = $sCategory[0];
			 $category_datas = $this->Products_model->get_nameCategories($category_id);
			
            $sCoverImage = '';
            $sProductStatus = 'active';
         
            if ($_FILES["file_coverimage"]["name"] != '') { //single file

                $new_name = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES["file_coverimage"]["name"];
                $config['file_name'] = $new_name;
                $config['upload_path'] = "./uploads/blog/";
                $config['allowed_types'] = "gif|jpg|jpeg|png|pdf";
                $config['max_size'] = "5000";
                $config['max_width'] = "1920";
                $config['max_height'] = "1280";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("file_coverimage")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    $sCoverImage = $finfo['file_name'];
                }
            }
            
          
                
            $data = array(
                'title' => $sProductName,
            );
            $config = array(
                'field' => 'product_name',
                // 'title' => 'title',
                'table' => 'rds_products',
                'id' => 'product_unique_slug',
            );
            $this->load->library('slug', $config);
            $sUniqueSlug = $this->slug->create_uri($data);
			
			
            //ADD DATA TO PRODUCT TABLE
            $arrProduct = array(
                "product_name" => $sProductName,
                "category_id" => $category_datas['category_id'],
                "category_name" => $category_datas['category_name'],
                "product_details" => $product_details,
                "producr_cover_image" => $sCoverImage,
                "product_unique_slug" => $sUniqueSlug,
                "product_description" => $sDescription,
                "product_isFeatured" => 'no',
                "product_status" => $sProductStatus,
                "product_createddate" => date('Y-m-d H:i:s'),
                "product_updateddate" => date('Y-m-d H:i:s')
            );
            $iInsertedProductId = $this->Products_model->create_product($arrProduct, 'rds_products');

          

            if ($sProductStatus == 'active') {
                $this->session->set_flashdata('product', array('message' => 'blog published successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/blog');
            } else {
                $this->session->set_flashdata('product', array('message' => 'Draft saved successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/blog');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/blog/add', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function edit($iListId) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name') . ' - blog Management';
        $data['category_data'] = $this->Category_model->get_activeCategories();
		 $data['product_data'] = $this->Products_model->get_products($iListId);
		//$data['product_cat_data'] = $this->Products_model->get_product_category('rds_product_categories', $iListId);
     //   $data['product_specifications'] = $this->Products_model->get_product_data('rds_product_features', $iListId, 'specification');
     //   $data['product_options'] = $this->Products_model->get_product_data('rds_product_features', $iListId, 'option');
      //  $data['product_photos'] = $this->Products_model->get_product_photo('rds_product_photos', $iListId);
        //$data['product_spec_photos'] = $this->Products_model->get_product_spec_photos('rds_product_feature_photo',$iListId,'specification');
        //$data['product_option_photos'] = $this->Products_model->get_product_spec_photos('rds_product_feature_photo',$iListId,'option');
        $data['iListId'] = $iListId;
        if ($this->input->post()) {
            $sProductName = $this->security->xss_clean($this->input->post("tb_productname"));
            $sProductModelno = $this->security->xss_clean($this->input->post("tb_modelno"));
            $sDescription = $this->input->post("tb_description");
			 $product_details = $this->input->post("product_details");
            $sCategory = $this->input->post("dd_category");
            $sCoverImage = '';

            if ($_FILES["file_coverimage"]["name"] != '') { //single file

                $new_name = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES["file_coverimage"]["name"];
                $config['file_name'] = $new_name;
                $config['upload_path'] = "./uploads/products/covers/";
                $config['allowed_types'] = "*";
                $config['max_size'] = "5000";
                //$config['max_width']     =   "1920";
                //  $config['max_height']    =   "1280";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("file_coverimage")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    $sCoverImage = $finfo['file_name'];
                }
            } else {
                $sCoverImage = $data['product_data']['producr_cover_image'];
            }

          
            //ADD DATA TO PRODUCT TABLE
            $arrProduct = array(
                "product_name" => $sProductName,
                "producr_cover_image" => $sCoverImage,
                "product_details" => $product_details,
                "product_description" => $sDescription,
                "product_updateddate" => date('Y-m-d H:i:s')
            );
            $this->Products_model->update_product($iListId, $arrProduct, 'rds_products');
           
         
        
            
            $this->session->set_flashdata('product', array('message' => 'Page updated successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
            redirect('admin/blog');
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/blog/edit', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function update_draft($iListId) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['live_product'] = $this->Products_model->get_products($iListId);
        $data['title'] = $this->config->item('site_name') . ' - blog Management';
        $data['category_data'] = $this->Category_model->get_activeCategories();
        $data['product_data'] = $this->Products_model->get_draft_data($iListId);
        $data['product_cat_data'] = $this->Products_model->get_product_category('_rds_product_categories', $iListId);
        $data['iListId'] = $iListId;
        $data['product_specifications'] = $this->Products_model->get_product_data('_rds_product_features', $iListId, 'specification');
        $data['product_options'] = $this->Products_model->get_product_data('_rds_product_features', $iListId, 'option');
        $data['product_photos'] = $this->Products_model->get_product_photo('_rds_product_photos', $iListId);
        //$data['product_spec_photos'] = $this->Products_model->get_product_spec_photos('_rds_product_feature_photo',$iListId,'specification');
        //$data['product_option_photos'] = $this->Products_model->get_product_spec_photos('_rds_product_feature_photo',$iListId,'option');
        if ($this->input->post()) {
            $sProductName = $this->security->xss_clean($this->input->post("tb_productname"));
            $sProductModelno = $this->security->xss_clean($this->input->post("tb_modelno"));
            $sDescription = $this->input->post("tb_description");
            $sCategory = $this->input->post("dd_category");
            $sCoverImage = '';
            $sProductStatus = '';
            if (trim($this->input->post("hdn_p_status")) == 'publish') {
                $sProductStatus = 'active';
            } else if (trim($this->input->post("hdn_p_status")) == 'draft') {
                $sProductStatus = 'draft';
            } else {
                $sProductStatus = 'draft';
            }
            if ($_FILES["file_coverimage"]["name"] != '') { //single file

                $new_name = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES["file_coverimage"]["name"];
                $config['file_name'] = $new_name;
                $config['upload_path'] = "./uploads/products/covers/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "5000";
                $config['max_width'] = "1920";
                $config['max_height'] = "1280";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("file_coverimage")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    $sCoverImage = $finfo['file_name'];
                }
            } else {
                $sCoverImage = $data['product_data']['producr_cover_image'];
            }

            //ADD DATA TO PRODUCT TABLE
            if ($sProductStatus == 'active') {
                $arrProduct = array(
                    "product_modelno" => $sProductModelno,
                    "product_name" => $sProductName,
                    "product_status" => "active",
                    "producr_cover_image" => $sCoverImage,
                    "product_description" => $sDescription,
                    "product_updateddate" => date('Y-m-d H:i:s')
                );
                $this->Products_model->update_product($iListId, $arrProduct, 'rds_products');
            }
            $arrProduct = array(
                "product_modelno" => $sProductModelno,
                "product_name" => $sProductName,
                "producr_cover_image" => $sCoverImage,
                "product_description" => $sDescription,
                "product_updateddate" => date('Y-m-d H:i:s')
            );
            $this->Products_model->update_product($iListId, $arrProduct, '_rds_products');

            if (count($sCategory) > 0) {
                if ($sProductStatus == 'active') {
                    $this->Products_model->delete_product_category('rds_product_categories', $iListId);
                }
                $this->Products_model->delete_product_category('_rds_product_categories', $iListId);
                for ($r = 0; $r < count($sCategory); $r++) {
                    $sOrderNo = $this->Products_model->get_MaxOrderno($sCategory[0]);
                    $aCatProducts1 = array(
                        "product_id" => $iListId,
                        "category_id" => $sCategory[$r],
                        "product_orderno" => ($sOrderNo["max_orderno"] + 1),
                        "product_category_createddate" => date('Y-m-d H:i:s'),
                        "product_updateddate" => date('Y-m-d H:i:s')
                    );
                    if ($sProductStatus == 'active') {
                        $this->Products_model->create_product_data($aCatProducts1, 'rds_product_categories');
                    }
                    $this->Products_model->create_product_data($aCatProducts1, '_rds_product_categories');
                }
            }
            $aSpecificationTitle = $this->input->post("tb_spectitle");
            $aSpecificationDesc = $this->input->post("tb_specification");
            $sSpecJson = $this->input->post("specification_img_json");
            if (count($aSpecificationTitle) > 0) {
                for ($s = 0; $s < count($aSpecificationTitle); $s++) {
                    if (trim($aSpecificationTitle[$s]) != '') {
                        $aSpecification1 = array(
                            "product_id" => $iListId,
                            "feature_category" => 'specification',
                            "feature_title" => $aSpecificationTitle[$s],
                            "feature_description" => $aSpecificationDesc[$s],
                            "feature_createddate" => date('Y-m-d H:i:s'),
                            "feature_updateddate" => date('Y-m-d H:i:s')
                        );
                        if ($sProductStatus == 'active') {
                            $iPrdSpecId = $this->Products_model->create_product_data($aSpecification1, 'rds_product_features');
                        }
                        $iPrdSpecId_draft = $this->Products_model->create_product_data($aSpecification1, '_rds_product_features');

                        if (trim($sSpecJson[$s]) != '') {
                            $aSpPhoto = json_decode($sSpecJson[$s]);
                            for ($sp = 0; $sp < count($aSpPhoto); $sp++) {
                                if ($sProductStatus == 'active') {
                                    $aspPhotos1 = array(
                                        "feature_id" => $iPrdSpecId,
                                        "product_id" => $iListId,
                                        "image_name" => $aSpPhoto[$sp],
                                        "product_feature_photo_createddate" => date('Y-m-d H:i:s'),
                                        "product_feature_photo_updateddate" => date('Y-m-d H:i:s')
                                    );

                                    $this->Products_model->create_product_data($aspPhotos1, 'rds_product_feature_photo');
                                }
                                $aspPhotos1 = array(
                                    "feature_id" => $iPrdSpecId_draft,
                                    "product_id" => $iListId,
                                    "image_name" => $aSpPhoto[$sp],
                                    "product_feature_photo_createddate" => date('Y-m-d H:i:s'),
                                    "product_feature_photo_updateddate" => date('Y-m-d H:i:s')
                                );

                                $this->Products_model->create_product_data($aspPhotos1, '_rds_product_feature_photo');
                            }
                        }
                    }
                }
            }
            $aOptionTitle = $this->input->post("tb_opttitle");
            $aOpDesc = $this->input->post("tb_optdesc");
            $sOptJson = $this->input->post("option_img_json");
            if (count($aOptionTitle) > 0) {
                for ($o = 0; $o < count($aOptionTitle); $o++) {
                    if (trim($aOptionTitle[$o]) != '') {
                        $aOption1 = array(
                            "product_id" => $iListId,
                            "feature_category" => 'option',
                            "feature_title" => $aOptionTitle[$o],
                            "feature_description" => $aOpDesc[$o],
                            "feature_createddate" => date('Y-m-d H:i:s'),
                            "feature_updateddate" => date('Y-m-d H:i:s')
                        );
                        if ($sProductStatus == 'active') {
                            $iPrdOptId = $this->Products_model->create_product_data($aOption1, 'rds_product_features');
                        }
                        $iPrdOptId_draft = $this->Products_model->create_product_data($aOption1, '_rds_product_features');


                        if (trim($sOptJson[$o]) != '') {
                            $aOpPhotoD = json_decode($sOptJson[$o]);
                            for ($op = 0; $op < count($aOpPhotoD); $op++) {
                                if ($sProductStatus == 'active') {
                                    $aOpPhoto1 = array(
                                        "feature_id" => $iPrdOptId,
                                        "product_id" => $iListId,
                                        "image_name" => $aOpPhotoD[$op],
                                        "product_feature_photo_createddate" => date('Y-m-d H:i:s'),
                                        "product_feature_photo_updateddate" => date('Y-m-d H:i:s')
                                    );
                                    $this->Products_model->create_product_data($aOpPhoto1, 'rds_product_feature_photo');
                                }
                                $aOpPhoto1 = array(
                                    "feature_id" => $iPrdOptId_draft,
                                    "product_id" => $iListId,
                                    "image_name" => $aOpPhotoD[$op],
                                    "product_feature_photo_createddate" => date('Y-m-d H:i:s'),
                                    "product_feature_photo_updateddate" => date('Y-m-d H:i:s')
                                );
                                $this->Products_model->create_product_data($aOpPhoto1, '_rds_product_feature_photo');
                            }
                        }
                    }
                }
            }

            if ($sProductStatus == 'active') {
                $this->session->set_flashdata('product', array('message' => 'Product published successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/products');
            } else {
                $this->session->set_flashdata('product', array('message' => 'Draft updated successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
                redirect('admin/products');
            }
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/products/update_draft', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function delete($iListId) {
        if ($iListId) {
            $this->Products_model->delete_product('product_id', $iListId, 'rds_products');
            $this->Products_model->delete_product('product_id', $iListId, '_rds_products');
            $this->Products_model->delete_product('product_id', $iListId, 'rds_product_categories');
            $this->Products_model->delete_product('product_id', $iListId, '_rds_product_categories');
            $this->Products_model->delete_product('product_id', $iListId, 'rds_product_features');
            $this->Products_model->delete_product('product_id', $iListId, '_rds_product_features');
            $this->Products_model->delete_product('product_id', $iListId, 'rds_product_photos');
            $this->Products_model->delete_product('product_id', $iListId, '_rds_product_photos');
            $this->Products_model->delete_product('product_id', $iListId, 'rds_product_feature_photo');
            $this->Products_model->delete_product('product_id', $iListId, '_rds_product_feature_photo');

            $this->session->set_flashdata('product', array('message' => 'Product Deleted Successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-danger alert-dismissible'));
            redirect('admin/blog');
        }
    }

    public function update_status($iListId) {
        if ($iListId !== NULL) {
            $product_data = $this->Products_model->get_products($iListId);
            if (count($product_data) > 0) {
                if ($product_data["product_status"] == 'inactive') {
                    $status = "active";
                    $message = array('message' => "Product Activated Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'product_status' => $status,
                        'product_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Products_model->update_product($iListId, $post_data, 'rds_products');
                    $this->session->set_flashdata('product', $message);
                    redirect('admin/blog');
                } else {
                    $status = "inactive";
                    $message = array('message' => "Product Inactive Successfully", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                    $post_data = array(
                        'product_status' => $status,
                        'product_updateddate' => date('Y-m-d H:i:s')
                    );
                    //update status
                    $this->Products_model->update_product($iListId, $post_data, 'rds_products');
                    $this->session->set_flashdata('product', $message);
                    redirect('admin/blog');
                }
            }
        }
    }

    public function featured($iListId) {
        if ($iListId !== NULL) {
            $product_data = $this->Products_model->get_products($iListId);
            if ($product_data["product_isFeatured"] == "no") {
                $status = "yes";
                $message = array('message' => "Product added in to Featured list.", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                $post_data = array(
                    'product_isFeatured' => $status,
                    'product_updateddate' => date('Y-m-d H:i:s')
                );
                //update status
                $this->Products_model->update_product($iListId, $post_data, 'rds_products');
                $this->session->set_flashdata('product', $message);
                redirect('admin/products');
            } else {
                $status = "no";
                $message = array('message' => "Product removed from Featured list.", 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible');
                $post_data = array(
                    'product_isFeatured' => $status,
                    'product_updateddate' => date('Y-m-d H:i:s')
                );
                //update status
                $this->Products_model->update_product($iListId, $post_data, 'rds_products');
                $this->session->set_flashdata('product', $message);
                redirect('admin/products');
            }
        }
    }

    public function change_order($category_id = '') {
        $data['iListId'] = $category_id;
        $data['title'] = $this->config->item('site_name') . ' - Product Management';
        $data['category_data'] = $this->Category_model->get_activeCategories();
        $aProducts = array();
        if ($category_id != '') {
            $aProducts = $this->Products_model->get_category_products($category_id);
        }
        $data['products_data'] = $aProducts;
        //  $data['products_data'] = $this->Products_model->get_category_products($category_id);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/products/change_order', $data);
        $this->load->view('admin/templates/footer_draggble');
    }

    public function update_order() {
        if ($this->input->post()) {
            $sProductId = $this->security->xss_clean($this->input->post('ids'));
            if ($sProductId != '') {
                $idArray = explode(",", $sProductId);
                $count = 1;
                foreach ($idArray as $id) {
                    $post_data = array(
                        'product_orderno' => $count,
                        'product_updateddate' => date('Y-m-d H:i:s')
                    );
                    $this->Products_model->update_order($id, $post_data);
                    $count ++;
                }
            }
            $this->session->set_flashdata('product', array('message' => 'Products reordered successfully.', 'icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
        }
    }

    public function discard($iListId) {
        $live_product_data = $this->Products_model->get_products($iListId);
        $live_product_categories = $this->Products_model->get_product_category('rds_product_categories', $iListId);
        $live_product_photos = $this->Products_model->get_product_photo('rds_product_photos', $iListId);
        $live_product_specifications = $this->Products_model->get_product_data('rds_product_features', $iListId, '');

        //UPDATE PRODUCT
        $arrProduct = array(
            "product_modelno" => $live_product_data["product_modelno"],
            "product_name" => $live_product_data["product_name"],
            "producr_cover_image" => $live_product_data["producr_cover_image"],
            "product_description" => $live_product_data["product_description"],
            "product_isFeatured" => $live_product_data["product_isFeatured"],
            "product_status" => $live_product_data["product_status"],
            "product_updateddate" => date('Y-m-d H:i:s')
        );
        $this->Products_model->update_product($iListId, $arrProduct, '_rds_products');
        //UPDATE CATEGORIES
        $this->Products_model->delete_product_category('_rds_product_categories', $iListId);
        if (count($live_product_categories) > 0) {
            for ($cat = 0; $cat < count($live_product_categories); $cat++) {
                $aCatProducts1 = array(
                    "product_id" => $iListId,
                    "category_id" => $live_product_categories[$cat]["category_id"],
                    "product_orderno" => $live_product_categories[$cat]["product_orderno"],
                    "product_category_createddate" => date('Y-m-d H:i:s'),
                    "product_updateddate" => date('Y-m-d H:i:s')
                );
                $cattid = $this->Products_model->create_product_data($aCatProducts1, '_rds_product_categories');
            }
        }

        //UPDATE PHOTOS
        $this->Products_model->delete_product_details('_rds_product_photos', $iListId, 'product_id');
        if (count($live_product_photos) > 0) {
            for ($ph = 0; $ph < count($live_product_photos); $ph++) {
                $aPhotos = array(
                    "product_id" => $iListId,
                    "photo_name" => $live_product_photos[$ph]["photo_name"],
                    "photo_createddate" => date('Y-m-d H:i:s'),
                    "photo_updateddate" => date('Y-m-d H:i:s')
                );
                $this->Products_model->create_product($aPhotos, '_rds_product_photos');
            }
        }
        //UPDATE SPECS / OPTIONS
        $this->Products_model->delete_product_details('_rds_product_features', $iListId, 'product_id');
        if (count($live_product_specifications) > 0) {
            for ($sp = 0; $sp < count($live_product_specifications); $sp++) {
                $spArray = array(
                    "product_id" => $iListId,
                    "feature_category" => $live_product_specifications[$sp]["feature_category"],
                    "feature_title" => $live_product_specifications[$sp]["feature_title"],
                    "feature_description" => $live_product_specifications[$sp]["feature_description"],
                    "feature_createddate" => date('Y-m-d H:i:s'),
                    "feature_updateddate" => date('Y-m-d H:i:s')
                );
                $iPrdOptId_draft = $this->Products_model->create_product_data($spArray, '_rds_product_features');
                //GET PHOTOS
                $aSpPhoto = $this->Products_model->get_product_spec_photos('rds_product_feature_photo', $live_product_specifications[$sp]["product_feature_id"], 'specification');
                if (count($aSpPhoto) > 0) {
                    for ($spi = 0; $spi < count($aSpPhoto); $spi++) {
                        $spPhoto = array(
                            "feature_id" => $iPrdOptId_draft,
                            "product_id" => $iListId,
                            "image_name" => $aSpPhoto[$spi]["image_name"],
                            "product_feature_photo_createddate" => date('Y-m-d H:i:s'),
                            "product_feature_photo_updateddate" => date('Y-m-d H:i:s')
                        );
                        $this->Products_model->create_product_data($spPhoto, '_rds_product_feature_photo');
                    }
                }
            }
        }
        $message = array('message' => "Draft discarded successfully.", 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-danger alert-dismissible');
        $this->session->set_flashdata('products', $message);
        redirect('admin/products/update_draft/' . $iListId);
    }

    public function add_new() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $iListId = $iListId + 1;
            $data['iListId'] = $iListId;
            $sContent = $this->load->view('admin/products/add_new', $data, TRUE);
            $status = array("data" => $sContent);
            echo json_encode($status);
        }
    }

    public function add_new_option_row() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $iListId = $iListId + 1;
            $data['iListId'] = $iListId;
            $sContent = $this->load->view('admin/products/add_new_option', $data, TRUE);
            $status = array("data" => $sContent);
            echo json_encode($status);
        }
    }

    public function uploadPhotos() {
        $this->load->helper('form');
        $this->load->helper('string');
        $arFiles = array();
        if (!is_array($_FILES["file_image"]["name"])) { //single file
            $config['file_name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES["file_image"]["name"];
            $config['upload_path'] = "./uploads/products/photos/";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_size'] = "500000";
            //$config['max_width']     =   "1920";
            //  $config['max_height']    =   "1280";
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("file_image")) {
                echo $this->upload->display_errors();
            } else {
                $finfo = $this->upload->data();
                echo $finfo['file_name'];
            }
        } else {
            $fileCount = count($_FILES["file_image"]["name"]);
            for ($i = 0; $i < $fileCount; $i++) {
                $_FILES['prdFile']['name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES['file_image']['name'][$i];
                $_FILES['prdFile']['type'] = $_FILES['file_image']['type'][$i];
                $_FILES['prdFile']['tmp_name'] = $_FILES['file_image']['tmp_name'][$i];
                $_FILES['prdFile']['error'] = $_FILES['file_image']['error'][$i];
                $_FILES['prdFile']['size'] = $_FILES['file_image']['size'][$i];

                $config['upload_path'] = "./uploads/products/photos/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "500000";
                // $config['max_width']     =   "4000";
                //$config['max_height']    =   "2000";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("prdFile")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    echo $finfo['file_name'];
                }
            }
        }
    }

    public function uploadOpImages() {
        $this->load->helper('form');
        $this->load->helper('string');
        $arFiles = array();
        if (!is_array($_FILES["file_option"]["name"])) { //single file
            $config['file_name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES["file_option"]["name"];
            $config['upload_path'] = "./uploads/products/options/";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_size'] = "500000";
            //$config['max_width']     =   "1920";
            //  $config['max_height']    =   "1280";
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("file_option")) {
                echo $this->upload->display_errors();
            } else {
                $finfo = $this->upload->data();
                echo $finfo['file_name'];
            }
        } else {
            $fileCount = count($_FILES["file_option"]["name"]);
            for ($i = 0; $i < $fileCount; $i++) {
                $_FILES['prdFile']['name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES['file_option']['name'][$i];
                $_FILES['prdFile']['type'] = $_FILES['file_option']['type'][$i];
                $_FILES['prdFile']['tmp_name'] = $_FILES['file_option']['tmp_name'][$i];
                $_FILES['prdFile']['error'] = $_FILES['file_option']['error'][$i];
                $_FILES['prdFile']['size'] = $_FILES['file_option']['size'][$i];

                $config['upload_path'] = "./uploads/products/options/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "500000";
                // $config['max_width']     =   "4000";
                //$config['max_height']    =   "2000";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("prdFile")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    echo $finfo['file_name'];
                }
            }
        }
    }

    public function uploadSpImages() {
        $this->load->helper('form');
        $this->load->helper('string');
        $arFiles = array();
        if (!is_array($_FILES["file_specification"]["name"])) { //single file
            $config['file_name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES["file_specification"]["name"];
            $config['upload_path'] = "./uploads/products/specifications/";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_size'] = "500000";
            //$config['max_width']     =   "1920";
            //  $config['max_height']    =   "1280";
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("file_specification")) {
                echo $this->upload->display_errors();
            } else {
                $finfo = $this->upload->data();
                echo $finfo['file_name'];
            }
        } else {
            $fileCount = count($_FILES["file_specification"]["name"]);
            for ($i = 0; $i < $fileCount; $i++) {
                $_FILES['prdFile']['name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES['file_specification']['name'][$i];
                $_FILES['prdFile']['type'] = $_FILES['file_specification']['type'][$i];
                $_FILES['prdFile']['tmp_name'] = $_FILES['file_specification']['tmp_name'][$i];
                $_FILES['prdFile']['error'] = $_FILES['file_specification']['error'][$i];
                $_FILES['prdFile']['size'] = $_FILES['file_specification']['size'][$i];

                $config['upload_path'] = "./uploads/products/specifications/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "500000";
                // $config['max_width']     =   "4000";
                //$config['max_height']    =   "2000";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("prdFile")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    echo $finfo['file_name'];
                }
            }
        }
    }

    public function update_product_data() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $sTitle = $this->input->post('title');
            $sDescription = $this->input->post('desc');
            $aOption1 = array(
                "feature_title" => $sTitle,
                "feature_description" => $sDescription,
                "feature_updateddate" => date('Y-m-d H:i:s')
            );
            $this->Products_model->update_product_specs('rds_product_features', $iListId, $aOption1);
            $this->Products_model->update_product_specs('_rds_product_features', $iListId, $aOption1);

            $status = array("data" => 'done');
            echo json_encode($status);
        }
    }

    public function update_draft_data() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $sTitle = $this->input->post('title');
            $sDescription = $this->input->post('desc');
            $aOption1 = array(
                "feature_title" => $sTitle,
                "feature_description" => $sDescription,
                "feature_updateddate" => date('Y-m-d H:i:s')
            );
            $this->Products_model->update_product_specs('_rds_product_features', $iListId, $aOption1);

            $status = array("data" => 'done');
            echo json_encode($status);
        }
    }

    public function remove_draft_data() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $sType = $this->input->post('type');
            $this->Products_model->delete_product_data('_rds_product_features', $iListId);
            $status = array("data" => 'done');
            echo json_encode($status);
        }
    }

    public function remove_product_data() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $sType = $this->input->post('type');
            $this->Products_model->delete_product_data('_rds_product_features', $iListId);
            $this->Products_model->delete_product_data('rds_product_features', $iListId);
            $status = array("data" => 'done');
            echo json_encode($status);
        }
    }

    public function remove_draft_photo() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $this->Products_model->delete_product_photo('_rds_product_photos', $iListId);
            $status = array("data" => 'done');
            echo json_encode($status);
        }
    }

    public function remove_product_photo() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $this->Products_model->delete_product_photo('rds_product_photos', $iListId);
            $this->Products_model->delete_product_photo('_rds_product_photos', $iListId);
            $status = array("data" => 'done');
            echo json_encode($status);
        }
    }

    public function uploadProductPhotos() {
        $this->load->helper('form');
        $this->load->helper('string');
        $product_id = $this->input->post("product_id");
        $arFiles = array();
        if (!is_array($_FILES["file_prd_photo"]["name"])) { //single file
            $config['file_name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES["file_prd_photo"]["name"];
            $config['upload_path'] = "./uploads/products/photos/";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_size'] = "500000";
            //$config['max_width']     =   "1920";
            //  $config['max_height']    =   "1280";
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("file_prd_photo")) {
                echo $this->upload->display_errors();
            } else {
                $finfo = $this->upload->data();
                $aPhotos = array(
                    "product_id" => $product_id,
                    "photo_name" => $finfo['file_name'],
                    "photo_createddate" => date('Y-m-d H:i:s'),
                    "photo_updateddate" => date('Y-m-d H:i:s')
                );
                $this->Products_model->create_product($aPhotos, 'rds_product_photos');
                $this->Products_model->create_product($aPhotos, '_rds_product_photos');
            }
        } else {
            $fileCount = count($_FILES["file_prd_photo"]["name"]);
            for ($i = 0; $i < $fileCount; $i++) {
                $_FILES['prdFile']['name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES['file_prd_photo']['name'][$i];
                $_FILES['prdFile']['type'] = $_FILES['file_prd_photo']['type'][$i];
                $_FILES['prdFile']['tmp_name'] = $_FILES['file_prd_photo']['tmp_name'][$i];
                $_FILES['prdFile']['error'] = $_FILES['file_prd_photo']['error'][$i];
                $_FILES['prdFile']['size'] = $_FILES['file_prd_photo']['size'][$i];

                $config['upload_path'] = "./uploads/products/photos/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "500000";
                // $config['max_width']     =   "4000";
                //$config['max_height']    =   "2000";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("prdFile")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    //echo $finfo['file_name'];
                    $aPhotos = array(
                        "product_id" => $product_id,
                        "photo_name" => $finfo['file_name'],
                        "photo_createddate" => date('Y-m-d H:i:s'),
                        "photo_updateddate" => date('Y-m-d H:i:s')
                    );
                    $this->Products_model->create_product($aPhotos, 'rds_product_photos');
                    $this->Products_model->create_product($aPhotos, '_rds_product_photos');
                }
            }
        }
    }

    public function uploadDraftPhotos() {
        $this->load->helper('form');
        $this->load->helper('string');
        $product_id = $this->input->post("product_id");
        $arFiles = array();
        if (!is_array($_FILES["file_prd_photo"]["name"])) { //single file
            $config['file_name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES["file_prd_photo"]["name"];
            $config['upload_path'] = "./uploads/products/photos/";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_size'] = "500000";
            //$config['max_width']     =   "1920";
            //  $config['max_height']    =   "1280";
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("file_prd_photo")) {
                echo $this->upload->display_errors();
            } else {
                $finfo = $this->upload->data();
                $aPhotos = array(
                    "product_id" => $product_id,
                    "photo_name" => $finfo['file_name'],
                    "photo_createddate" => date('Y-m-d H:i:s'),
                    "photo_updateddate" => date('Y-m-d H:i:s')
                );
                $this->Products_model->create_product($aPhotos, '_rds_product_photos');
            }
        } else {
            $fileCount = count($_FILES["file_prd_photo"]["name"]);
            for ($i = 0; $i < $fileCount; $i++) {
                $_FILES['prdFile']['name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES['file_prd_photo']['name'][$i];
                $_FILES['prdFile']['type'] = $_FILES['file_prd_photo']['type'][$i];
                $_FILES['prdFile']['tmp_name'] = $_FILES['file_prd_photo']['tmp_name'][$i];
                $_FILES['prdFile']['error'] = $_FILES['file_prd_photo']['error'][$i];
                $_FILES['prdFile']['size'] = $_FILES['file_prd_photo']['size'][$i];

                $config['upload_path'] = "./uploads/products/photos/";
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "500000";
                // $config['max_width']     =   "4000";
                //$config['max_height']    =   "2000";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("prdFile")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    //echo $finfo['file_name'];
                    $aPhotos = array(
                        "product_id" => $product_id,
                        "photo_name" => $finfo['file_name'],
                        "photo_createddate" => date('Y-m-d H:i:s'),
                        "photo_updateddate" => date('Y-m-d H:i:s')
                    );
                    $this->Products_model->create_product($aPhotos, '_rds_product_photos');
                }
            }
        }
    }

    public function uploadPrdSpPhoto() {
        $this->load->helper('form');
        $this->load->helper('string');
        $product_id = $this->input->post("product_id");
        $feature_id = $this->input->post("feature_id");
        $product_type = $this->input->post("p_type");
        $feature_type = $this->input->post("type");
        $UploadPath = '';
        if ($feature_type == 'sp') {
            $UploadPath = "./uploads/products/specifications/";
        } else {
            $UploadPath = "./uploads/products/options/";
        }
        $arFiles = array();
        if (!is_array($_FILES["file_sp_photo"]["name"])) { //single file
            $config['file_name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES["file_sp_photo"]["name"];
            $config['upload_path'] = $UploadPath;
            $config['allowed_types'] = "*";
            //$config['max_size']      =   "500000";
            //$config['max_width']     =   "1920";
            //  $config['max_height']    =   "1280";
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("file_sp_photo")) {
                echo $this->upload->display_errors();
                die("dd");
            } else {

                $finfo = $this->upload->data();
                $aOpPhoto = array(
                    "feature_id" => $feature_id,
                    "product_id" => $product_id,
                    "image_name" => $finfo['file_name'],
                    "product_feature_photo_createddate" => date('Y-m-d H:i:s'),
                    "product_feature_photo_updateddate" => date('Y-m-d H:i:s')
                );
                if ($product_type == "P") {
                    $this->Products_model->create_product_data($aOpPhoto, 'rds_product_feature_photo');
                    $this->Products_model->create_product_data($aOpPhoto, '_rds_product_feature_photo');
                } else {
                    $this->Products_model->create_product_data($aOpPhoto, '_rds_product_feature_photo');
                }
            }
        } else {
            $fileCount = count($_FILES["file_sp_photo"]["name"]);
            for ($i = 0; $i < $fileCount; $i++) {
                $_FILES['prdFile']['name'] = strtotime(date("Y-m-d H:i:s")) . "_" . $_FILES['file_sp_photo']['name'][$i];
                $_FILES['prdFile']['type'] = $_FILES['file_sp_photo']['type'][$i];
                $_FILES['prdFile']['tmp_name'] = $_FILES['file_sp_photo']['tmp_name'][$i];
                $_FILES['prdFile']['error'] = $_FILES['file_sp_photo']['error'][$i];
                $_FILES['prdFile']['size'] = $_FILES['file_sp_photo']['size'][$i];

                $config['upload_path'] = $UploadPath;
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['max_size'] = "500000";
                // $config['max_width']     =   "4000";
                //$config['max_height']    =   "2000";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("prdFile")) {
                    echo $this->upload->display_errors();
                } else {
                    $finfo = $this->upload->data();
                    //echo $finfo['file_name'];
                    $aOpPhoto = array(
                        "feature_id" => $feature_id,
                        "product_id" => $product_id,
                        "image_name" => $finfo['file_name'],
                        "product_feature_photo_createddate" => date('Y-m-d H:i:s'),
                        "product_feature_photo_updateddate" => date('Y-m-d H:i:s')
                    );
                    if ($product_type == "P") {
                        $this->Products_model->create_product_data($aOpPhoto, 'rds_product_feature_photo');
                        $this->Products_model->create_product_data($aOpPhoto, '_rds_product_feature_photo');
                    } else {
                        $this->Products_model->create_product_data($aOpPhoto, '_rds_product_feature_photo');
                    }
                }
            }
        }
    }

    public function uploadPrdRemovePhoto() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $type = $this->input->post('type');
            if ($type == "P") {
                $this->Products_model->delete_feature_photo('rds_product_feature_photo', $iListId);
                $this->Products_model->delete_feature_photo('_rds_product_feature_photo', $iListId);
            } else {
                $this->Products_model->delete_feature_photo('_rds_product_feature_photo', $iListId);
            }
            $status = array("data" => 'done');
            echo json_encode($status);
        }
    }

    public function chk_modelno() {
        if ($this->input->post()) {
            $iListId = $this->input->post('id');
            $sModelNo = $this->input->post('model_no');
            $iCount = $this->Products_model->chk_duplicateModelno($iListId, $sModelNo);
            $status = array("data" => $iCount);
            echo json_encode($status);
        }
    }

}
