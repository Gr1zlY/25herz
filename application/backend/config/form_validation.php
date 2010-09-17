<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$config = array(

		'post' => array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'link',
				'label' => 'Link',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'categories',
				'label' => 'Categories',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'preview',
				'label' => 'Post preview',
				'rules' => 'required'
			)
		),
		'login' => array(
			array(
				'field' => 'login',
				'label' => 'Login',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|md5'
			)
		),		
		'newmember' => array(
			array(
				'field' => 'login',
				'label' => 'Login',
				'rules' => 'trim|required|callback__checkuser'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|matches[passconf]|md5'
			),
			array(
				'field' => 'passconf',
				'label' => 'Password confirmation',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email|callback__checkuser'
			),
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim|required'
			)
		),
		'editmember' => array(
			array(
				'field' => 'login',
				'label' => 'Login',
				'rules' => 'trim'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'matches[passconf]|md5'
			),
			array(
				'field' => 'passconf',
				'label' => 'Password confirmation',
				'rules' => ''
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|valid_email'
			),
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim'
			)
		)
	);
