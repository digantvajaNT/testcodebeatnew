<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    /*     * * Index Page for this controller. */

    public function __construct() {

        parent::__construct();
        
        $this->load->helper('url_helper');
        $this->output->delete_cache();
        $this->load->model('Products_model');
        $this->load->model('Configuration_model');
        $this->load->model('Contact_Model');
        $this->load->model('Sliders_model');
        $this->load->model('News_model');
		$this->load->helper('form');
        $this->load->model('Pages_model');
   
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        
        $this->load->library('session');
        
    }

    public function index() {
        $data['title'] = $this->config->item('site_name') . ' - ' . $this->config->item('site_title');
        $data['current_page'] = 'Home';
        $data['sliders_data'] = $this->Sliders_model->get_activesliders();
        $data['get_achievement'] = $this->Sliders_model->get_achievement();
        $data['testimonial_data'] = $this->Sliders_model->get_testimonial();
        $data['about_data'] = $this->Sliders_model->getaboutus();
        $data['contact_data'] = $this->Contact_Model->get_pages_detail();
        $data['services_data'] = $this->Sliders_model->getservices();
        $data['clients_data'] = $this->Sliders_model->getclients();
        $data['featured_data'] = $this->Products_model->get_featuredProducts();
        $data['project_data'] = $this->Pages_model->get_projects();
        

        //print_R($data['featured_data']);
       // exit;
        $data['latest_news'] = $this->News_model->get_activeNews('news_createddate', 'DESC', '3');
        $data['config_data'] = $this->Configuration_model->get_config('config_id', '1');
		
        $table_name = 'nc_home_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id', $table_name);
		
		$data['seo_details'] = $this->Pages_model->get_titleBySlug($data['current_page']);

		if($this->input->post())
		{
            //print_r($this->input->post());exit();

			$form_array = array('user_first_name'=>$_POST['name'],'user_email_address'=>$_POST['email'],'user_mobile_no'=>$_POST['phone'],
				'user_message'=>$_POST['message'],'date' =>date('Y-m-d H:i:s')
				);
               // $this->load->library('email');

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

                $this->email->set_newline("\r\n");

                $this->email->from('benchmarkagencies1@gmail.com', 'Benchmark');
                $this->email->to($this->input->post('email')); 
                $this->email->subject('Get A Free Demo');
                $name=$this->input->post('name');
                $msg='Our representative will get back to you soon with a quote on the following items.';
                $html='';
                $html=$this->GetADemoTemplate($name,$msg);
                $this->email->message($html);                                  
                if ($this->email->send()) {
                    echo 'Your Email has successfully been sent.';
                } else {
                    echo 'Email not send';
                    //show_error($this->email->print_debugger());
                }
               // exit();
                if(!empty($_POST['email'])){
                    //$this->email->initialize();

                    $this->email->set_newline("\r\n");
                    
                    $this->email->from($this->input->post('email'), $name);
                    $this->email->to('benchmarkagencies1@gmail.com'); 
                    $this->email->subject('Get A Free Demo');
                    
                    $demo['name']=$this->input->post('name');
                    $demo['phone']=$this->input->post('phone');
                    $demo['email']=$this->input->post('email');
                    $demo['message']=$this->input->post('message');

                    $htmlAdmin='';
                    $htmlAdmin=$this->GetADemoTemplateAdmin($demo);
                    
                    $this->email->message($htmlAdmin);                                  
                    if ($this->email->send()) {
                        echo 'Your Email has successfully been sent.';
                    } else {
                        echo 'Email not send';
                        //show_error($this->email->print_debugger());
                    }
                }
				$this->Contact_Model->create_user_demo($form_array);
				exit;
				//$this->session->set_flashdata('We will get back to you,updated Successfully', array('message' => 'contactus','icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
			//	echo 'success';
				//return true;
		}
				
				
				
		$table_name ='nc_about_page';
        $data['page_data'] = $this->Pages_model->get_pages('config_id',$table_name);
        //print_r($data['featured_data']);exit();
        $this->load->view('templates/header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer', $data);
    }

    public function soon()
    {
        $this->load->view('soon');
    }

    public function GetaQuote(){
        //print_r($_POST);exit();
        if($this->input->post())
        {
            //Load email library
            /*$config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port' => 587,
                'smtp_user' => 'kiranp@nichetech.in',
                'smtp_pass' => 'Kiran@456',
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype' => "html",
                'charset'   => 'utf-8'
            );*/
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

                $this->email->set_newline("\r\n");

                $this->email->from('benchmarkagencies1@gmail.com', 'Benchmark');
                //$this->email->to($this->input->post('email')); 
                $this->email->to('kiranp@nichetech.in'); 
                $this->email->subject('Get A Quote');
                $firstname=$this->input->post('firstname');
                $lastname=$this->input->post('lastname');
                $states_name=$this->input->post('states_name');
                $city_name=$this->input->post('city_name');
                $proname=$this->input->post('proname');
                $procapacity=$this->input->post('procapacity');
                $procolors=$this->input->post('procolors');

                $msg='Our representative will get back to you soon with a quote on the following items.';
                $html='';
                $html=$this->GetAQuoteTemplate($firstname,$lastname, $states_name,$city_name,$proname,$procapacity,$procolors,$msg);
                //print_r($html);exit();
               
                $this->email->message($html);                                  
                if ($this->email->send()) {
                    //echo "send";exit();
                        $result['status']=200;
                        $result['message']='Your Email has successfully been sent.';
                } else {
                    show_error($this->email->print_debugger());exit();
                    $result['status']=412;

                    $result['message']="Email Not Send";
                }
                exit();

                if(!empty($_POST['email'])){
                    

                    //$this->email->set_newline("\r\n");
     // sejal $this->email->from($this->input->post('email'), $name);
                    $this->email->from($this->input->post('email'), $firstname);
                    // $this->email->to('sejal@nichetech.in'); 
                     $this->email->to('benchmarkagencies1@gmail.com'); 
                    $this->email->subject('Get A Quote');
                    
                    $quote['firstname']=$this->input->post('firstname');
                    $quote['lastname']=$this->input->post('lastname');
                    $quote['states_name']=$this->input->post('states_name');
                    $quote['city_name']=$this->input->post('city_name');
                    $quote['email']=$this->input->post('email');
                    $quote['mobile']=$this->input->post('mobile');
                    $quote['proname']=$this->input->post('proname');
                    $quote['procapacity']=$this->input->post('procapacity');
                    $quote['procolors']=$this->input->post('procolors');

                    $htmlAdmin='';
                    $htmlAdmin=$this->GetAQuoteTemplateAdmin($quote);
                    //print_r($htmlAdmin);exit();

                    $this->email->message($htmlAdmin);                                  
                    if ($this->email->send()) {
                        $result['status']=200;
                        $result['message']='Your Email has successfully been sent.';
                    } else {
                        //show_error($this->email->print_debugger());
                        $result['status']=412;
                        $result['message']="Email Not Send";
                    }
                }

                echo json_encode($result);
                // exit;
                //$this->session->set_flashdata('We will get back to you,updated Successfully', array('message' => 'contactus','icon' => 'icon fa fa-check', 'class' => 'alert alert-success alert-dismissible'));
            //  echo 'success';
                //return true;
            }
    }

    public function GetADemoTemplate($name,$msg){
        $templates='';
        $templates.='<table width="600" border="0" align="center" cellpadding="15" cellspacing="0" bgcolor="#FAFAFA" style="max-width:600px;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;color:#000;font-weight:normal;line-height:1.6;font-size:14px;border-radius:0px 0px 3px 3px">
        <tbody>
        <tr>
        <td bgcolor="#ece8e8" align="center"><img src="http://stagging.benchmarkagencies.com/assets/images/benchmark-logo-registered.png" class="CToWUd"></td>
        </tr>
        <tr>
        <td style=""><h3 style="margin:0px;margin-bottom:15px;font-size:24px;line-height:1.1;font-weight:500">Hi '.$name.',</h3>               <p style="margin:0px 0px 10px 0px">Thank you.<br>'.$msg.'</p>                          </td>
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

    public function GetADemoTemplateAdmin($demo){
        $templates='';
        $templates.='<table width="600" border="0" align="center" cellpadding="15" cellspacing="0" bgcolor="#FAFAFA" style="max-width:600px;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;color:#000;font-weight:normal;line-height:1.6;font-size:14px;border-radius:0px 0px 3px 3px">
        <tbody>
        <tr>
        <td bgcolor="#ece8e8" align="center"><img src="http://stagging.benchmarkagencies.com/assets/images/benchmark-logo-registered.png" class="CToWUd"></td>
        </tr>
        <tr>
        <td style=""><h3 style="margin:0px;margin-bottom:15px;font-size:24px;line-height:1.1;font-weight:500">Hi Admin,</h3><p style="margin:0px 0px 10px 0px">Full Name:<br>'.$demo['name'].'</p>
        <p style="margin:0px 0px 10px 0px">Phone Number:<br>'.$demo['phone'].'</p>
        <p style="margin:0px 0px 10px 0px">Email:<br>'.$demo['email'].'</p>
        <p style="margin:0px 0px 10px 0px">Message:<br>'.$demo['message'].'</p>
        </td>
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

    public function GetAQuoteTemplate($firstname,$lastname, $states_name,$city_name,$proname,$procapacity,$procolors,$msg){
        $templates='';
        $templates.='<table width="600" border="0" align="center" cellpadding="15" cellspacing="0" bgcolor="#FAFAFA" style="max-width:600px;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;color:#000;font-weight:normal;line-height:1.6;font-size:14px;border-radius:0px 0px 3px 3px">
        <tbody>
        <tr>
        <td bgcolor="#ece8e8" align="center"><img src="http://stagging.benchmarkagencies.com/assets/images/benchmark-logo-registered.png" class="CToWUd"></td>
        </tr>
        <tr>
        <td style=""><h3 style="margin:0px;margin-bottom:15px;font-size:24px;line-height:1.1;font-weight:500">Hi '.$firstname.' '.$lastname.',</h3>  <h4 style=" margin:0px;  margin-bottom:15px;font-size:14px;line-height:1.1;font-weight:500"><b>State:</b>'.$states_name.',<b>City:</b>'.$city_name.'</h4>                <p style="margin:0px 0px 10px 0px">Thank you.<br>'.$msg.'</p>                          </td>
        </tr> 
         <tr>
            <td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0">                                       <table class="m_-3334209659592157258m_6585845335002766785table m_-3334209659592157258m_6585845335002766785table-bordered" width="100%">
                <thead>
                    <tr>
                        <th align="left" width="5%">#</th>
                        <th align="left" width="40%">Product Name</th>
                        <th align="left" width="30%">Colors</th>
                        <th align="left" width="10%">Capacity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="m_-3334209659592157258m_6585845335002766785spacer">
                        <td>1</td>
                        <td>'.$proname.'</td>
                        <td>'.$procolors.'</td>
                        <td align="center">'.$procapacity.'</td>
                    </tr>
                </tbody>
            </table>            </td>
            
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

    public function GetAQuoteTemplateAdmin($quote){
        $templates='';
        $templates.='<table width="600" border="0" align="center" cellpadding="15" cellspacing="0" bgcolor="#FAFAFA" style="max-width:600px;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;color:#000;font-weight:normal;line-height:1.6;font-size:14px;border-radius:0px 0px 3px 3px">
        <tbody>
        <tr>
        <td bgcolor="#ece8e8" align="center"><img src="http://stagging.benchmarkagencies.com/assets/images/benchmark-logo-registered.png" class="CToWUd"></td>
        </tr>
        <tr>
        <td style=""><h3 style="margin:0px;margin-bottom:15px;font-size:24px;line-height:1.1;font-weight:500">Hi Admin,</h3>
        </td>
        </tr> 
        <tr>
        <td><span style="margin:0px;margin-bottom:15px;font-size:24px;line-height:1.1;font-weight:500">Product Details</span></td>
        </tr>
         <tr>
            <td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0"> <table class="m_-3334209659592157258m_6585845335002766785table m_-3334209659592157258m_6585845335002766785table-bordered" width="100%">
                <thead>
                    <tr>
                        <th align="left" width="5%">#</th>
                        <th align="left" width="40%">Product Name</th>
                        <th align="left" width="30%">Colors</th>
                        <th align="left" width="10%">Capacity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="m_-3334209659592157258m_6585845335002766785spacer">
                        <td>1</td>
                        <td>'.$quote['proname'].'</td>
                        <td>'.$quote['procolors'].'</td>
                        <td align="center">'.$quote['procapacity'].'</td>
                    </tr>
                </tbody>
            </table>            </td>
            
        </tr>
        <td><span style="margin:0px;margin-bottom:15px;font-size:24px;line-height:1.1;font-weight:500">User Details</span></td>
        </tr>
         <tr>
            <td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0"> <table class="m_-3334209659592157258m_6585845335002766785table m_-3334209659592157258m_6585845335002766785table-bordered" width="100%">
                <thead>
                    <tr>
                        <th align="left" width="5%">#</th>
                        <th align="left" width="40%">Firstname</th>
                        <th align="left" width="30%">Lastname</th>
                        <th align="left" width="10%">Email</th>
                        <th align="left" width="10%">Mobile</th>
                        <th align="left" width="10%">State Name</th>
                        <th align="left" width="10%">City Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="m_-3334209659592157258m_6585845335002766785spacer">
                        <td>1</td>
                        <td>'.$quote['firstname'].'</td>
                        <td>'.$quote['lastname'].'</td>
                        <td align="center">'.$quote['email'].'</td>
                        <td align="center">'.$quote['mobile'].'</td>
                         <td align="center">'.$quote['states_name'].'</td>
                          <td align="center">'.$quote['city_name'].'</td>
                       
                    </tr>
                </tbody>
            </table>            </td>
            
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

	public function search(){
	
     $data['searches'] =array();
     $data['searchess'] =array();
	 $data['contact_data'] = $this->Contact_Model->get_pages_detail();
	 $search =trim($this->input->post('search'));
    if ($query = $this->Sliders_model->user_search($search))
    {

        $data['searches'] = $query;
    }
	
	/*if ($query = $this->Sliders_model->service_search($search))
    {

        $data['searchess'] = $query;
   }*/
   //print_r($data['searches']);exit();
			
		$data['search'] = array_merge($data['searches'],$data['searchess']);
		$table_name ='nc_about_page';
		$data['current_page'] ='search';
		$data['search_word'] = $this->input->post('search');
        $data['page_data'] = $this->Pages_model->get_pages('config_id',$table_name);
		$data['page_banner'] = $this->Pages_model->get_banner_details($data['current_page']);
		$data['seo_details'] = $this->Pages_model->get_titleBySlug($data['current_page']);
		$this->load->view('templates/header', $data);
        $this->load->view('search', $data);
        $this->load->view('templates/footer', $data);
		}

}
