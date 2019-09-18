<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function update_user($id, $data) {
        $this->db->where('admin_id', $id);
        return $this->db->update('rds_admin', $data);
    }
    public function login($username, $password) {
        $this->db->select('admin_id,admin_username,admin_firstname,admin_lastname,admin_email');
        $this->db->from('rds_admin');
        $this->db->where('admin_username', $username );
        $this->db->where( 'admin_password', $password );
        $login = $this->db->get()->row_array();

        return $login;
    }
    public function forgot_pwd($email) {
        $this->db->select('admin_id,admin_username,admin_firstname,admin_lastname,admin_email');
        $this->db->from('rds_admin');
        $this->db->where('admin_email', $email);
        $user_data = $this->db->get()->row_array();

        return $user_data;
    }
    public function reset_password($code) {
        $this->db->select('admin_id,admin_username,admin_firstname,admin_lastname,admin_email');
        $this->db->from('rds_admin');
        $this->db->where('admin_code', $code);

        $user_data = $this->db->get()->row_array();

        return $user_data;
    }
    public function get_admindetails($id)
    {
        $query = $this->db->get_where('rds_admin', array('admin_id' => $id));
        return $query->row_array();
    }
    public function check_OldPassword($iListId,$sNewPass)
    {
        $this->db->select('admin_id');
        $this->db->from('rds_admin');
        $this->db->where('admin_id = "'.$iListId.'" AND admin_password = "'.$sNewPass.'"');
        $count = $this->db->count_all_results();
        return $count;
    }
}
