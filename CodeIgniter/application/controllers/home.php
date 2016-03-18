<?php
class Home extends CI_Controller  {

	function index()
	{	
		$data['context'] = 'welcome';
		$this->show_home($data);
	}
	
	function ajouter()
	{
		$this->load->model('request_db_clients','',TRUE);
		$data['context'] = 'ajouter';
		$villes['listeVilles'] = $this->request_db_clients->getAllVilles();
		$data['villes'] = $villes;
		$this->show_home($data);
	}
	
	function modifier()
	{
		$data['context'] = 'modifier';
		$this->show_home($data);
	}
	
	function consulter()
	{
		$this->load->model('request_db_clients','',TRUE);
		$categories['listeCategories'] = $this->request_db_clients->getAllCategories();
		$data['categories'] = $categories;
		$data['context'] = 'consulter';
		$this->show_home($data);
	}
	
	function show_home($data)
	{
		$this->load->templateLoggedIn('home_view', $data);
	}
}