<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		$this->data = array();
		
		if (!$this->tank_auth->is_logged_in()) {
			$data['user_id']	= 0;
			$data['username']	= 'Stranger';
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
		}
		$this->load->vars($data);

    }
}