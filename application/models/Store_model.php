<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Store_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function create_area($data)
    {
         return $this->db->insert('nc_area', $data);
     }
	 public function create_locator($data)
    {
         return $this->db->insert('nc_storelocator', $data);
     }
     public function delete_category($id)
    {
         $this->db->where('tb_area_id', $id);
         $result = $this->db->delete('nc_area');
         return $result;
     }
	 public function delete_locator($id)
    {
         $this->db->where('id', $id);
         $result = $this->db->delete('nc_storelocator');
         return $result;
     }
     public function update_area($id, $data) {
         $this->db->where('tb_area_id', $id);
         return $this->db->update('nc_area', $data);
    }

	public function update_Store($id, $data) {
         $this->db->where('id', $id);
         return $this->db->update('nc_storelocator', $data);
    }
     public function get_area($id = FALSE)
     {
         if ($id === FALSE)
         {
       
             $query = $this->db->get('nc_area');
             return $query->result_array();
         }
		 
         $query = $this->db->get_where('nc_area', array('tb_area_id' => $id));
         return $query->row_array();
     }
	 public function get_store($id = FALSE)
     {
         if ($id === FALSE)
         {
          $this->db->select('s.id, s.locator_name, 
            s.lovator_add, s.locator_mno1, s.locator_mno2, a.tb_name, 
           ');
        $this->db->from('nc_storelocator s,nc_area a');
        $this->db->where("s.Area_id = a.tb_area_id");
             $query = $this->db->get();
             return $query->result_array();
         }
		 
         $query = $this->db->get_where('nc_storelocator', array('id' => $id));
         return $query->row_array();
     } 
	 public function get_store1($id = FALSE)
     {
       if ($id === FALSE)
         {
       
             $query = $this->db->get('nc_storelocator');
             return $query->result_array();
         }
       
             $query = $this->db->get_where('nc_storelocator', array('Area_id' => $id));
             return $query->result_array();
      
     }
	
    // public function get_activeCategories()
    // {
        // $this->db->select('category_id, category_name, category_orderno,category_slug, category_status, category_createddate, category_updateddate');
        // $this->db->from('rds_categories');
        // $this->db->where('category_status', 'active');
        // $this->db->order_by("category_orderno", "ASC");
        // $query = $this->db->get();
        // return $query->result_array();
    // }
	
	// function getCityDepartment($postData){
    // $response = array();
 // $string=implode(",",$postData);

    // // Select record
    // $this->db->select('category_id,category_name');
    // $this->db->where('ManuCtegory_id', $string);
    // $q = $this->db->get('rds_categories');
    // $response = $q->result_array();

    // return $response;
  // }
    // public function get_MaxOrderno()
    // {
        // $this->db->select('MAX(category_orderno) AS "max_orderno"');
        // $this->db->from('rds_categories');
        // $query = $this->db->get();
        // return $query->result_array();
    // }
    // public function get_categoryId($slug)
    // {
        // $this->db->select('category_id, category_name');
        // $this->db->from('rds_categories');
        // $this->db->where('category_slug', $slug);
        // $query = $this->db->get();
        // return $query->row_array();
    // }
	// public function get_categoryId1($category)
    // {
        // $this->db->select('category_id, category_name');
        // $this->db->from('rds_categories');
        // $this->db->where('category_id', $category);
        // $query = $this->db->get();
        // return $query->row_array();
    // }
    // public function get_totalCategories()
    // {
        // $this->db->select('category_id');
        // $this->db->from('rds_categories');
        // $count = $this->db->count_all_results();
        // return $count;
    // }

}?>