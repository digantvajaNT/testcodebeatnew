<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contry_state_model extends CI_Model
{

	public function __construct()
	{
			$this->load->database();
	}

    public function get_country($ctr_id = FALSE)
    {
        if ($ctr_id === FALSE)
		{
            $this->db->select('ctr_id,ctr_code,ctr_name');
            $this->db->from('tbl_countries');
            //$this->db->where("ctr_id = ".$ctr_id);
            //$this->db->orderby('asc')
            $query = $this->db->get();
            return $query->result_array();
        }
    }
	public function get_ctrCode($ctr_name)
    {
        if ($ctr_name)
		{
            $this->db->select('ctr_id,ctr_code,ctr_name');
            $this->db->from('tbl_countries');
            $this->db->where("ctr_name = '".$ctr_name."'");
            //$this->db->orderby('asc')
            $query = $this->db->get();
            return $query->row_array();
        }
    }
    public function get_states($ctr_id = FALSE)
    {
        if ($ctr_id === FALSE)
		{
            $this->db->select('states_id,states_code,states_name');
            $this->db->from('tbl_states');           
            $query = $this->db->get();
            return $query->result_array();
        }
        $query = $this->db->get_where('tbl_states',array('states_ctr_code' => $ctr_id));
		return $query->result_array();	
    }
}