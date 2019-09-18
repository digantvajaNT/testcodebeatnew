<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Events_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function create_event($data)
    {
        return $this->db->insert('rds_events', $data);
    }
    public function delete_event($id)
    {
        $this->db->where('event_id', $id);
        $result = $this->db->delete('rds_events');
        return $result;
    }
    public function update_event($id, $data) {
        $this->db->where('event_id', $id);
        return $this->db->update('rds_events', $data);
    }
	public function get_totalEvents()
    {
        $this->db->select('event_id');
        $this->db->from('rds_events');
        $count = $this->db->count_all_results();
        return $count;
    }
	public function get_MaxOrderno()
    {
        $this->db->select('MAX(event_orderno) AS "max_orderno"');
        $this->db->from('rds_events');
        $query = $this->db->get();
        return $query->result_array();
    }
	public function get_activeEvents()
    {
        $this->db->select('event_id, event_title, event_unique_url, event_description,event_venue, event_enddate, event_startdate, event_status, event_orderno, event_banner');
        $this->db->from('rds_events');
        $this->db->where('event_status', 'active');
        $this->db->order_by("event_orderno", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }
	public function get_events($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('event_id, event_title, event_unique_url, event_description,event_venue, event_enddate, event_startdate, event_status, event_orderno, event_banner');
            $this->db->from('rds_events');
            $this->db->order_by("event_orderno", "ASC");
            $query = $this->db->get();
            return $query->result_array();
        }
        $query = $this->db->get_where('rds_events', array('event_id' => $id));
        return $query->row_array();
    }
	public function get_eventBySlug($slug)
    {        
        $query = $this->db->get_where('rds_events', array('event_unique_url' => $slug));
        return $query->row_array();
    }
}