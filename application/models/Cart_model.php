<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart_model extends CI_Model  {
	public function __construct()
	{
		$this->load->database();
	}		
	public function create_data($table_name,$data)
	{
		 $this->db->insert($table_name, $data);
        return $this->db->insert_id();
	}
    public function delete_data($table_name,$field_name, $field_value)
	{
		$this->db->where($field_name, $field_value);
		$result = $this->db->delete($table_name);
		return $result;
	}
    public function update_data($table_name, $field_name, $field_value, $data) {
		$this->db->where($field_name, $field_value);
		return $this->db->update($table_name, $data);
	}
	public function check_duplicateItemExistinCart($product_id,$user_id,$cart_id)
	{
		$this->db->select('cart_item_id');
		$this->db->from('rds_cart_items c1');
		$this->db->join('rds_cart c', 'c.cart_id = c1.cart_id','left');
		$this->db->where('c1.product_id', $product_id);
		$this->db->where('c.user_id', $user_id);
		$this->db->where('c.cart_id', $cart_id);
		$query = $this->db->get();
        return $query->result_array();
	}
	public function get_cartData($user_id,$status = '')
	{
		$this->db->select('cart_id, user_id, cart_status, cart_created_date, cart_updated_date, cart_comments, order_unique_id');
		$this->db->from('rds_cart');
		if($status == '')
		{
			$this->db->where('cart_status', 'pending');
		} else {
			$this->db->where('cart_status', $status);
		}
		$this->db->where('user_id', $user_id);
		$this->db->order_by("cart_updated_date", "DESC");
		$query = $this->db->get();
        return $query->row_array();
	} 
	public function get_cartItems($cart_id) {
		$this->db->select('cart_item_id, cart_id, c.product_id, product_quantity, comments, product_name, product_modelno,
		product_unique_slug, producr_cover_image');
		$this->db->from('rds_cart_items c');
		$this->db->join('rds_products p', 'p.product_id = c.product_id','left');
		$this->db->where('cart_id', $cart_id);
		$this->db->where('product_status', 'active');
		$query = $this->db->get();
        return $query->result_array();
	}
	public function generate_orderno()
	{
		$this->db->select('MAX(CAST(SUBSTRING_INDEX(order_unique_id, "-", -1) AS UNSIGNED))  as "max_order"');
		$this->db->from('rds_cart');
		$this->db->where('cart_status = "delivered"');
		$query = $this->db->get();
		#echo $this->db->last_query();die("123");
		$aMaxorder = $query->row_array();
		return  $aMaxorder;
	}
	public function get_myQuotes($user_id) {
		$this->db->select('cart_id, user_id, cart_status, cart_created_date, cart_updated_date, cart_comments, order_unique_id');
		$this->db->from('rds_cart');
		$this->db->where('cart_status', 'delivered');
		$this->db->where('user_id', $user_id);
		$this->db->order_by("cart_updated_date", "DESC");
		$query = $this->db->get();
        return $query->result_array();
	}
	public function get_cartinfo($cart_id) {
		$query = $this->db->get_where('rds_cart', array('cart_id' => $cart_id));
        return $query->row_array();
	}
}