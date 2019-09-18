<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function update_page($field_name, $id, $data) {
        $this->db->where($field_name, $id);
        return $this->db->update('rds_content_pages', $data);
    }

    public function get_page($field_name, $field_value) {
        $query = $this->db->get_where('rds_content_pages', array($field_name => $field_value));
        return $query->row_array();
    }

    public function update_pages($id, $data, $table_name) {
        $id = '1';
        $this->db->where('id', $id);
        return $this->db->update($table_name, $data);
    }

    public function delete_bod($table_name, $id) {
        $this->db->where('id', $id);
        $result = $this->db->delete($table_name);
        return $result;
    }

    public function get_pages($field_value, $table_name) {
        $query = $this->db->get_where($table_name);
        return $query->row_array();
    }

    public function create_user($post_data, $table_name) {

        $this->db->insert($table_name, $post_data);

        return $this->db->insert_id();
    }
	 public function get_nc_contact_us() {
        $this->db->select('*');
        $this->db->from('nc_contact_us');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function get_demo_us() {
        $this->db->select('*');
        $this->db->from('tbl_demo_data');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_career() {
        $this->db->select('*');
        $this->db->from('careers');
		$this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
    
	public function get_faq() {
        $this->db->select('*');
        $this->db->from('faq');
		$this->db->where('status', '1');
		$query = $this->db->get();
        return $query->result_array();
    }
	
    public function get_team() {
        $this->db->select('*');
        $this->db->from('nc_committee_page');

        $query = $this->db->get();
        return $query->result_array();
    }
    
	public function get_teamdetails($id) {
        $this->db->select('*');
        $this->db->from('nc_committee_page');
		$this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_careerdetails($id) {
        $this->db->select('*');
        $this->db->from('careers');
		$this->db->where('c_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
	
    public function get_certificates() {
        $this->db->select('*');
        $this->db->from('nc_certificates');

        $query = $this->db->get();
        return $query->result_array();
    }

	
	public function get_banner() {
        $this->db->select('*');
        $this->db->from('tbl_banner');
		$query = $this->db->get();
        return $query->result_array();
    }

    public function get_office() {
        $this->db->select('*');
        $this->db->from('tbl_office');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
    public function get_committee_annual() {
        $this->db->select('*');
        $this->db->from('nc_committee_page');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_investor_annual() {
        $this->db->select('*');
        $this->db->from('nc_investor');
        $this->db->where('name', 'Annual_Report');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_committee_nomination() {
        $this->db->select('*');
        $this->db->from('nc_committee_page');
        $this->db->where('committee_title', 'Nomination');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_committee_details() {
        $this->db->select('*');
        $this->db->from('nc_committee_page');
        $this->db->where('committee_title', 'Stakeholder');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_committee_audit() {
        $this->db->select('*');
        $this->db->from('nc_committee_page');
        $this->db->where('committee_title', 'Audit_Committee');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_investor_nse() {
        $this->db->select('*');
        $this->db->from('nc_investor');
        $this->db->where('name', 'Nse_Filings');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_investor_finanical() {
        $this->db->select('*');
        $this->db->from('nc_investor');
        $this->db->where('name', 'Financial_Report');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_investor_public() {
        $this->db->select('*');
        $this->db->from('nc_investor');
        $this->db->where('name', 'Public_Issue');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_investor() {
        $this->db->select('*');
        $this->db->from('nc_investor');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getManualDetail($manual_id) {
        $query = $this->db->get_where('nc_certificates', array('c_id' => $manual_id));
        return $query->row_array();
    }

    public function delete_product_manual_items($id, $fieldname = 'c_id') {
        $this->db->where($fieldname, $id);
        $result = $this->db->delete('nc_certificates');
        return $result;
    }
	
	 public function delete_product_manual_banner($id, $fieldname = 'b_id') {
        $this->db->where($fieldname, $id);
        $result = $this->db->delete('tbl_banner');
        return $result;
    }

 public function delete_office_image($id, $fieldname = 'office_id') {
        $this->db->where($fieldname, $id);
        $result = $this->db->delete('tbl_office');
        return $result;
    }

    public function delete_investor_manual_items($id, $fieldname = 'id') {
        $this->db->where($fieldname, $id);
        $result = $this->db->delete('nc_investor');
        return $result;
    }

    public function allbod() {
        $this->db->select('*');
        $this->db->from('nc_board_page');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function allcommittee() {
        $this->db->select('*');
        $this->db->from('nc_committee_page');

        $query = $this->db->get();
        return $query->result_array();
    }

	 public function get_banner_details($banner_name) {
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('banner_name', $banner_name);
        $query = $this->db->get();
        return $query->result_array();
    }

	
	
    public function get_bod($iListId) {
        $this->db->select('*');
        $this->db->from('nc_board_page');
        $this->db->where('id', $iListId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_committee($iListId) {
        $this->db->select('*');
        $this->db->from('nc_committee_page');
        $this->db->where('id', $iListId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_bod($iListId, $post_data) {
        $this->db->where('id', $iListId);
        return $this->db->update('nc_board_page', $post_data);
    }

    public function update_committee($iListId, $post_data) {
        $this->db->where('id', $iListId);
        return $this->db->update('nc_committee_page', $post_data);
    }

	public function get_titleBySlug($case_id)
    {
        $this->db->select('*');
        $this->db->from('seo');
       $this->db->where('page_type', $case_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /*  30-04-2019-Kiran Parmar*/
    public function get_projects() {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function delete_projects_image($id, $fieldname = 'project_id') {
        $this->db->where($fieldname, $id);
        $result = $this->db->delete('tbl_projects');
        return $result;
    }
}
