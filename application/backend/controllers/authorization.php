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

	function editmember(){
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$user_id = (int)$this->uri->segment(3);
		
		if ($this->form_validation->run('editmember') != FALSE){
			$this->authorization_model->aUpdateUser($user_id);
			$this->session->set_flashdata('success', 'Настройки пользователя изменены!');

			redirect('authorization/members');
		}
		else {
			$data = $this->authorization_model->aGetUserData($user_id);
			if($data != FALSE){
				$data['title'] = 'Профиль';
				$data['page'] = 'members/editprofile';
				$this->load->view('template',$data);
			}
			else show_404('page');
		}
	}
	/*
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
