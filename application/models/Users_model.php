<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model  {
	public function __construct()
	{
		$this->load->database();
	}		
	public function create_user($data)
	{
		 $this->db->insert('rds_users', $data);
        return $this->db->insert_id();
	}
    public function delete_user($id)
	{
		$this->db->where('user_id', $id);
		$result = $this->db->delete('rds_users');
		return $result;
	}
    public function update_user($id, $data) {
		$this->db->where('user_id', $id);
		return $this->db->update('rds_users', $data);
	}
	public function chk_duplicate($sEmail,$iListId = '')
    {
        $this->db->select('user_id');
		$this->db->from('rds_users');
        $this->db->where('user_emailaddress = "'.$sEmail.'" AND user_status <> "deleted"');
        if($iListId != '')
        {
            $this->db->where('user_id <> '.$iListId);
        } 
        $query = $this->db->get();
		$result = $query->result_array();
		return count($result);
    }
	public function login($username, $password) {
		$this->db->select('user_id, user_firstname, user_lastname, user_emailaddress, user_status');
		$this->db->from('rds_users');
		$this->db->where('user_emailaddress', $username );
		$this->db->where( 'user_password', $password );
		//echo $this->db->last_query();	
		$this->db->where('user_status <> "deleted"');
		$query = $this->db->get();		
		$login = $query->row_array();	
		return $login;
	}
	public function get_user($id = FALSE)
	{		
		if ($id === FALSE)
		{			
		}
		$query = $this->db->get_where('rds_users', array('user_id' => $id));
		return $query->row_array();
	}
	public function forgot_pass($sEmail) {
		$this->db->select('user_id, user_firstname, user_lastname, user_emailaddress, user_status');
		$this->db->from('rds_users');
		$this->db->where('user_emailaddress', $sEmail );		
		$this->db->where('user_status <> "deleted"');
		$login = $this->db->get()->row_array();
		 
		return $login;
	}
	public function reset_password($code) {
		$this->db->select('user_id, user_firstname, user_lastname, user_emailaddress, user_status');
		$this->db->from('rds_users');
		$this->db->where('user_verifycode', $code);
		$this->db->where( 'user_status', 'Active' );
		$user_data = $this->db->get()->row_array();
		 
		return $user_data;
	}
    public function check_OldPassword($iListId,$sNewPass)
	{
		$this->db->select('user_id');
		$this->db->from('rds_users');
		$this->db->where('user_id = "'.$iListId.'" AND user_password = "'.$sNewPass.'"');
		$count = $this->db->count_all_results();
		return $count;
	}
	public function get_users($id = FALSE) {
		 if ($id === FALSE)
		 {
		 	$this->db->select('user_id, user_firstname, user_lastname, user_emailaddress, user_contactno, 
			user_department, user_facility_name, user_account_no, user_created_date, user_updated_date, user_status');
			$this->db->from('rds_users');		
			$this->db->where( 'user_status <> "deleted"' );
			$user_data = $this->db->get()->result_array();		 
			return $user_data;
		 }
		$query = $this->db->get_where('rds_users', array('user_id' => $id));
        return $query->row_array();
	}
	public function get_totalUsers()
    {
        $this->db->select('user_id');
        $this->db->from('rds_users');
		$this->db->where( 'user_status <> "deleted"' );
        $count = $this->db->count_all_results();
        return $count;
    }
}