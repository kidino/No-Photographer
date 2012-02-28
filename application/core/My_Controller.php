<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


define('NONE_LEVEL', 0);
define('GUEST_LEVEL', 10);
define('ATTENDEE_LEVEL', 20);
define('ORGANIZER_LEVEL', 30);
define('ADMIN_LEVEL', 40);

class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		$this->data = array();
		
		if (!$this->tank_auth->is_logged_in()) {
			$data['user_id']	= 0;
			$data['username']	= 'Stranger';
			$data['role'] = 'none';
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['role'] = $this->tank_auth->get_role();
		}
		
		switch ( $data['role'] ) {
			case 'none': $data['access_level'] = NONE_LEVEL; break;
			case 'guest': $data['access_level'] = GUEST_LEVEL; break;
			case 'attendee': $data['access_level'] = ATTENDEE_LEVEL; break;
			case 'organizer': $data['access_level'] = ORGANIZER_LEVEL; break;
			case 'admin': $data['access_level'] = ADMIN_LEVEL; break;
		}
		
		$this->load->vars($data);

    }
}