<?php
class VerifyModif extends CI_Controller {

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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if($this->form_validation->run() == FALSE)
		{
			$success = $this->request_db_clients->selectClient($_POST['codeClient']);
			if (!empty($success))
			{
				$data['client'] = $success[0];
				$villes['listeVilles'] = $this->request_db_clients->getAllVilles();
				$data['villes'] = $villes;
				$data['villeClient'] = $this->request_db_clients->get_libelle_ville($success[0]->idVille);
				$this->load->templateLoggedIn('modifier_view_client', $data);
			}
		}
		else
		{
			$this->request_db_clients->updateClient($_POST);
			$this->load->templateLoggedIn('modif_confirm_view');
		}

	}
}
?>