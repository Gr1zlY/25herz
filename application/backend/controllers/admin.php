<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
	}
	
	function index()
	{
		redirect('admin/posts');
		/*$data['title'] = 'Админпанель';
		$data['page'] = 'menu';
		$this->load->view('template', $data);*/
	}
	
	function posts(){
	
		$data['posts'] = $this->blog_model->aGetPreviews(100, 0);
	
		$data['title'] = 'Просмотр постов';
		$data['page'] = 'blog/multiple';
		$this->load->view('template', $data);
	}
	
	function editpost(){
	
		$id = (int)$this->uri->segment(3);
			
		if($id != FALSE){
				
			if ($this->form_validation->run('post') != FALSE){
				if($this->blog_model->aUpdatePost($id) != FALSE)
					$this->session->set_flashdata('success', 'Пост изменен успешно!');
			}

			$data['post'] = $this->blog_model->aGetPost($id);
			$data['categories'] = $this->blog_model->aGetCategories();
			
			if($data['post'] == FALSE OR $data['categories'] == FALSE)
				throw new Exception(404);
		
			$data['title'] = 'Редактирование статьи';
			$data['page'] = 'blog/single';
			$this->load->view('template', $data);
			
		}
		else{
			show_404('page');
		}
	}
	
	function newpost(){
	
		if ($this->form_validation->run('post') != FALSE){
		
			$id = $this->blog_model->aCreatePost();
			if($id != FALSE) {
				$this->session->set_flashdata('success', 'Пост успешно создан!');
				redirect('admin/posts');
			}
		}

		$data['categories'] = $this->blog_model->aGetCategories();
	
		$data['title'] = 'Создание статьи';
		$data['page'] = 'blog/newsingle';
		$this->load->view('template', $data);
	}
	
	function delete(){
	
		$id = (int)$this->uri->segment(3);
		if($id == FALSE)
			show_404('page');
		else{
			if($this->blog_model->aDeletePost($id)){
				$this->session->set_flashdata('success', 'Пост успешно удален!');
				redirect('admin/posts');				
			}
		}
	}
	
	function deletecomment(){

		$this->load->model('comment_model');
		
		$id = (int)$this->uri->segment(3);
		if($id == FALSE)
			show_404('page');
		else{
			if($this->comment_model->aDeleteComment($id)){
				$this->session->set_flashdata('success', 'Комментарий удален!');
				redirect('admin/viewcomments');
			}
		}
	}
	
	function viewcomments(){
	
		$this->load->model('comment_model');
		
		$data['comments'] = $this->comment_model->aGetComments(100, 0);
		
		$data['title'] = 'Управление комментариями';		
		$data['page'] = 'comments/view';
		$this->load->view('template', $data);
	}
	
	function _remap($method)
	{
		if($this->session->userdata('logged_in') == TRUE){
			$this->$method();
		}
		else{
			redirect('authorization');
		}
	}
}
