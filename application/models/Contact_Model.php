<?php

defined('BASEPATH') OR exit('No direct script access allowed');





class contact_model extends CI_Model  {

	

	

	public function __construct()

	{

		 $this->load->database();
                 
	}	

	public function create_user($arrData)

	{

		$this->db->insert('enquiry', $arrData);

		return $this->db->insert_id();

	}

	public function create_user_contact_us($arrData)

	{

		$this->db->insert('nc_contact_us', $arrData);

		return $this->db->insert_id();

	}
	
	public function create_user_demo($arrData)

	{
		
		$this->db->insert('tbl_demo_data', $arrData);
		
		$aa = $this->db->insert_id();
		
		return $aa;
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

	public function get_pages_detail()
    {
        $query = $this->db->get_where('tbl_contact_admin');
        return $query->row_array();
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

	public function get_AllStates(){
		$result=$this->db->select('*')
			->from('tbl_states')
			->get()->result_array();
		return $result;
	}

}





