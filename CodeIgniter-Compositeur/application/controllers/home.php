<?php
class Home extends CI_Controller  {

	function index(){
		
		$this->show_home();
	}
	
	function show_home(){
		
		$this->load->templateLoggedIn('home_view');
	}
}