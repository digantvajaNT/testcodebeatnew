<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function create_news($data)
    {
        return $this->db->insert('rds_news', $data);
    }
    public function delete_news($id)
    {
        $this->db->where('news_id', $id);
        $result = $this->db->delete('rds_news');
        return $result;
    }
    public function update_news($id, $data) {
        $this->db->where('news_id', $id);
        return $this->db->update('rds_news', $data);
    }
	public function get_totalNews()
    {
        $this->db->select('news_id');
        $this->db->from('rds_news');
        $count = $this->db->count_all_results();
        return $count;
    }
	public function get_MaxOrderno()
    {
        $this->db->select('MAX(news_orderno) AS "max_orderno"');
        $this->db->from('rds_news');
        $query = $this->db->get();
        return $query->result_array();
    }
	public function get_activeNews($sOrderByField = '',$sOrderby = '', $sLimit = '')
    {
        $this->db->select('news_id, news_title, news_unique_url,news_content, news_image, news_status');
        $this->db->from('rds_news');
        $this->db->where('news_status', 'active');
		if($sOrderByField != '' && $sOrderby != '') {
			 $this->db->order_by($sOrderByField, $sOrderby);
		} else {
			 $this->db->order_by("news_orderno", "ASC");
		}
		if($sLimit != '') {
			$start = 0;
			$this->db->limit($sLimit, $start);
		}
        
        $query = $this->db->get();
        return $query->result_array();
    }
	public function get_news($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('news_id, news_title, news_unique_url,news_content, news_image, news_status, news_createddate, news_updateddate, news_orderno');
            $this->db->from('rds_news');
            $this->db->order_by("news_orderno", "ASC");
            $query = $this->db->get();
            return $query->result_array();
        }
        $query = $this->db->get_where('rds_news', array('news_id' => $id));
        return $query->row_array();
    }
	public function get_newsByslug($slug)
    {        
        $query = $this->db->get_where('rds_news', array('news_unique_url' => $slug));
        return $query->row_array();
    }
}