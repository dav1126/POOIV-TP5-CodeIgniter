<?php
class Verify_code extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('request_db_clients','',TRUE);
	}

	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('code', 'Code', 'trim|required');
		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  User redirected to ajout page
			$this->load->templateLoggedIn('modifier_view_code');
		}
		else
		{
			$success = $this->request_db_clients->selectClient($_POST['code']);
			if (!empty($success))
			{
				$data['client'] = $success[0];
				$villes['listeVilles'] = $this->request_db_clients->getAllVilles();
				$data['villes'] = $villes;
				$data['villeClient'] = $this->request_db_clients->get_libelle_ville($success[0]->idVille);
				$this->load->templateLoggedIn('modifier_view_client', $data);
			}
			else
			{
				$erreur['erreur'] = true;
				$this->load->templateLoggedIn('modifier_view_code', $erreur);
			}
		}

	}
}
?>
