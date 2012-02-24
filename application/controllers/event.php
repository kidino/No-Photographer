<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
	}

	function index()
	{
	
		$this->data['events'] = array();
		
		for($i = 0; $i < 15; $i++) {	
			$a = $i + 1;
			$ev = array(
				'event_id' => $a,
				'event_name' => 'Dinner Night 2012',
				'location' => 'Some Resort, Ampang, Kuala Lumpur',
				'date_start' => '12 June 2012',
				'total_tags' => 100,
				'total_photos' => 999,
				'featured_photo' => 'http://placehold.it/260x180',
				'total_attendees' => 555
			);
			
			$this->data['events'][] = $ev;
		}
		$this->load->view('home', $this->data);
	}
	
	function go() {
		$this->load->view('event_details', $this->data);
	}
	
}

