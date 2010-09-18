<?php

class Category_model extends Model {

	function Category_model()
	{
		parent::Model();
	}

	function aGetCategories($limit, $offset){

		$this->db->select('id, clink, ctitle, meta_tags, meta_description');

		$query = $this->db->get('categories', $limit, $offset);

		if ($query->num_rows() > 0)
			return $query->result_array();

		return FALSE;
	}

	function aCreateCategory(){

		$data = array(
			'meta_tags' => $this->input->post('meta_tags'),
			'meta_description' => $this->input->post('meta_description'),
			'ctitle' => $this->input->post('ctitle'),
			'clink' => $this->input->post('clink'),
		);

		$this->db->insert('categories', $data);

		return $this->db->insert_id();
	}

	function aUpdateCategory($id){

		$data = array(
			'meta_tags' => $this->input->post('meta_tags'),
			'meta_description' => $this->input->post('meta_description'),
			'ctitle' => $this->input->post('ctitle'),
			'clink' => $this->input->post('clink'),
		);

		$this->db->where('id', $id);
		$this->db->update('categories', $data);

		return $this->db->insert_id();
	}

	function aDeleteCategory($id){
		$this->db->where('id', $id);
		return $this->db->delete('categories');
	}

	function aGetCategory($id){

		$this->db->select('id, clink, ctitle, meta_tags, meta_description');
		$this->db->where('id', $id);

		$this->db->limit(1);
		$query = $this->db->get('categories');

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


}
