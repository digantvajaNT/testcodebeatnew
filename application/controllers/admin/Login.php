<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function index() {
		
      	$this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->model('admin_model');

        //redirect to dashboard page if already login
        if( $this->session->userdata('loggedin_admin') ) {
            redirect("admin/dashboard");
        }
        $this->load->library('form_validation');
        $data['title'] = $this->config->item('site_name').' - Administrative Panel';
        if ($this->input->post())
        {
            if ($this->input->post("tb_username") != '' && $this->input->post("tb_password") != '')
            {
                $sUsername = $this->security->xss_clean($this->input->post("tb_username"));
                $sPassword = $this->security->xss_clean($this->input->post("tb_password"));
                $iUserResult = $this->admin_model->login($sUsername, md5($sPassword));
                if($iUserResult)
                {
                    //SET THE SESSION
                    $sessiondata = array(
                        'user_id' 		    => $iUserResult['admin_id'],
                        'user_fullname' 	=> $iUserResult['admin_firstname'].' '.$iUserResult['admin_lastname'],
                        'user_name' 		=> $iUserResult['admin_username'],
                        'user_email'		=> $iUserResult['admin_email']
                    );
                    $this->session->set_userdata('loggedin_admin',$sessiondata);
                    //SET COOKIE
                    if ($this->input->post('chk_rememberme') == "yes") {
                        //Set the cookie and the cookies value,expires in one hour
                        $this->input->set_cookie('cookadmusername', $sUsername,  time() + 60 * 60 * 24 * 100, "", "/");
                        $this->input->set_cookie('cookadmpass', $sPassword,  time() + 60 * 60 * 24 * 100, "", "/");
                    }
                    else {
                        $this->input->set_cookie('cookadmusername', "",  time() + 60 * 60 * 24 * 100, "", "/");
                        $this->input->set_cookie('cookadmpass', "",  time() + 60 * 60 * 24 * 100, "", "/");
                    }
                    redirect("admin/dashboard",$data);
                }
                else
                {
                    $this->session->set_flashdata('login', array('message' => 'Incorrect username or password.','icon' => 'icon fa fa-ban','class' => 'alert alert-error alert-dismissible'));
                    redirect("admin/login",$data);
                }
            }
            else {
                $this->session->set_flashdata('login', array('message' => 'Please fill required details','icon' => 'icon fa fa-ban','class' => 'alert alert-error alert-dismissible'));
                redirect("admin/login",$data);
            }
        }
        $this->load->view('admin/login',$data);
    }

}
