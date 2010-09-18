<?php

class Category extends Controller {

	function Category()
	{
		parent::Controller();

		$this->load->model('category_model');
	}

	function index()
	{

		$data['categories'] = $this->category_model->aGetCategories(100, 0);

		$data['title'] = 'Управление категориями';
		$data['page'] = 'categories/categories';
		$this->load->view('template', $data);
	}

	function newcategory(){

		if ($this->form_validation->run('newcategory') != FALSE){

			$id = $this->category_model->aCreateCategory();
			if($id != FALSE) {
				$this->session->set_flashdata('success', 'Категория успешно создана!');
				redirect('category');
			}
		}

		$data['title'] = 'Создание категории';
		$data['page'] = 'categories/newcategory';
		$this->load->view('template', $data);
	}

	function edit(){

		$id = (int)$this->uri->segment(3);
	
		if($id != FALSE){

			if ($this->form_validation->run('category') != FALSE){
				if($this->category_model->aUpdateCategory($id) != FALSE){
					$this->session->set_flashdata('success', 'Категория успешно изменена!');
					redirect('category');
				}
			}

			$data = $this->category_model->aGetCategory($id);

			$data['title'] = 'Редактирование категории';
			$data['page'] = 'categories/editcategory';
			$this->load->view('template', $data);

		}
		else show_404('page');
	}

	function delete(){

		$id = (int)$this->uri->segment(3);
		if($id == FALSE)
			show_404('page');
		else{
			if($this->category_model->aDeleteCategory($id)){
				$this->session->set_flashdata('success', 'Категория успешно удалена!');
				redirect('category');
			}
		}
	}

	function _checklink($link){
		$this->form_validation->set_message('_checklink', 'Категория с такой %s уже существует');

		if(!$this->category_model->aCheckLink($link)){
			return TRUE;
		}
		return FALSE;
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
