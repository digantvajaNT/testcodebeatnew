<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board_of_directors extends CI_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');   
		$this->output->delete_cache();     
		$this->load->model('Pages_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }
	
	function _remap( $method )
    {
        $method = str_replace( '-', '_', $method );
        $params = array_slice( $this->uri->segment_array(), 2 );
        if ( ! method_exists( $this, $method ) )
            show_404();

        return call_user_func_array( array( $this, $method ), $params );
    }
	 
	public function index()
	{

		//$page_name='mobile-services';
		$data['bod'] = $this->Pages_model->allbod();
		
		    $this->load->view('templates/header',$data);
			$this->load->view('board-of-directors',$data);
			$this->load->view('templates/footer',$data);
				
	}
	
	
	
}
