<?php 

class tryitController extends CI_Controller{
	
	public function index()
	{
	
	
	

	}
	
	public function fun()
	{
	$data['html']=$this->input->post('html');
	$data['css']=$this->input->post('css');
	$data['javascript']=$this->input->post('javascript');
	$data['foo']=1;
	//$this->load->view('tryit',$data);
	$this->load->view('home',$data);
	}
	
	}


?>