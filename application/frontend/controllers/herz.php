<?php

class Herz extends MY_Controller {

	function Herz()
	{
		parent::MY_Controller();
		
		 $this->load->scaffolding('categories');	
	}
	
	function index()
	{
		$data['previews'] = $this->blog_model->sGetPreviews(100, 0);
		$categories = $this->blog_model->sGetCategories();

		if($data['previews'] != FALSE){
			$i_max = count($data['previews']);
			for($i = 0; $i < $i_max; $i++){
				$data['previews'][$i]['category'] = $this->_get_category($categories, $data['previews'][$i]['category']);
			}
		}
		
		$data['meta'] = $this->get_meta('index');
		$data['page'] = 'blog/multiple';
		$this->load->view('template', $data);
	}
	
	function _loadpage($raw_category){
		
		try {
	
			$category = $this->blog_model->sGetCategoryInfo($raw_category);
			
			if($category == FALSE){
				throw new Exception(404);				
			}
			else{
				if($this->uri->rsegment(3) == FALSE){

					$data['previews'] = $this->blog_model->sGetCategoryPreviews($category, 100, 0);

					$data['meta'] = $this->get_meta('index');
					$data['page'] = 'blog/multiple';
					$this->load->view('template', $data);
				}
				else{
					
					$data = $this->blog_model->sGetPost($category['id'], $this->uri->rsegment(3));
		
					if($data == FALSE){
						throw new Exception(404);
					}
					else{
				
						$this->load->model('comments_model');	
								
						if($this->form_validation->run('comment') == TRUE)
							$this->comments_model->sCreateComment($this->_comment($data['id']));
							
						$data['captcha'] = $this->_create_captcha();
						$data['comments'] = $this->comments_model->sGetComments($data['id']);
			
						$data['meta'] = $this->get_meta($data);
						$data['page'] = 'blog/single';
						$this->load->view('template', $data);
					}
				}
				
			}
		}
		catch(Exception $e){
			show_404('page');
		}

	}
	
	function _remap($method)
	{
		if($method == 'index'){
			$this->$method();
		}
		else{
			$this->_loadpage($method);
		}
	}
	
	function _comment($id){
		return array(
			'name' => $this->input->post('name'),
			'comment' => $this->input->post('comment'),
			'time' => time(),
			'ip' => $this->input->ip_address(),
			'parent_id' => $this->input->post('parent_id'),
			'post_id' => $id
		);
	}
	
	function _get_category($categories, $id){
	
		$i_max = count($categories);
		for($i = 0; $i < $i_max; $i++){
			if($id == $categories[$i]['id'])
				return $categories[$i]['clink'];
		}
		
		return FALSE;
	}
}
