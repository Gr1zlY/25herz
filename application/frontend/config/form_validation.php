<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$config = array(
		'comment' => array(
			array(
				'field' => 'name',
				'label' => 'Username',
				'rules' => 'trim|required|min_length[3]|max_length[20]'
			),
			array(
				'field' => 'comment',
				'label' => 'Comment',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'captcha',
				'label' => 'Captcha',
				'rules' => 'required|callback__check_captcha'
			)
		),
		'member_comment'  => array(
			array(
				'field' => 'comment',
				'label' => 'Comment',
				'rules' => 'trim|required'
			)
		),
	);
