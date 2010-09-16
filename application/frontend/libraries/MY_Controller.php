<?php

class MY_Controller extends Controller{

	function MY_Controller(){
	
		parent::Controller();
	}
	
	function get_meta($data){
		
		if(!is_string($data) AND (is_array($data)  OR count($data) != 0)){
			return array(
					'meta_tags' => $data['meta_tags'],
					'meta_description' => $data['meta_description'],
					'title' => $data['title']
				);
		}
		else if(is_string($data)){
			return $this->config->item($data);
		}
		else{
			return $this->config->item('index');
		}
	}
	
	function _create_captcha(){
		
		$this->load->plugin('captcha');
		
		$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'/captcha/'
		);
		$captcha = create_captcha($vals);
		
		if($captcha != FALSE){
			
			$captcha_data = array(
					'captcha_id'	=> '',
					'captcha_time'	=> $captcha['time'],
					'ip_address'	=> $this->input->ip_address(),
					'word'			=> $captcha['word']
				);

			$query = $this->db->insert_string('captcha', $captcha_data);			
			if($this->db->query($query) != FALSE)
				return $captcha;
			
		}
		
		return FALSE;
	}
	
	function _check_captcha($captcha_text){
		
		$expiration = time() - 7200; // Two hour limit
		$this->db->where('captcha_time <', $expiration)->delete('captcha');

		$this->db->where('word', $captcha_text);
		$this->db->where('ip_address', $this->input->ip_address());
		$this->db->where('captcha_time >', $expiration);
		$query = $this->db->get('captcha');
		$count = $query->num_rows();
		
		$this->db->where('word', $captcha_text);
		$this->db->where('ip_address', $this->input->ip_address());
		$this->db->delete('captcha');
				
		if ($count != 0){
			return TRUE;
		}
		
		$this->form_validation->set_message('_check_captcha', 'Вы неправильно ввели символы с изображения.');
		return FALSE;
	}
}
