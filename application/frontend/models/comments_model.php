<?php

class Comments_model extends Model {

	function Comments_model()
	{
		parent::Model();
	}
	
	function sCreateComment($data_to_insert){
	
		$this->db->insert('comments', $data_to_insert);
		return $this->db->insert_id();
	}
	
	function sGetComments($id){
	
		$this->db->select('name, comment, id, parent_id, time');
		$this->db->where('post_id', $id);
		$this->db->order_by('time', 'asc');
		
		$query = $this->db->get('comments');
				
		if ($query->num_rows() > 0){
			$comments = $query->result_array();
			
			$new_comments = array();
			
			for($i = 0; $i<count($comments); $i++){
				if($comments[$i]['parent_id'] == FALSE){
					$new_comments[] = $comments[$i];
					$this->getParent($comments, $new_comments,  $comments[$i]['id'], $i);
				}
			}
			return $new_comments;
		}
		
		return FALSE;					
	}
	
	function getParent(&$comments, &$new_comments,  $id, $start_index){
		
		for($i = $start_index; $i<count($comments); $i++){
			if($comments[$i]['parent_id'] == $id){
				$new_comments[] = $comments[$i];
				$this->getparent($comments, $new_comments,  $comments[$i]['id'], $i);
			}
		}
		return FALSE;
	}
	
/*	function aUpdateComment($id, $data_to_insert){
	
		$this->db->where('id', $id);
		$this->db->update('posts', $data_to_insert);
		return $this->db->insert_id();
	}
*/
	
	function mGetCommentsCount($id){
	
		$this->db->where('post_id', $id);
		$this->db->from('comments');
		
		return $this->db->count_all_results();
	}

	function sIncreaseCounter($post_id){
		
		$this->db->set('comments_qty', 'comments_qty + 1', FALSE);
		$this->db->where('id' , $post_id);
		$this->db->update('blog');
	}
}