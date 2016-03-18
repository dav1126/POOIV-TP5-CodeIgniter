<?php
class VerifyAjout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('request_db_clients','',TRUE);
	}

	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nom', 'Nom', 'trim|required');
		$this->form_validation->set_rules('prenom', 'Prenom', 'trim|required');
		$this->form_validation->set_rules('age', 'Age', 'trim|required');
		$this->form_validation->set_rules('adresse', 'Adresse', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_database');
		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  User redirected to ajout page
			$villes['listeVilles'] = $this->request_db_clients->getAllVilles();
			$data['villes'] = $villes;
			$this->load->templateLoggedIn('ajouter_view', $data);
		}
		else
		{
			$success = $this->request_db_clients->add_client_to_db($_POST);
			if ($success)
				$this->load->templateLoggedIn('ajout_confirm_view');
			else
				echo "Erreur de base de données";
		}

	}

	function check_database($email)
	{
		//query the database
		$result = $this->request_db_clients->validate_user($email);
		return $result;
	}
}
?>