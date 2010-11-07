<?php

class Herz extends MY_Controller {

	function Herz()
	{
		parent::MY_Controller();

				$this->load->library('pagination');

	}
	
	function index()
	{
		$config['base_url'] = site_url('index');
		$config['total_rows'] = $this->blog_model->sGetNumPosts('1');
		$config['per_page'] = '4';
		$config['uri_segment'] = 2;
		
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		
		$config['first_tag_close']	= '';
		$config['last_tag_open']	= '';
		$config['next_tag_open']	= '';
		$config['next_tag_close']	= '';
		$config['prev_tag_open']	= '';
		$config['num_tag_open']		= '';

		$this->pagination->initialize($config); 
		
		//$data['previews'] = $this->blog_model->sGetPreviews(100, 0);
		/*We are getting just 'blog' comments*/
		$data['previews'] = $this->blog_model->sGetCategoryPreviews(array('id' => '1', 'clink' => 'blog'), $config['per_page'], $this->uri->segment(2));
		$categories = $this->blog_model->sGetCategories();
		$members = $this->blog_model->sGetMembers();

		$this->_get_info($categories, $members, $data['previews']);
		
		$data['meta'] = $this->get_meta('index');
		$data['page'] = 'blog/multiple';
		$this->load->view('template', $data);
	}
	
	function _loadpage($raw_category){
		
		$category = $this->blog_model->sGetCategoryInfo($raw_category);
			
		if($category != FALSE AND $this->uri->rsegment(3) == FALSE){

			$categories = $this->blog_model->sGetCategories();
			$members = $this->blog_model->sGetMembers();
				
			$data['previews'] = $this->blog_model->sGetCategoryPreviews($category, 100, 0);
			$this->_get_info($data['categories'], $members, $data['previews']);

			$data['meta'] = $this->get_meta('index');
			$data['page'] = 'blog/multiple';
			$data['category'] = $category;
			$this->load->view('template', $data);

		}
		else if($category != FALSE AND $this->uri->rsegment(3) != FALSE){
				
				$members = $this->blog_model->sGetMembers();
				$data = $this->blog_model->sGetPost($category['id'], $this->uri->rsegment(3));
		
				if($data != FALSE){

					if($data['disallow_comments'] == FALSE){

						$this->load->model('comments_model');

						if($this->form_validation->run( ($this->session->userdata('logged_in') == TRUE)?'member_comment':'comment') == TRUE)
							$this->comments_model->sCreateComment($data['id']);

						$this->_get_member($members, $data, TRUE);

						$data['captcha'] = $this->_create_captcha();
						$data['comments'] = $this->comments_model->sGetComments($data['id']);
					}
					
					$data['meta'] = $this->get_meta($data);
					$data['page'] = 'blog/single';
					$data['category'] = $category;
					$this->load->view('template', $data);
				}
				else{
					show_404();
				}
		}
		else {
			show_404('page');
		}
	}
	
	function _remap($method)
	{
		if(method_exists($this, $method) AND $method[0] != '_'){
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

			$num_categories = count($categories);
			$num_members =  count($members);

			$i_max = max($num_categories, $num_members);
			
			for($i = 0; $i < $i_max; $i++){
				if( $i< $num_categories AND ($previews['category'] == $categories[$i]['id']))
					$previews['category'] = $categories[$i]['clink'];
				if($i < $num_members AND $previews['author'] == $members[$i]['id'])
					$previews['author'] = $members[$i]['name'];
				if($i <$num_members AND $previews['author'] == '0')
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