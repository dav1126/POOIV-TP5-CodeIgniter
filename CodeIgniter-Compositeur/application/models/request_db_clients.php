<?php
Class Request_db_clients extends CI_Model
{
	function getAllVilles() {
		
		$this->db->from('ville');
		$villes = $this->db->get()->result();
	
		if (is_array($villes)) {
			return $villes;
		}
	
		return false;
	}
	
	function validate_user( $email) 
	{
		// Build a query to retrieve the user's details
		// based on the received username and password
		$this->db->from('client');
		$this->db->where('courrielClient',$email );
		$result = $this->db->get()->result();
	
		// The results of the query are stored in $login.
		// If a value exists, then the user account exists and is validated
		if ( is_array($result) && count($result) == 1 ) {
			return false;
		}	
		return true;
	}
}