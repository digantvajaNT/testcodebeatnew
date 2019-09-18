<?php

defined('BASEPATH') OR exit('No direct script access allowed');





class case_model extends CI_Model  {

	

	

	public function __construct()

	{

		 $this->load->database();
                 
	}	

	public function create_user($arrData)

	{

		$this->db->insert('leads', $arrData);

		return $this->db->insert_id();

	}
	
	public function get_totalCategories()
    {
        $this->db->select('id');
        $this->db->from('case_study');
        $count = $this->db->count_all_results();
        return $count;
    }
	
	  public function allcareeradmin() {
        $this->db->select('*');
        $this->db->from('careers');

        $query = $this->db->get();
        return $query->result_array();
    }
	  public function allfaq() {
        $this->db->select('*');
        $this->db->from('faq');

        $query = $this->db->get();
        return $query->result_array();
    }
	 public function allcareer() {
        $this->db->select('*');
        $this->db->from('careers');
		$this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	 public function allcareeradminbyid($iListId) {
        $this->db->select('*');
        $this->db->from('careers');
        $this->db->where('c_id', $iListId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
     public function allfaqadminbyid($iListId) {
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('id', $iListId);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	function get_list() {

        $this->db->select('tbl_category.*, COUNT(rds_products.category_id) as count_cat');
        $this->db->from('tbl_category');
        $this->db->join('rds_products', 'tbl_category.category_id = rds_products.category_id');
        $this->db->group_by('tbl_category.category_id, category_id');
        $query = $this->db->get();
		return $query->result_array();
    }
	
	 public function update_career($iListId, $post_data) {
        $this->db->where('c_id', $iListId);
        return $this->db->update('careers', $post_data);
    }
	
	public function update_faq($iListId, $post_data) {
        $this->db->where('id', $iListId);
        return $this->db->update('faq', $post_data);
    }
	
	
	
	public function get_case($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('*');

           // $this->db->order_by("product_id", "DESC");
            $query = $this->db->get();
            #echo $this->db->last_query();die("123");
            return $query->result_array();
        }
        $query = $this->db->get_where('case_study', array('id' => $id));
        return $query->row_array();
    }
	
	 public function update_product($id, $data,$table_name) {
        $this->db->where('id', $id);
        return $this->db->update($table_name, $data);
    }
	
	 public function update_careerbyid($id, $data,$table_name) {
        $this->db->where('c_id', $id);
        return $this->db->update($table_name, $data);
    }
	
	 public function update_faqbyid($id, $data,$table_name) {
        $this->db->where('id', $id);
        return $this->db->update($table_name, $data);
    }
	
	 public function delete_career($fieldname, $c_id,$table_name)
    {
        $this->db->where($fieldname, $c_id);
        $result = $this->db->delete($table_name);
        return $result;
    }
	
	public function allcases()
    {
        $this->db->select('*');
        $this->db->from('case_study');
		$this->db->where('status', 'active');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function allcategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
       $this->db->where('category_status', 'active');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function allblog()
    {
        $this->db->select('*');
        $this->db->from('rds_products');
       $this->db->where('product_status', 'active');
	    $this->db->order_by("product_id", "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_blogBySlug($slug)
    {
		//echo $slug;exit;
        $this->db->select('*');
        $this->db->from('rds_products');
       $this->db->where('product_unique_slug', $slug);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
	public function get_careerBySlug($case_id)
    {
        $this->db->select('*');
        $this->db->from('careers');
       $this->db->where('c_id', $case_id);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_caseBySlug($case_id)
    {
        $this->db->select('*');
        $this->db->from('case_study');
       $this->db->where('id', $case_id);
        $query = $this->db->get();
        return $query->result_array();
    }
	public function delete_user($sFieldValue,$sFieldName = 'user_id')

	{		

		if($sFieldValue != '') 

		{

			$this->db->where($sFieldName, $sFieldValue);			

			return $this->db->delete('tbl_users');			

		}		

	}

	public function update_user($arrData,$sFieldValue,$sFieldName = 'user_id') {		

		if($sFieldValue != '') 

		{			

			$this->db->where($sFieldName, $sFieldValue);			

			return $this->db->update('tbl_users', $arrData);			

		}

	}

	public function login($companycode,$usercode, $password) {

		$this->db->select('user_id,user_org_id,user_firstname,user_lastname,user_password,user_role,user_orgcode,user_loginname,user_status');		

		$this->db->from('tbl_users');		

		$this->db->where("(user_orgcode = '$companycode' AND user_loginname = '$usercode')");		

		$this->db->where( 'user_password', $password );

				

		$login = $this->db->get()->row_array();

		return $login;

	}

	

	public function check_duplicate($sUseremail, $sUserPhone,$sCurrentUserid = '')

	{		

		$this->db->select('user_id,user_email,user_phone,user_status');		

		$this->db->from('tbl_users');	

		

		if($sCurrentUserid != ''){

				$this->db->where("user_id != '".$sCurrentUserid."'");	

		}	

		$this->db->where("user_status = 'Active' AND (user_email = '".$sUseremail."'

		 OR user_phone = '".$sUserPhone."')");		

		$count = $this->db->count_all_results();

		//echo $this->db->last_query();die("123");

		return $count;		

	}

	public function generate_usercode($iListId)

	{	

		$this->db->select('org_name');

		$this->db->from('tbl_organization');

		$this->db->where("org_id ='".$iListId."'");

		$query = $this->db->get();	

		#echo $this->db->last_query();die("123");	

		$aTemp = $query->row_array();	

		//GENERATE CODE		

		$this->db->select('MAX(CAST(SUBSTRING(user_loginname FROM 3) AS UNSIGNED)) AS "max"');

		$this->db->from('tbl_users');

		

		$this->db->where("user_org_id ='".$iListId."'");		

		$query = $this->db->get();

		//echo $this->db->last_query();die("123");

		$aMaxorder = $query->row_array();

		

		if($aMaxorder["max"] != '')

		{

			$sCode = strtoupper(substr($aTemp["org_name"], 0, 2));

			if(strlen($aMaxorder["max"]) > 0)

			{

				for($i=0;$i<(3- strlen($aMaxorder["max"]+1));$i++)

				{

					$sCode .= '0';

				}

			}

			$sCode .= ($aMaxorder["max"]+1);			

		}

		else {

			$sCode = strtoupper(substr($aTemp["org_name"], 0, 2));

			$sCode .= '001';		

		}

		return  $sCode;

	}

	public function get_orgUsers($sUserRole='',$iListId)

	{

		$this->db->select('user_id,user_loginname,user_orgcode,user_email,user_phone,user_firstname,user_lastname,user_role');		

		$this->db->from('tbl_users');		

		$this->db->where("user_org_id = '".$iListId."'");	

		if($sUserRole!='')

		{

			$this->db->where("user_role = '".$sUserRole."'");	

		}

		$userResult = $this->db->get()->row_array();

		return $userResult;

	}

	public function get_totalorgUsers($sUserRole='',$iListId = '',$status = '')

	{

		$this->db->select('user_id,user_loginname,user_status,user_orgcode,user_email,user_phone,user_firstname,user_lastname');		

		$this->db->from('tbl_users');		

		if($iListId != '')
		{
			$this->db->where("user_org_id = '".$iListId."'");	
		}	

		if($sUserRole!='')

		{

			$this->db->where("user_role = '".$sUserRole."'");	

		}

		if($status != '')

			{

				$this->db->where("user_status  ='".$status."'");

			}

		$userResult = $this->db->get()->result_array();

		return $userResult;

	}	

	public function get_userprofile($iListId)

	{

		$this->db->select('user_id,user_org_id,user_address,user_city,user_state,user_country,user_pincode,user_password,

		user_loginname,user_orgcode,user_email,user_phone,user_firstname,user_lastname,user_status,user_role,user_deviceid,user_devicetype');		

		$this->db->from('tbl_users');	

		$this->db->where("user_id = '".$iListId."'");	

		$userResult = $this->db->get()->row_array();

		return $userResult;

	}

		public function get_userinfoemail($email)

	{

		$this->db->select('user_id,user_org_id,user_address,user_city,user_state,user_country,user_pincode,

		user_loginname,user_orgcode,user_email,user_phone,user_firstname,user_lastname,user_status,user_role,user_code');		

		$this->db->from('tbl_users');	

		$this->db->where("user_email = '".$email."'");	

		$userResult = $this->db->get()->row_array();

		return $userResult;

	}

	public function get_userinfo($code)

	{

		$query = $this->db->get_where('tbl_users', array('user_code' => $code));

	//	echo $this->db->last_query();die("123");

		return $query->row_array();		

	}

	public function get_validateUser($suserId, $sOrgId, $sPhone_no)

	{

		$this->db->select('user_id,user_org_id,user_address,user_city,user_state,user_country,user_pincode,

		user_loginname,user_orgcode,user_email,user_phone,user_firstname,user_lastname');		

		$this->db->from('tbl_users');	

		$this->db->where("user_loginname = '".$suserId."' AND user_orgcode = '".$user_orgcode."' AND user_phone = '".$user_phone."'");	

		$userResult = $this->db->get()->row_array();

		return $userResult;

	}

	

	public function get_validateUserByphone($sPhone_no)

	{

		$this->db->select('user_id,user_org_id,user_address,user_city,user_state,user_country,user_pincode,

		user_loginname,user_orgcode,user_email,user_phone,user_firstname,user_lastname,user_status');	

		$this->db->from('tbl_users');	

		$this->db->where("user_phone = '".$sPhone_no."' AND user_status = 'Active'");

		$userResult = $this->db->get()->row_array();

		return $userResult;

	}

	function send_sms($method, $url, $data){
	   $curl = curl_init();

	   switch ($method){
	      case "POST":
	         curl_setopt($curl, CURLOPT_POST, 1);
	         if ($data)
	            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	         break;
	      case "PUT":
	         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	         if ($data)
	            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
	         break;
	      default:
	         if ($data)
	            $url = sprintf("%s?%s", $url, http_build_query($data));
	   }

	   // OPTIONS:
	   curl_setopt($curl, CURLOPT_URL, $url);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	      'apikey: 530B60fb04z24yXBkaScti2VhhyAm7P8',
	      'Content-Type: application/json',
	   ));
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	   // EXECUTE:
	   $result = curl_exec($curl);
	   if(!$result){die("Connection Failure");}
	   curl_close($curl);
	   return $result;
	}



	public function verify_user($companyId,$userId, $password) {

		$this->db->select('user_id,user_org_id,user_firstname,user_lastname,user_password,user_role,user_orgcode,user_loginname,user_status');		

		$this->db->from('tbl_users');		

		$this->db->where("(user_id = '".$userId."' AND user_org_id = '".$companyId."')");		

		$this->db->where( 'user_password', $password );

				

		$login = $this->db->get()->row_array();

		return $login;

	}
	public function get_Assignee($iListId,$status = '')
	{
		$this->db->select('user_id,user_loginname,user_status,user_orgcode,user_email,user_phone,user_firstname,user_lastname');		
		$this->db->from('tbl_users');		
		$this->db->where("user_org_id = '".$iListId."'");	
		$this->db->where("user_role IN('supervisor',  'employee')");
		if($status != '')
			{
				$this->db->where("user_status  ='".$status."'");
			}
		$userResult = $this->db->get()->result_array();
		return $userResult;
	}

}





