<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
	}

	function index()
	{
		redirect('/');
	}
	
	function go() {
		$this->load->view('photo_details', $this->data);
	}
	
}

