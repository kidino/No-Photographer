<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('m_event');
	}

	// list all events and album
	function index()
	{
		$this->data['events'] = $this->m_event->get_all_events();
		$this->load->view('home', $this->data);
	}
	
	// to display an event with all the photos that has been uploaded
	function go() {
		$event_slug = $this->uri->segment(2);
		if (!$this->data['event'] = $this->m_event->get_event_by_slug($event_slug)) {
			redirect('404');
		}
		$this->data['photos'] = $this->m_event->get_all_photos($this->data['event']['event_id']);
		$this->load->view('event_details', $this->data);
	}
	
	// create new event form
	function create_new() {
	
		$this->load->library('form_validation');
		$this->data['timezone'] = $this->config->item('np_timezone');
	
		if ($_POST) {
			$this->form_validation->set_rules('event_name', 'Event Name', 'trim|required|xss_clean');
			$this->form_validation->set_message('event_name', 'Error Message');
			
			
			$this->form_validation->set_rules('slug', 'URL Name', 'trim|required|alpha_dash|is_unique[np_events.slug]|max_length[16]|xss_clean');
			$this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
			$this->form_validation->set_rules('date_start', 'Date Start', 'required');
			$this->form_validation->set_rules('date_end', 'Date End', 'required');
			$this->form_validation->set_rules('private', 'Login to View', 'trim|xss_clean');
			$this->form_validation->set_rules('event_desc', 'Event Details', 'trim|xss_clean');

			if ($this->form_validation->run()) { // validation ok, can add new one now
				
				
				$new_event = array(
					'event_name' => $this->input->post('event_name'),
					'slug' => $this->input->post('slug'),
					'location' => $this->input->post('location'),
					'date_start' => $this->input->post('date_start'),
					'date_end' => $this->input->post('date_end'),
					'created_by' => $this->tank_auth->get_user_id(),
					'event_desc' => $this->input->post('event_desc')
				);
				
				// redirect to event detail page on success
				if ( $event_id = $this->m_event->save($new_event) ) {
					redirect('event/'.$new_event['slug'] );
				}
			}
		}
		$this->load->view('new_event_form', $this->data);
	}

	function check_date($dateTime)
	{
		if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $dateTime, $matches))
		{ 
			if (checkdate($matches[2], $matches[3], $matches[1]))
			{ 
				return TRUE; 
			} 
		} 
		return FALSE;
	} 
	
}

