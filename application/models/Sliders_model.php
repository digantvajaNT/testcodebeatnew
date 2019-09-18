<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sliders_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function create_slider($data)
    {
        return $this->db->insert('nc_sliders', $data);
    }
    public function delete_slider($id)
    {
        $this->db->where('slider_id', $id);
        $result = $this->db->delete('nc_sliders');
        return $result;
    }
    public function update_slider($id, $data) {
        $this->db->where('slider_id', $id);
        return $this->db->update('nc_sliders', $data);
    }
	
	 public function getaboutus() {
        $this->db->select('*');
        $this->db->from('nc_about_page');
		$query = $this->db->get();
        return $query->result_array();
    }
public function user_search($search_book){
                 $this->db->like('product_name', $search_book);
                 $this->db->or_like('product_title', $search_book);
                 $this->db->or_like('product_description', $search_book);
                 $query = $this->db->get('rds_products');
        return $query->result_array();
  }
	
	public function service_search($search_book){

                 $this->db->like('category_name', $search_book);
                 $this->db->or_like('category_description', $search_book);
                 $query = $this->db->get('rds_categories');
        return $query->result_array();
  }
  
	 public function getservices() {
        $this->db->select('*');
        $this->db->from('nc_board_page');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	 public function getclients() {
        $this->db->select('*');
        $this->db->from('nc_certificates');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	public function getcategory() {
        $this->db->select('*');
        $this->db->from('rds_categories');
		$this->db->where('category_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	public function getproduct_details() {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('category_id', '1');
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	public function getproduct_details_education() {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('category_id', '2');
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	public function getproduct_details_health() {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('category_id', '3');
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	public function getproduct_details_higher() {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('category_id', '4');
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	public function getproduct_details_historical() {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('category_id', '6');
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	public function getproduct_details_industrial() {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('category_id', '7');
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	public function getproduct_details_parks() {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('category_id', '8');
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	public function getproduct_details_public() {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('category_id', '9');
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	public function getproduct_details_residential() {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('category_id', '10');
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_achievement() {
        $this->db->select('*');
        $this->db->from('tbl_achievement');
		$this->db->where('id', '1');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_testimonial() {
        $this->db->select('*');
        $this->db->from('nc_committee_page');
		$query = $this->db->get();
        return $query->result_array();
    }
	
		public function getportfoliodetails($slug) {
        $this->db->select('*');
        $this->db->from('rds_products');
		$this->db->where('product_unique_slug', $slug);
		$query = $this->db->get();
        return $query->result_array();
    }
	
	public function getcategorydetails($id) {
        $this->db->select('*');
        $this->db->from('rds_categories');
		$this->db->where('category_id', $id);
		$query = $this->db->get();
        return $query->result_array();
    }
	
    public function get_slider($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('slider_id, s.product_id, p.product_name,p.producr_cover_image,p.product_unique_slug,
             p.product_description, slider_title, slider_content, slider_image, slider_orderno, slider_status, slider_redirect_link, slider_createddate, slider_updateddate');
            $this->db->from('nc_sliders s');
            $this->db->join('rds_products p', 'p.product_id = s.product_id','left');
            $this->db->order_by("slider_orderno", "ASC");
            $query = $this->db->get();
            return $query->result_array();
        }
        $query = $this->db->get_where('nc_sliders', array('slider_id' => $id));
        return $query->row_array();
    }
    public function get_activesliders()
    {
        $this->db->select('slider_id, s.product_id, s.product_id,s.slider_mob_image, p.product_name,p.producr_cover_image,p.product_unique_slug,
             p.product_description,  slider_title, slider_content, slider_image, slider_orderno, slider_redirect_link');
        $this->db->from('nc_sliders s');
        $this->db->join('rds_products p', 'p.product_id = s.product_id','left');
        $this->db->where('slider_status', 'active');
        $this->db->order_by("slider_orderno", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_MaxOrderno()
    {
        $this->db->select('MAX(slider_orderno) AS "max_orderno"');
        $this->db->from('nc_sliders');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function chk_duplicate($product_id,$iListId = '')
    {
        $this->db->select('slider_id');
        $this->db->from('nc_sliders');
        if($iListId == '') {
            $this->db->where('product_id != "0" AND product_id = "'.$product_id.'"');
        } else {
            $this->db->where('product_id != "0" AND product_id = "'.$product_id.'" AND slider_id <> "'.$iListId.'"');
        }

        $query = $this->db->get();
        return $query->result_array();
    }
}?>