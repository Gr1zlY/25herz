<?php

class Authorization extends Controller {

	function Authorization()
	{
		parent::Controller();
		
		$this->load->model('authorization_model');
	}
	
	function index(){
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if($this->form_validation->run('login') != FALSE){
		
			$member =  $this->authorization_model->Authorize($this->input->post('login'), $this->input->post('password'));
		
			if($member != FALSE){
		
				$this->session->set_userdata($member);
				$this->session->set_userdata('logged_in', TRUE);
			
				$this->session->set_flashdata('success', 'Вы успешно авторизировались!');
				redirect('');
			}
			else
				$this->session->set_flashdata('error', 'Аккаунт не найден!');
		}
		
		$data['title'] = 'Вход в админпанель';
		$data['page'] = 'login';			
		$this->load->view('template', $data);
	}

	/*function profile(){
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run('profile') == FALSE){
			
			$data = $this->authorization_model->sGetUserAdress($this->session->userdata('id'));
			
			$data['title'] = 'Профиль';
			$data['page'] = 'profile';
			$this->load->view('test_view',$data);
		}
		else{
			$data_to_db = array (			
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'patronymic' => $this->input->post('patronymic'),
				'postcode' => $this->input->post('postcode'),
				'country' => $this->input->post('country'),
				'city' => $this->input->post('city'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),					
			);
			
			$this->authorization_model->sUpdateUser($this->session->userdata('id'), $data_to_db);
			unset($data_to_db);
			
			$data = $this->authorization_model->sGetUserAdress($this->session->userdata('id'));
			
			$data['title'] = 'Профиль';
			$data['page'] = 'profile';			
			$this->load->view('test_view',$data);
		}
	}
	
	function changepassword(){
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run('changepass') == TRUE){			
			if($this->authorization_model->sChangePassword($this->session->userdata('email'), $this->input->post('oldpassword'), $this->input->post('password')))
				$data['message'] = 'Пароль изменен.';
			else
				$data['error'] = 'Пароль не изменен.';
		}
		$data['title'] = 'Изменение пароля';
		$data['page'] = 'changepassword';
		$this->load->view('test_view',$data);
	}
	
	function logout(){
	
		$this->session->sess_destroy();  
		redirect('');
	}
	*/
	function createaccount(){
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run('newmember') == FALSE){
			
			$data['title'] = 'Регистрация';
			$data['page'] = 'members/newmember';
			$this->load->view('template', $data);
		
		}
		else{
		
			$this->authorization_model->aCreateAccount();
			
			$this->session->set_flashdata('message', 'Аккаунт успешно создан!');
			redirect('authorization/members');	
		}
		
	}
	
	function editmember(){
	
		$id = (int)$this->uri->segment(3);
		
		
	}
	
	function members(){
	
		$data['members'] = $this->authorization_model->aGetUsers(100, 0);
		
		$data['title'] = 'Управление аккаунтами';
		$data['page'] = 'members/members';
		$this->load->view('template', $data);
	}

	function deletemember(){

		$id = (int)$this->uri->segment(3);
		if($id == FALSE)
			show_404('page');
		else{
			if($this->authorization_model->aDeleteUser($id)){
				$this->session->set_flashdata('success', 'Пользователь удален!');
				redirect('authorization/members');
			}
		}
	}
	function _checkuser($id){
	
		$this->form_validation->set_message('_checkuser', 'Пользователь с таким %s уже существует');	
		
		if(!$this->authorization_model->aCheckInput($id)){
			return TRUE;
		}
		return FALSE;
	}
	
	function _remap($method){
		
		
		if($this->session->userdata('logged_in') == TRUE){
			$this->$method();
		}
		else if($method == 'index'){
			$this->index();
		}
		/*else if($method == 'createaccount'){
			$this->createaccount();
		}*/
		else{
			redirect('authorization/index');
		}
	}
	
	function logout(){
		
		$this->session->sess_destroy();  
		redirect('');
	}
}
