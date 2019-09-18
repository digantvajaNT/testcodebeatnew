<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forgotpassword extends CI_Controller {

    public function index()
    {
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('string');
        $this->load->library('session');

        $this->load->model('admin_model');

        //redirect to dashboard page if already login
        if( $this->session->userdata('loggedin_admin') ) {
            redirect("admin/dashboard");
        }
        $data['title'] = $this->config->item('site_name').' - Forgot password';
        if ($this->input->post()) {

            if ($this->input->post("tb_emailaddress") != '') {
                $sEmail = $this->security->xss_clean($this->input->post("tb_emailaddress"));
                $aAdminResult = $this->admin_model->forgot_pwd($sEmail);
                if(count($aAdminResult) > 0)
                {
                    //FETCH RECEIPTING EMAIL
                    $data['title'] = 'Forgot Password';
                    $data['code'] = random_string('alnum',20);
                    $data['user_firstname'] = $aAdminResult['admin_firstname'];
                    //update data in user table
                    $post_data = array(
                        'admin_code' => $data['code'],
                        'admin_updateddate' => date('Y-m-d H:i:s')
                    );
                    $this->admin_model->update_user($aAdminResult['admin_id'],$post_data);

                    $sContent = $this->load->view('email_template/user_resetpass',$data,true);
                    $sSubject = $this->config->item('site_name').' - Password Help';
                    $config = Array(
                        'protocol' => 'mail',
                        'mailtype'  => 'html',
                        'charset'   => 'iso-8859-1'
                    );
                    $this->load->library('email', $config);
                    $this->email->clear();

                    $this->email->from('info@budlong.com', 'Budlong');
                    $this->email->to($aAdminResult["admin_email"]);
                    $this->email->subject($sSubject);
                    $this->email->message($sContent);
                    $status = $this->email->send(FALSE);
                    $this->email->print_debugger(array('headers'));
                    $this->email->clear();
                   // echo $msg; die;
                    $this->session->set_flashdata("forgotpwd",array('message' => "Reset Password link has been sent to your email address.",'icon' => 'icon fa fa-check','class' => 'alert alert-success'));
                    redirect(current_url());
                }
                else
                {
                    $this->session->set_flashdata('forgotpwd', array('message' => 'Please check Email Address. This Email Address does not exist.','icon' => 'icon fa fa-ban','class' => 'alert alert-error'));
                    redirect(current_url());
                }
            }
        }
        $this->load->view('admin/forgotpassword',$data);
    }
}
