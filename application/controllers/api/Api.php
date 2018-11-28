<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller
{
	function __construct($config = 'rest')
	{
		parent::__construct($config);
	}

	function index_get()
	{
		$info = array(
			'version' => '0.1-dev',
			'name' => 'API Sim SDM'
		);
		$this->response($info);
	}

}
