<?php 
class Ajouter extends CI_Controller  {

	function __construct()
	{
		parent::__construct();
		$this->load->model('request_db_clients','',TRUE);
	}
	
	function index(){

		$this->show_ajouter();
	}

	function show_ajouter(){
	
		$villes['listeVilles'] = $this->request_db_clients->getAllVilles();
		if (is_array($villes))
			$this->load->templateLoggedIn('ajouter_view', $villes);
	}
}
?>