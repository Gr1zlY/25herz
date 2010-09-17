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

		$comment = $this->aGetBasicComment($id);
		$this->sDecreaseCounter($comment['post_id']);
	
		$this->db->where('id', (int)$id);
		return $this->db->delete('comments');					
	}

	protected function aGetBasicComment($id){
		$this->db->select('id, post_id');
		$this->db->where('id', $id);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
		return FALSE;
	}

	protected function sDecreaseCounter($post_id){

		$this->db->set('comments_qty', 'comments_qty - 1', FALSE);
		$this->db->where('id' , $post_id);
		$this->db->update('blog');
	}
}

