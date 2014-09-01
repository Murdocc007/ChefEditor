<?php

class loginmodel extends CI_Model{
	public function login($email,$pass)
	{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('email',$email);
	$this->db->where('password',MD5($pass));
	$query=$this->db->get();
	
	if($query->num_rows==1)
	{
		 return $query->result();
	}
	else
	{
	
	return false;
	}
	
}
	public function check_email_existing($str)
    {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('email', $str);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	
	public function insert_user($name, $email, $password)
    {
        $data = array(
            'email'=>$email,
			'name'=>$name,
            'password'=> MD5($password)
        );
        
        $this->db->insert('users',$data);
        $insert_id = $this->db->insert_id();
        
        return $insert_id;
    }
	
	

  
  public function get_user_by_email($email)
    {
       	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('email',$email);
	$query=$this->db->get();
	return $query->result();
    }
	
	public function update_profpic($email, $profpic) {
        $data = array(
            'image' => $profpic
        );
		
		$this->db->where('email', $email);
        $this->db->update('users', $data);
		
    }


}


?>