<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Configuration_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function update_config($field_name,$id, $data) {
        $this->db->where($field_name, $id);
        return $this->db->update('rds_configuration', $data);
    }
    public function get_config($field_name,$field_value)
    {
        $query = $this->db->get_where('rds_configuration', array($field_name => $field_value));
        return $query->row_array();
    }
}