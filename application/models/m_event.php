<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * M_event
 *
 */
class M_event extends CI_Model
{
	private $table_name			= 'users';			// user accounts
	private $profile_table_name	= 'user_profiles';	// user profiles
	private $one_hour_fix = 3600;

	function __construct()
	{
		parent::__construct();
		
		
	}

	function get_all_events() {
		$query = $this->db->get('np_events');
		if ($query->num_rows() > 0) {
			$user_timezone = $this->config->item('np_timezone');
			$userTimezone = new DateTimeZone($user_timezone);
			$gmtTimezone = new DateTimeZone('UTC');

			$all_rows = array();
			foreach($query->result_array() as $row) {
				$date_start = new DateTime($row['date_start'], $gmtTimezone);
				$date_end = new DateTime($row['date_end'], $gmtTimezone);
				
				$start_offset = $userTimezone->getOffset($date_start);
				$end_offset = $userTimezone->getOffset($date_end);
				
				$row['date_start'] = date('Y-m-d H:i:s', $date_start->format('U') + $start_offset);
				$row['date_end'] = date('Y-m-d H:i:s', $date_end->format('U') + $end_offset);
				
				$all_row[] = $row;
			}
			return $all_row;
		}
		return NULL;
	}
	
	function get_event_by_slug($slug) {
		$query = $this->db->get_where('np_events', array('slug' => $slug), 1);
		if ($query->num_rows() > 0) {
			$event_data = $query->row_array();
			
			$user_timezone = $this->config->item('np_timezone');			
			$userTimezone = new DateTimeZone($user_timezone);
			$gmtTimezone = new DateTimeZone('UTC');

			$date_start = new DateTime($event_data['date_start'], $gmtTimezone);
			$date_end = new DateTime($event_data['date_end'], $gmtTimezone);
			
			$start_offset = $userTimezone->getOffset($date_start);
			$end_offset = $userTimezone->getOffset($date_end);
			
			$event_data['date_start'] = date('Y-m-d H:i:s', $date_start->format('U') + $start_offset - ($this->one_hour_fix * 2));
			$event_data['date_end'] = date('Y-m-d H:i:s', $date_end->format('U') + $end_offset - ($this->one_hour_fix * 2));
			return $event_data;
		}
		return NULL;
	}
	
	function get_all_photos($event_id) {
		$query = $this->db->get_where('np_photos', array('event_id' => $event_id));
		if ($query->num_rows() > 0) return $query->result_array();
		return NULL;
	}

	function save($event_data) {
	
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($this->data['timezone']);
		$userTimezone = new DateTimeZone($this->data['timezone']);
		$gmtTimezone = new DateTimeZone('UTC');
		$date_start = new DateTime($event_data['date_start'], $userTimezone);
		$date_end = new DateTime($event_data['date_end'], $userTimezone);
		$start_offset = $gmtTimezone->getOffset($date_start);
		$end_offset = $gmtTimezone->getOffset($date_end);

		$event_data['date_start'] = date('Y-m-d H:i:s', $date_start->format('U') - $date_start->getOffset());
		$event_data['date_end'] = date('Y-m-d H:i:s', $date_end->format('U') - $date_end->getOffset());
		$event_data['create_date'] = gmdate ( 'Y-m-d H:i:s');
	
		$this->db->insert('np_events', $event_data); 
		return $this->db->insert_id();
	}
}

/* End of file users.php */
/* Location: ./application/models/auth/users.php */