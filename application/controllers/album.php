<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
	}

	function index()
	{
		$this->load->view('welcome', $this->data);
	}
}

