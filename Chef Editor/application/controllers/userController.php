<?php

class userController extends CI_Controller {


public function __construct(){

		parent::__construct();

	$this->config->load('facebook');
$this->load->library('facebook');
}




public function add() {
        $this->form_validation->set_rules('user_name', 'Name', 'required');

        $this->form_validation->set_rules('user_password', 'Password', 'required');

        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|callback_email_check');

        $this->form_validation->set_message('email_check', 'Email already in use');

        if ($this->form_validation->run() == FALSE) {
			

$data = array(
                        'loginUrl' =>$this->facebook->get_login_url(),
						'error'=>null
						);
            $this->load->view('login',$data);
        } else {	
			$this->load->model('loginmodel');
            $name = $this->input->post('user_name');
            $email = $this->input->post('user_email');
            $password = $this->input->post('user_password');
			$image=$this->input->post('user_pic');
			
			$config['upload_path'] = './images/';
		    $config['allowed_types'] = 'gif|jpg|png';
		    $config['max_size']	= '200';
		    $config['max_width']  = '1024';
		    $config['max_height']  = '768';

			$this->load->library('upload', $config);
            $this->upload->initialize($config);

		if (!$this->upload->do_upload('user_pic')) {
            $error = $this->upload->display_errors();

			$data = array(
                        'loginUrl' =>$this->facebook->get_login_url(),
						'error'=>$error
						);
            $this->load->view('login',$data);
        } else {
			$upload_data = $this->upload->data();
			$login_id = $this->loginmodel->insert_user($name, $email, $password);
			 $this->loginmodel->update_profpic($email,$upload_data['file_name']);
			 $sess_array = array(
			  'id'=>$login_id,
                'email' => $email,
				'name'=>$name,
				'image'=>$upload_data['file_name']
            );
			    $this->session->set_userdata($sess_array);
            redirect('homeController/index');
		}
			//$this->load->view('success');
        
			 
        }
    }
    //return FALSE since email_check test failed as result is TRUE as email exists
    function email_check($str) {
        $this->load->model('loginmodel');
        $result = $this->loginmodel->check_email_existing($str);
        if($result==TRUE)
            return FALSE;
        else
            return TRUE;
    }

}


 ?>