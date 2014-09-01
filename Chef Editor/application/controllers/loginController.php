<?php

class loginController extends CI_Controller{

public function __construct(){

		parent::__construct();
$this->config->load('facebook');
	$this->load->library('facebook');


}

public function index(){
//$this->session->sess_destroy();
$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
$this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
$this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
$this->output->set_header('Pragma: no-cache');


$data = array(
                        'loginUrl' =>$this->facebook->get_login_url(),
						'error'=>null
						);
                        
$this->load->view('login',$data);
}

public function checklogin()
{
$this->form_validation->set_rules('email','email','required|valid_email');
$this->form_validation->set_rules('password','Password','required|callback_verifyuser');

if($this->form_validation->run() ==false)
{	


$data = array(
                        'loginUrl' =>$this->facebook->get_login_url(),
						'error'=>null
						);
$this->load->view('login',$data);
}
else
{
redirect('homeController/index');
}

}

public function verifyuser()
{
$email=$this->input->post('email');
$pass=$this->input->post('password');
$this->load->model('loginmodel');
$result=$this->loginmodel->login($email,$pass);
if($result)
{
            $sess_array = array();
            foreach ($result as $res) {
                $sess_array = array(
                    'id' => $res->id,
                    'email' => $res->email,
                    'name' => $res->name,
					'image'=>$res->image
                );
                $this->session->set_userdata($sess_array);
			}
return $this->session->userdata('id');
}
else
{
$this->form_validation->set_message('verifyuser',"Incorrect email or password. Please try again" );
return false;
}
}


public function fblogin()
{
        $this->load->model('loginmodel');
		$this->user=$this->facebook->get_user();
		//echo var_dump($this->user);
        if ($this->user) {
//echo "if";
            try {

                $user_profile = $this->facebook->api('/me');
                $profile_picture = 'http://graph.facebook.com/' . $user_profile['id'] . '/picture?type=large';


                if (($this->loginmodel->check_email_existing($user_profile['email'])) == TRUE) {
                    $result = $this->loginmodel->get_user_by_email($user_profile['email']);
					  $this->loginmodel->update_profpic($user_profile['email'], $profile_picture);
                    foreach ($result as $res) {
                        $sess_array = array(
                            'id' => $res->id,
                            'email' => $res->email,
                            'name' => $res->name,
                            'image' => $res->profile_pic
                        );
                    }
                    $this->session->set_userdata($sess_array);
                } else {
					//echo "else";
                    
                  
                    if(isset($user_profile['email']) && isset($user_profile['name']))
                    {
                        $sess_array = array(
                            'id' => $insert_id,
                            'email' => $user_profile['email'],
                            'name' => $user_profile['name'],
                            'image' => $profile_picture
                        );
                        $this->session->set_userdata($sess_array);
                    }
                }
				
                redirect('homeController/index');
            } catch (FacebookApiException $e) {

               print_r($e);
                $user = null;
            }
        }
}


}
?>