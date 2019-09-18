<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact_us extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');   
		$this->output->delete_cache();     
		$this->load->model('Configuration_model');
		$this->load->model('Contact_Model');
		$this->load->helper('form');
		$this->load->model('Pages_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }
	
	
   public function index()
	{
		$this->load->helper('form');
		$this->load->library('session');
        $this->load->library('form_validation');
		$data['contact_data'] = $this->Contact_Model->get_pages_detail();
        $data['GetStates'] = $this->Contact_Model->get_AllStates();
       // print_r($data['GetStates']);exit();
		if($this->input->post())
		{
		 
			
			$this->form_validation->set_rules('user_first_name', 'Please enter person full name', 'required');
		

			$this->form_validation->set_rules('user_email_address', 'Please enter person email address.', 'required|valid_email');
			$this->form_validation->set_rules('user_mobile_no', 'Please enter person Contact number', 'required');
			$this->form_validation->set_rules('user_message', 'Please enter Organization', 'required');
		///	if ($this->form_validation->run() == FALSE)
		  ///  {
		   //    $this->session->set_flashdata('contactus', array('message' => 'Please enter valid details.','icon' => 'icon fa fa-ban','class' => 'alert alert-error'));
           // 	redirect(current_url());
		   // }
		  //  else
		   // {
			  
				$form_array = array('user_first_name'=>$_POST['f_name'],'user_email_address'=>$_POST['email'],'user_mobile_no'=>$_POST['phone'],
				'user_message'=>$_POST['message'],'date' =>date('Y-m-d H:i:s')
				);

                

				$config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.gmail.com';
                $config['smtp_port'] = 587;
                $config['smtp_user'] = 'benchmarkagencies1@gmail.com'; // test is for your acc in gmail
                $config['smtp_pass'] = '2019Digital!'; // here you must specify your pass
                $config['smtp_crypto'] = 'tls'; // here you must specify your pass
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                $config['mailtype'] = 'html'; // or html
                $config['validation'] = TRUE;
                $config['useragent'] = 'test';

                $this->load->library('email');
                $this->email->initialize($config);

                //$this->email->set_newline("\r\n");

                $this->email->from($this->input->post('email'), 'Benchmark');
                $this->email->to('benchmarkagencies1@gmail.com'); 
                //$this->email->to('kiranp@nichetech.in'); 
                $this->email->subject('Contact Us');
                $name=$this->input->post('f_name');
                $msg=$this->input->post('message');
                $phone=$this->input->post('phone');
                $states_name=$this->input->post('states_name');
                $city_name=$this->input->post('city_name');
                $html='';
                $html=$this->GetAdminContactusTemplate($name,$msg,$phone,$states_name,$city_name);
                
                $this->email->message($html);
                //print_r($this->email->send());exit();
                //print_r($this->email->send());exit();

                if ($this->email->send()) {
				    echo 'Your Email has successfully been sent.';
                } else {
                    echo 'mail not send';
                    //show_error($this->email->print_debugger());
                }

                if(!empty($_POST['email'])){
                    $this->email->initialize($config);

                    $this->email->set_newline("\r\n");

                    $this->email->from('benchmarkagencies1@gmail.com', 'Benchmark');
                    $this->email->to($this->input->post('email')); 
                    $this->email->subject('Contact us');
                    
                    $contact['name']=$this->input->post('f_name');
                    $contact['msg']='Our representative will get back to you soon.';

                    $htmlAdmin='';
                    $htmlAdmin=$this->GetUserContactusTemplate($contact);
                    //print_r($htmlAdmin);exit();
                    //print_r($this->email->send());exit();
                    $this->email->message($htmlAdmin);                                  
                    if ($this->email->send()) {
                        echo 'Your Email has successfully been sent.';
                    } else {
                        //show_error($this->email->print_debugger());
                        echo 'mail not send';
                        //show_error($this->email->print_debugger());
                    }
                }
				
				$this->Contact_Model->create_user_contact_us($form_array);
				
				//	exit;
				//$this->session->set_flashdata('We will get back to you,updated Successfully', array('message' => 'contactus','icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
				//echo 'success';
				 return true;
				//redirect('contactus');
		   // }
		}
		
		$table_name ='nc_about_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id',$table_name);
		$data['current_page'] ='contact';
		$data['page_banner'] = $this->Pages_model->get_banner_details($data['current_page']);
		$data['seo_details'] = $this->Pages_model->get_titleBySlug($data['current_page']);

		$this->load->view('templates/header',$data);
			$this->load->view('contact-us',$data);
			$this->load->view('templates/footer',$data);
				
	}

	public function GetAdminContactusTemplate($name,$msg,$phone,$states_name,$city_name){
        $templates='';
        $templates.='<table width="600" border="0" align="center" cellpadding="15" cellspacing="0" bgcolor="#FAFAFA" style="max-width:600px;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;color:#000;font-weight:normal;line-height:1.6;font-size:14px;border-radius:0px 0px 3px 3px">
        <tbody>
        <tr>
        <td bgcolor="#ece8e8" align="center"><img src="http://stagging.benchmarkagencies.com/assets/images/benchmark-logo-registered.png" class="CToWUd"></td>
        </tr>
        <tr>
        <td style=""><h3 style="margin:0px;margin-bottom:15px;font-size:24px;line-height:1.1;font-weight:500">Hi Admin,</h3><p style="margin:0px 0px 10px 0px">I am <strong>'.$name.'</strong>.<br><br><strong>Phone:</strong> '.$phone.'<br><br><strong>Message:</strong> '.$msg.'<br><br><strong>States:</strong> '.$states_name.'<br><br><strong>City:</strong> '.$city_name.'</p>                          </td>
        </tr>   
        <tr>
        <td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0">                                       <table class="m_-3334209659592157258m_6585845335002766785table m_-3334209659592157258m_6585845335002766785table-bordered" width="100%">
        <thead>
        
        <tr>
        <td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0">               <p style="margin:0px">Best Regards,</p>         <p style="margin:0px 0px 10px 0px">The Benchmark Agencies Team</p>           <p style="color:#b9b9b9;font-size:12px">This email cant receive replies. For more information, visit the <a href="http://benchmarkagencies.com/" style="color:#47a0cb" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://benchmarkagencies.com/&amp;source=gmail&amp;ust=1554882141389000&amp;usg=AFQjCNGrmlCGk-p_3Mq6VFFvn9XF1IoTjw">Benchmark Agencies</a>.</p>           </td>
        </tr>       
        </tbody>
        </table>';

        return $templates;
    }

    public function GetUserContactusTemplate($Contact){
        $templates='';
        $templates.='<table width="600" border="0" align="center" cellpadding="15" cellspacing="0" bgcolor="#FAFAFA" style="max-width:600px;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;color:#000;font-weight:normal;line-height:1.6;font-size:14px;border-radius:0px 0px 3px 3px">
        <tbody>
        <tr>
        <td bgcolor="#ece8e8" align="center"><img src="http://stagging.benchmarkagencies.com/assets/images/benchmark-logo-registered.png" class="CToWUd"></td>
        </tr>
        <tr>
        <td style=""><h3 style="margin:0px;margin-bottom:15px;font-size:24px;line-height:1.1;font-weight:500">Hi '.$Contact['name'].',</h3><p style="margin:0px 0px 10px 0px">'.$Contact['msg'].'</p>                          </td>
        </tr>   
        <tr>
        <td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0">                                       <table class="m_-3334209659592157258m_6585845335002766785table m_-3334209659592157258m_6585845335002766785table-bordered" width="100%">
        <thead>
        
        <tr>
        <td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0">               <p style="margin:0px">Best Regards,</p>         <p style="margin:0px 0px 10px 0px">The Benchmark Agencies Team</p>           <p style="color:#b9b9b9;font-size:12px">This email cant receive replies. For more information, visit the <a href="http://benchmarkagencies.com/" style="color:#47a0cb" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://benchmarkagencies.com/&amp;source=gmail&amp;ust=1554882141389000&amp;usg=AFQjCNGrmlCGk-p_3Mq6VFFvn9XF1IoTjw">Benchmark Agencies</a>.</p>           </td>
        </tr>       
        </tbody>
        </table>';

        return $templates;
    }
}