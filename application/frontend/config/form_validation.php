<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$config = array(
		/*'page' => array(
			array(
				'field' => 'title',
				'label' => 'title',
				'rules' => 'required|max_length[80]'
			),
			array(
				'field' => 'url',
				'label' => 'url',
				'rules' => 'required|max_length[80]'
			),
			array(
				'field' => 'short_description',
				'label' => 'short_description',
				'rules' => 'required'
			),
		),*/
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
		/*'login' => array(
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
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'password',
				'label' => 'Password',
                'rules' => 'required|md5'
            ),
            array(
                'field' => 'email',
				'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'name',
				'label' => 'Name',
                'rules' => 'trim|required'
            )
		),
		'image' => array(
            array(
                'field' => 'alt',
                'label' => 'alt',
                'rules' => 'required'
            )
		)*/
	);
