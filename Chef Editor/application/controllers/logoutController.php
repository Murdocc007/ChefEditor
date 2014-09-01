<?php 

class logoutController extends CI_Controller{
	
	public function index()
	{
			$this->config->load('facebook');
	$this->load->library('facebook');

   $this->session->unset_userdata('id');
   $this->session->sess_destroy();
//	$this->facebook->destroySession();    
	redirect(base_url('index.php/loginController'));


	}
	
	}


?>