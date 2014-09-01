<?php

class homeController extends CI_Controller{
	
	public function index()
	{
		$data['html']=null;
	$data['css']=null;
	$data['javascript']=null;
	$data['foo']=0;
	$this->load->view('home',$data);
	}
	
	}
?>