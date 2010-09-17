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
		$members = $this->blog_model->sGetMembers();

		$this->_get_info($categories, $members, $data['previews']);
		
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
				$members = $this->blog_model->sGetMembers();
				
				if($this->uri->rsegment(3) == FALSE){

					$data['previews'] = $this->blog_model->sGetCategoryPreviews($category, 100, 0);
					$this->_get_info($categories, $members, $data['previews']);

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
								
						if($this->form_validation->run('comment') == TRUE || ($this->session->userdata('logged_in') == TRUE AND $this->form_validation->run('member_comment') == TRUE))
							$this->comments_model->sCreateComment($data['id']);

						$this->_get_member($members, $data, TRUE);

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
	
	function _get_info(&$categories, &$members, &$previews, $post = FALSE){

		if($post == FALSE AND $previews != FALSE){
			for($i = 0, $i_max = count($previews); $i < $i_max; $i++){
				$this->_get_info($categories, $members, $previews[$i], TRUE);
			}
		}
		else if($previews != FALSE){
			$i_max = max(count($categories), count($members));
			for($i = 0; $i < $i_max; $i++){
				if($previews['category'] == $categories[$i]['id'])
					$previews['category'] = $categories[$i]['clink'];
				if($previews['author'] == $members[$i]['id'])
					$previews['author'] = $members[$i]['name'];
				if($previews['author'] == '0')
					$previews['author'] = 'Anonimous';
			}
		}
		return FALSE;
	}

	function _get_member($members, &$previews, $post = FALSE){

		if($post == FALSE AND $previews != FALSE){
			for($i = 0, $i_max = count($previews); $i < $i_max; $i++){
				$this->_get_info($members, $previews[$i], TRUE);
			}
		}
		else if($previews != FALSE){
			$i_max = count($members);
			for($i = 0; $i < $i_max; $i++){
				if($previews['author'] == $members[$i]['id']){
					$previews['author'] = $members[$i]['name'];
					return TRUE;
				}
				if($previews['author'] == '0'){
					$previews['author'] = 'Anonymous';
					return TRUE;
				}
			}
		}
		return FALSE;
	}
}