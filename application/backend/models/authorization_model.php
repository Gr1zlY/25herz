<?php

class Authorization_model extends Model {

	function Authorization_model()
	{
		parent::Model();	
	}
	
	function Authorize($login, $password){
	
		$this->db->select('id, email, permissions, name, login');
	
		//$where = "(login='$login' AND password='$password') OR (email='$login' AND password='$password')";
		//$this->db->where($where);
		//$this->db->or_where('login', $login);
		
		$this->db->where('email', $login);		
		$this->db->where('password', $password);

		$query = $this->db->get('members', 1);

		if($query->num_rows() > 0)		
			return $query->row_array();
			
		return FALSE;
	}

		
	function aGetUsers($limit, $offset){
	
		$this->db->select('id, email, permissions, name, login');
		$query = $this->db->get('members', $limit, $offset);
		
		if($query->num_rows() > 0)
			return $query->result_array();
			
		return FALSE;
	}
	
	function aGetUserData($id){
	
		$this->db->select('id, email, permissions, name, login');
	
		if(is_numeric($id))
			$this->db->where('id', $id);
		else{
			$this->db->where('login', $id);
			$this->db->or_where('email', $id);
		}
		
		$query = $this->db->get('members', 1);
		
		if($query->num_rows() > 0)
			return $query->row_array();
			
		return FALSE;
	}

		
	function aCreateAccount(){
	
		$data = array(
				'name' => $this->input->post('name'),
				'login' => $this->input->post('login'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'permissions' => '777'			
			);
		
		$this->db->insert('members', $data);
		
		return $this->db->insert_id();
	}
	
	function aUpdateUser($id){
	
		$data = array(
				'name' => $this->input->post('name'),
				'login' => $this->input->post('login'),
				'email' => $this->input->post('email'),
				'permissions' => '777'
			);
		if($this->input->post('password') != FALSE)
			$data['password'] = $this->input->post('password');
		
		$this->db->where('id', $id);
		$this->db->update('members', $data);
		
		return $this->db->insert_id();
	}
	
	/*function sChangePassword($email, $oldpass, $newpass){
		
		$this->db->select('id');
	
		$this->db->where('email', $email);
		$this->db->where('password',  $oldpass);

		$query = $this->db->get('members', 1);

		if($query->num_rows() > 0){
			
			$id = $query->row()->id;
		
			$this->db->where('id', $id);
			$data = array('password' => $newpass);
			$this->db->update('members', $data);
			
			return TRUE;
		}
		return FALSE;
	}*/
	
	function aDeleteUser($id){
		$this->db->where('id', $id);
		$this->db->delete('members');

		return TRUE;
	}
	
	function aCheckInput($id){
	
		$this->db->where('email', $id);
		$this->db->or_where('login', $id);
		
		$query = $this->db->get('members');
		
		if($query->num_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

}
