<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function create_category($data)
    {
        return $this->db->insert('rds_categories', $data);
    }
    public function delete_category($id)
    {
        $this->db->where('category_id', $id);
        $result = $this->db->delete('rds_categories');
        return $result;
    }
    public function update_category($id, $data) {
        $this->db->where('category_id', $id);
        return $this->db->update('rds_categories', $data);
    }
    public function get_category($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('c.category_id, category_name, category_description,category_orderno,category_slug, 
            category_status, category_createddate, category_updateddate, (SELECT COUNT(*) FROM 
            rds_product_categories WHERE category_id = c.category_id) AS "live_products",
            (SELECT COUNT(*) FROM 
            _rds_product_categories WHERE category_id = c.category_id) AS "draft_products"');
            $this->db->from('rds_categories c');
            $this->db->order_by("category_orderno", "ASC");
            $query = $this->db->get();
            return $query->result_array();
        }
        $query = $this->db->get_where('rds_categories', array('category_id' => $id));
        return $query->row_array();
    }
	
    public function get_activeCategories()
    {
        $this->db->select('category_id, category_name, category_orderno,category_slug, category_status, category_createddate, category_updateddate');
        $this->db->from('rds_categories');
        $this->db->where('category_status', 'active');
        $this->db->order_by("category_orderno", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }
	
	function getCityDepartment($postData){
    $response = array();
    //print_r($postData);exit();
    $string=implode(",",$postData);
    //print_r($string);exit();
    // Select record
    $this->db->select('category_id,category_name');
    $this->db->where('ManuCtegory_id', $postData);
    $q = $this->db->get('rds_categories');
    $response = $q->result_array();
   // echo $this->db->last_query();exit();
    return $response;
  }
    public function get_MaxOrderno()
    {
        $this->db->select('MAX(category_orderno) AS "max_orderno"');
        $this->db->from('rds_categories');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_categoryId($slug)
    {
        $this->db->select('category_id, category_name');
        $this->db->from('rds_categories');
        $this->db->where('category_id', $slug);
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        return $query->row_array();
    }
	public function get_categoryId1($category)
    {
        $this->db->select('category_id, category_name');
        $this->db->from('rds_categories');
        $this->db->where('category_id', $category);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_totalCategories()
    {
        $this->db->select('category_id');
        $this->db->from('rds_categories');
        $count = $this->db->count_all_results();
        return $count;
    }

}?>