<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class enquiry extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->output->delete_cache();
        $this->load->model('Configuration_model');
        $this->load->model('Contact_Model');
        $this->load->model('Products_model');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        ('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    public function index() {
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        if(isset($_GET["pid"])){
        $product_id = $_GET["pid"];
       
        $data['product_detail'] = $this->Products_model->get_productdetail($product_id);
       }
        $data['custom_products'] = $this->Products_model->get_activeProducts(5);
        if ($this->input->post()) {
            $this->form_validation->set_rules('user_first_name', 'Please enter person full name', 'required');


            $this->form_validation->set_rules('user_email_address', 'Please enter person email address.', 'required|valid_email');
            $this->form_validation->set_rules('user_mobile_no', 'Please enter person Contact number', 'required');
            $this->form_validation->set_rules('user_message', 'Please enter Organization', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('enquiry', array('message' => 'Please enter valid details.', 'icon' => 'icon fa fa-ban', 'class' => 'alert alert-error'));
                redirect(current_url());
            } else {



                $form_array = array('user_first_name' => $_POST['user_first_name'], 'user_email_address' => $_POST['user_email_address'], 'user_mobile_no' => $_POST['user_mobile_no'],
                    'user_message' => $_POST['user_message'], 'user_address' => $_POST['user_address']
                );


                $this->Contact_Model->create_user($form_array);
                exit;
                //$sContent='aman';
                $sContent = '';
                $sContent .= '<!DOCTYPE html>
			<html lang="en">
			<head>
				<title>Nichetech - Contact Us Email</title>
			</head>
			<body>
			<table width="100%" border="0" align="center" cellpadding="15" cellspacing="0" bgcolor="#FAFAFA" style="max-width: 600px; font-family:\'RobotoCondensed-Regular\' ;color: #000;font-weight: normal;line-height: 1.6;font-size: 14px;border-radius:0px 0px 3px 3px;">
			<tbody>
				<tr>
						<td bgcolor="#ece8e8"><img src="http://www.nichetech.in/newsign/logo1.png"></td>
				</tr>
				<tr >
					<td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;">
						<p>
						Hello,
					</td>                
				</tr>
					<td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;">
						<p>Full Name: ' . $_POST['user_first_name'] . ' ' . $_POST['user_last_name'] . '</p>
						<p>Email Address: ' . $_POST['user_email_address'] . '</p>
						<p>Contact No.: ' . $_POST['user_mobile_no'] . '</p>';
                if (count($_POST["user_services"]) > 0) {
                    $sContent .= ' <p>Services: ' . $sServices . '</p> ';
                }
                $sContent .= '   <p>Comment: ' . $_POST['user_message'] . '</p>  
						<p style="color:#b9b9b9;font-size:12px;">This email can\'t receive replies. For more information, visit the <a href="#" style="color:#47a0cb">NicheTech</a>. </p>            
					</td>
				<tr>
				</tr>
			</tbody>
			</table>
			</body>
			</html>';


                //if(!empty($data['config_data']['contact_emails'])) {						
                $aEmails = 'aman@nichetech.in';
                $sSubject = 'Contact Inquiry From NicheTech';

                if (count($aEmails) > 0) {

                    $config = Array(
                        'protocol' => 'mail',
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1'
                    );
                    $this->load->library('email', $config);
                    $this->email->clear();
                    $this->email->from('no-reply@nichetech.in', 'NicheTech Solutions');
                    $this->email->to($aEmails);
                    $this->email->subject($sSubject);
                    $this->email->message($sContent);
                    $status = $this->email->send(FALSE);
                    $this->email->print_debugger(array('headers'));
                    $this->email->clear();
                }
                //}
                $this->session->set_flashdata('contactus', array('message' => 'contactus', 'icon' => '', 'class' => ''));
                redirect('enquiry');
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('enquiry', $data);
        $this->load->view('templates/footer', $data);
    }

}
