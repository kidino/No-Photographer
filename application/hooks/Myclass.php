<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyClass
{
 function top_menu()
 {
  $CI =& get_instance();
  $CI->load->helper('url');
  $uri = uri_string();

  switch($uri) {
	case '/'; case'';
		$data['top_menu'] = 'home'; break;
	case 'my_badges'; 
		$data['top_menu'] = 'my_badges'; break;
	default;
		$data['top_menu'] = ''; break;
  }
  
  $CI->load->vars($data);

 }
}
