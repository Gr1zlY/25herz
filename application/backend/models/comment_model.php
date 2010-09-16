<?php

class Comment_model extends Model {

	function Comment_model()
	{
		parent::Model();
	}

	
	function aGetComments($limit, $offset){
	
		$this->db->select('id, time, name, comment, parent_id, post_id');
		$this->db->order_by('time', 'desc'); 
		$query = $this->db->get('comments', $limit, $offset);	
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
		return FALSE;		
	}
	
	function aDeleteComment($id){
	
		$this->db->where('id', (int)$id);
		return $this->db->delete('comments');					
	}

	
	/*function mGetCommentsCount($id){
	
		$this->db->where('post_id', $id);
		$this->db->from('comments');
		
		return $this->db->count_all_results();
	}*/
}

