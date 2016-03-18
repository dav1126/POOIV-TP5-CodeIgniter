<?php
class ChercherProduits extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('request_db_clients','',TRUE);
	}

	function index()
	{
		$success = $this->request_db_clients->getProduits($_POST);
		$categories['listeCategories'] = $this->request_db_clients->getAllCategories();
		$data['categories'] = $categories;
			if (!empty($success))
			{
				$data['produits'] = $success;
				$this->load->templateLoggedIn('consulter_view', $data);
			}
			else
			{
				$data['erreur'] = true;
				$this->load->templateLoggedIn('consulter_view', $data);
			}
	}
}