<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function create_product($data,$table_name)
    {
        $this->db->insert($table_name, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function create_product_data($data,$table_name)
    {
        $this->db->insert($table_name, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function get_MaxOrderno($cat_id)
    {
        $this->db->select('MAX(product_orderno) AS "max_orderno"');
        $this->db->from('rds_product_categories');
        $this->db->where("category_id = ".$cat_id);
        $query = $this->db->get();
        return $query->row_array();
    }
	public function chk_duplicateModelno($product_id,$model_no)
	{
		$this->db->select('product_id');
		$this->db->from('rds_products');
		$this->db->where('product_modelno = "'.$model_no.'"');
				
		if($product_id != '0')
		{
			$this->db->where('product_id <> "'.$product_id.'"');
		}
	 	$count = $this->db->count_all_results();	
		return $count;
	}
    public function update_product($id, $data,$table_name) {
        $this->db->where('product_id', $id);
        return $this->db->update($table_name, $data);
    }
    public function get_products($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('product_id, product_modelno, product_name, producr_cover_image, product_isFeatured, 
            product_status, (SELECT GROUP_CONCAT(category_name) FROM rds_categories 
            WHERE category_id IN(SELECT category_id FROM 
            rds_products WHERE product_id = p.product_id) ) as category_name');
            $this->db->from('rds_products p');

            $this->db->order_by("product_id", "DESC");
            $query = $this->db->get();
            #echo $this->db->last_query();die("123");
            return $query->result_array();
        }
        $query = $this->db->get_where('rds_products', array('product_id' => $id));
        return $query->row_array();
    }
    public function get_productInfoBySlug($product_slug,$table_name = '') {
        if($table_name == '') {
            $query = $this->db->get_where('rds_products', array('product_unique_slug' => $product_slug));
            return $query->row_array();
        } else {
            $query = $this->db->get_where($table_name, array('product_unique_slug' => $product_slug));
            return $query->row_array();
        }
    }
    public function get_category_products($category_id)
    {
        $this->db->select('p.product_id, p1.product_category_id, 
            product_modelno, product_name, producr_cover_image, product_isFeatured, 
            product_status, 
            (SELECT GROUP_CONCAT(category_name) FROM rds_categories 
            WHERE category_id IN(SELECT category_id FROM 
            rds_product_categories WHERE product_id = p.product_id) ) as category_name');
        $this->db->from('rds_products p,rds_product_categories p1');
        $this->db->where("p1.category_id = ".$category_id);
        $this->db->where("p.product_status = 'Active'  AND p.product_id = p1.product_id");
        $this->db->order_by("p1.product_orderno", "ASC");
        $query = $this->db->get();
        #echo $this->db->last_query();die("123");
        return $query->result_array();
    }
    public function get_activeProducts($category_id = '',$start = 0,$perPage = 12)
    {
    	//$perPage = 4;
        $this->db->select('p.product_id,p.product_description, p1.product_category_id, product_unique_slug,
            product_modelno, product_name, producr_cover_image, product_isFeatured');
        $this->db->from('rds_products p,rds_product_categories p1');
        if($category_id != '') {
            $this->db->where("p1.category_id = ".$category_id);
        }
        $this->db->where("p.product_status = 'Active'  AND p.product_id = p1.product_id");
        $this->db->order_by("p1.product_orderno", "ASC");
        $this->db->limit($perPage,$start);
        $query = $this->db->get();
        //echo $this->db->last_query();die("123");
        return $query->result_array();
    }
	public function get_featuredProducts() {
		$this->db->select('p.product_id, p1.product_category_id, product_unique_slug,
            product_modelno, product_name, product_description, producr_cover_image, product_isFeatured');
        $this->db->from('rds_products p,rds_product_categories p1');
        
        $this->db->where("p.product_status = 'Active' AND p.product_isFeatured = 'yes'  AND p.product_id = p1.product_id");
        $this->db->order_by("p1.product_orderno", "ASC");
        $query = $this->db->get();
        return $query->result_array();
	}
    public function get_draft_data($id = FALSE)
    {
        $query = $this->db->get_where('_rds_products', array('product_id' => $id));
        return $query->row_array();
    }
    public function get_product_category($table_name,$id)
    {
        $query = $this->db->get_where($table_name, array('product_id' => $id));
        return $query->result_array();
    }
    public function  delete_product_category($table_name,$id)
    {
        $this->db->where('product_id', $id);
        $result = $this->db->delete($table_name);
        return $result;
    }
    public function  delete_product_details($table_name,$id,$field_name)
    {
        $this->db->where($field_name, $id);
        $result = $this->db->delete($table_name);
        return $result;
    }
    public function  get_product_data($table_name,$id,$category = '')
    {
        if($category != '') {
            $query = $this->db->get_where($table_name, array('product_id' => $id,'feature_category' => $category));
            return $query->result_array();
        } else {
            $query = $this->db->get_where($table_name, array('product_id' => $id));
            return $query->result_array();
        }

    }
    public function update_product_specs($table_name,$id, $data) {
        $this->db->where('product_feature_id', $id);
        return $this->db->update($table_name, $data);
    }
    public function  delete_product_data($table_name,$id)
    {
        $this->db->where('product_feature_id', $id);
        $result = $this->db->delete($table_name);
        return $result;
    }
    public function  get_product_photo($table_name,$id)
    {
        $query = $this->db->get_where($table_name, array('product_id' => $id));
        return $query->result_array();
    }
    public function  delete_product_photo($table_name,$id)
    {
        $this->db->where('product_photo_id', $id);
        $result = $this->db->delete($table_name);
        return $result;
    }
    public function  delete_feature_photo($table_name,$id)
    {
        $this->db->where('product_feature_photo_id', $id);
        $result = $this->db->delete($table_name);
        return $result;
    }
    public function get_product_spec_photos($table_name,$id,$type)
    {
        $sql = 'SELECT product_feature_photo_id, image_name FROM '.$table_name.' 
                WHERE feature_id  = "'.$id.'"';
        $query = $this->db->query($sql);
        #echo $this->db->last_query();die("123");
        return $query->result_array();
    }
    public function delete_product($fieldname, $id,$table_name)
    {
        $this->db->where($fieldname, $id);
        $result = $this->db->delete($table_name);
        return $result;
    }
    public function update_order($id,$data)
    {
        $this->db->where('product_category_id', $id);
        return $this->db->update('rds_product_categories', $data);
    }
    public function get_totalProducts()
    {
        $this->db->select('product_id');
        $this->db->from('rds_products');
        $count = $this->db->count_all_results();
        return $count;
    }
	public function search_products($term = '')
    {
    	$term = str_replace("/","",strtolower(preg_replace('#[^\w()/.%-&\$]#',"", $term)));
        $this->db->select('product_id, product_unique_slug,
            product_modelno, product_name, producr_cover_image, product_isFeatured');
        $this->db->from('rds_products ');       
        $this->db->where("product_status = 'Active' AND (LOWER(product_modelno) LIKE '%".$term."%' OR LOWER(product_name) LIKE '%".$term."%')");
        #$this->db->order_by("product_orderno", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }
	public function get_activetotalProducts($category_id = '')
    {
        $this->db->select('product_id');
        //$this->db->from('rds_products');
		$this->db->from('rds_products p,rds_product_categories p1');
        if($category_id != '') {
            $this->db->where("p1.category_id = ".$category_id);
        }
		$this->db->where("product_status = 'Active'  AND p.product_id = p1.product_id");
        $count = $this->db->count_all_results();
        return $count;
    }
    
     public function get_productdetail($product_id) {
        $this->db->select('*');
        $this->db->from('rds_products');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        return $query->result_array();
    }
}