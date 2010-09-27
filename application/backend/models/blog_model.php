<?php

class Blog_model extends Model {

	function Blog_model()
	{
		parent::Model();
	}

	function aGetPreviews($limit, $offset){
	
		$this->db->select('id, category, link, title, author, preview, time');

		$query = $this->db->get('blog', $limit, $offset);
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		
		return FALSE;					
	}
	
	function aCreatePost(){
	
		$post = array(
			'meta_tags' => $this->input->post('meta_tags'),
			'meta_description' => $this->input->post('meta_description'),
			'title' => $this->input->post('title'),
			'post' => $this->input->post('post'),
			'link' => $this->input->post('link'),
			'category' => $this->input->post('categories'),
			'post' => $this->input->post('post'),
			'preview' => $this->input->post('preview'),
			'author' =>$this->session->userdata('id'),
			'time' => time()
		);
		
		$this->db->insert('blog', $post);
		
		return $this->db->insert_id();		
	}
	
	function aUpdatePost($id){
	
		$post = array(
			'meta_tags' => $this->input->post('meta_tags'),
			'meta_description' => $this->input->post('meta_description'),
			'title' => $this->input->post('title'),
			'post' => $this->input->post('post'),
			'link' => $this->input->post('link'),
			'category' => $this->input->post('categories'),
			'post' => $this->input->post('post'),
			'preview' => $this->input->post('preview')
		);
		
		$this->db->where('id', $id);		
		$this->db->update('blog', $post);
		
		return $this->db->insert_id();
	}
/*
	function sGetCategoryPreviews($category, $limit, $offset){
	
		$this->db->select('id, link, title, author, preview, time');		
		$this->db->where('category', $category);
		
		$query = $this->db->get('blog', $limit, $offset);
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		
		return FALSE;					
	}*/
	
	function aGetPost($id){
	
		$this->db->select('id, category, link, title, author, preview, post, meta_tags, meta_description');
		$this->db->where('id', $id);

		$this->db->limit(1);
		$query = $this->db->get('blog');
		
		if ($query->num_rows() > 0)
			return $query->row_array();
		
		return FALSE;					
	}
	
	/*function sGetCategoryID($link){
			
		$this->db->select('id');
		
		if(is_numeric($link))
			return $link;
		else
			$this->db->where('clink', $link);
		
		$query = $this->db->get('categories');
		
		return ($query->num_rows() > 0) ? $query->row()->id : FALSE;
	}
	*/
	
	function aDeletePost($id){
		
		if(isset($id)){
		
			$this->db->where('id', $id);
			$this->db->delete('blog'); 

			$this->db->where('post_id', $id);
			$this->db->delete('comments');
			
			return TRUE;
		}
		
		return FALSE;
	}
	
	function aGetCategories(){
			
		$this->db->select('id, ctitle');
		$query = $this->db->get('categories');
		
		if($query->num_rows() > 0)
			return $query->result_array();
			
		return FALSE;
	}
	
}
