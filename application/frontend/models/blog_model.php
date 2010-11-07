<?php

class Blog_model extends Model {

	function Blog_model()
	{
		parent::Model();
	}

	function sGetPreviews($limit, $offset){
	
		$this->db->select('id, link, title, author, preview, time, category, comments_qty');
		$this->db->where('draft', FALSE);

		$this->db->order_by('time', 'desc');		

		$query = $this->db->get('blog', $limit, $offset);
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		
		return FALSE;					
	}

	function sGetCategoryPreviews($category, $limit, $offset){
	
		$this->db->select('id, link, title, author, preview, time, category, comments_qty');
		$this->db->where('category', $category['id']);
		$this->db->where('draft', FALSE);
		
		$this->db->order_by('time', 'desc');
		
		$query = $this->db->get('blog', $limit, $offset);
		
		if ($query->num_rows() > 0){
		
			/*
				Данный код имеет историческую ценность. Любое изменение,
				удаление, изменение форматирования, значения переменных
				или называение говнокодом преследуется законом!
			*/
		
			/*function replace_category($preview_item, $category)
			{
				echo $category;
				$preview_item['category'] = $category['clink'];
				return $preview_item;
				//echo $n['id'];
				//return $n;
			}

			return array_map("replace_category", $query->result_array(), $category);*/
			//$replacements = array('category' => $category['clink']);
			//print_r($category);
			return array_map(create_function('$preview_item, $category = \''.$category['clink'].'\'', '$preview_item[\'category\'] =  $category; return $preview_item;'), $query->result_array());
			
			//return array_replace($query->result_array(), $replacements);
		}
		
		return FALSE;					
	}
	
	function sGetPost($category, $link){
	
		$this->db->select('id, title, author, preview, post, time, meta_tags, meta_description');
		$this->db->where('category', $category);
		$this->db->where('draft', FALSE);
		
		if(is_numeric($link))
			$this->db->where('id', $link);
		else
			$this->db->where('link', $link);

		$this->db->limit(1);
		$query = $this->db->get('blog');
		
		if ($query->num_rows() > 0)
			return $query->row_array();
		
		return FALSE;					
	}
	
	function sGetCategoryInfo($link){
	
		$this->db->select('id, clink, ctitle');
	
		if(is_numeric($link))     $this->db->where('id', $link);
		else 				$this->db->where('clink', $link);	
		
		$query = $this->db->get('categories');
		
		if($query->num_rows() > 0)
			return $query->row_array();
			
		return FALSE;
	}
	
	function sGetCategoryTitle($id){
			
		$this->db->select('clink');
		$this->db->where('id', $id);
		
		$query = $this->db->get('categories');
		
		return ($query->num_rows() > 0) ? $query->row()->clink : FALSE;
	}
	
	function sGetCategories(){
			
		$this->db->select('id, clink, ctitle');
		$query = $this->db->get('categories');
		
		if($query->num_rows() > 0)
			return $query->result_array();
			
		return FALSE;
	}

	function sGetMembers(){

		$this->db->select('id, name');
		$query = $this->db->get('members');

		if($query->num_rows() > 0)
			return $query->result_array();

		return FALSE;
	}

	function sGetNumPosts($category = FALSE){
		if($category != FALSE) $this->db->where('category', $category);
		return $this->db->count_all_results('blog');
	}
}