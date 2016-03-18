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
	
	function get_id_ville($ville)
	{
		$this->db->from('ville');
		$this->db->where('nomVille', $ville);
		$result =  $this->db->get()->result();
		$idVille = $result[0] -> idVille;
		return $idVille;		
	}
	
	function get_libelle_ville($id)
	{
		$this->db->from('ville');
		$this->db->where('idVille', $id);
		$result =  $this->db->get()->result();
		$libelleVille = $result[0] -> nomVille;
		return $libelleVille;
	}
	
	function add_client_to_db($data)
	{
		try 
		{
			$ville = $data['ville'];
			$idVille = $this->get_id_ville($ville);
			$insertData['idClient'] = 'null';
			$insertData['nomClient'] = $data['nom'];
			$insertData['prenomClient'] = $data['prenom'];
			$insertData['ageClient'] = $data['age'];
			$insertData['courrielClient'] = $data['email'];
			$insertData['adresse'] = $data['adresse'];
			$insertData['idVille'] = $idVille;
			$this->db->insert('client', $insertData);
		}
		catch (Exception $e)
		{
			return false;
		}
		return true;
	}
	
	function selectClient($code)
	{
		try
		{
			$this->db->from('client');
			$this->db->where('idClient', $code);
			$result = $this->db->get()->result();
		}
		catch (Exception $e)
		{
			return false;
		}
		return $result;
	}
	
	function updateClient($clientInfo)
	{
		$ville = $clientInfo['ville'];
		$idVille = $this->get_id_ville($ville);
		$updateData['idClient'] = $clientInfo['codeClient'];
		$updateData['nomClient'] = $clientInfo['nom'];
		$updateData['prenomClient'] = $clientInfo['prenom'];
		$updateData['ageClient'] = $clientInfo['age'];
		$updateData['courrielClient'] = $clientInfo['email'];
		$updateData['adresse'] = $clientInfo['adresse'];
		$updateData['idVille'] = $idVille;
		$this->db->where('idClient', $clientInfo['codeClient']);
		$this->db->update('client', $updateData);
	}
	
	function getAllCategories() {
	
		$this->db->from('categorie');
		$categories = $this->db->get()->result();
	
		if (is_array($categories)) 
		{
			return $categories;
		}
	
		return false;
	}
	
	function getProduits($data)
	{
		$this->db->select('produit.codeArticle, produit.description, produit.prix, produit.quantite, produit.idCategorie, categorie.nomCategorie');
		$this->db->from('produit');
		$this->db->join('categorie', 'categorie.idCategorie = produit.idCategorie');
		$this->db->like('description',$data['motCle']);
		$this->db->where('categorie.nomCategorie', $data['categorie']);
		if ($data['radio1'] == 'croissant')
		{
			if ($data['trierPar'] == 'prix')
				$this->db->order_by("prix", "asc");
			else
				$this->db->order_by("quantite", "asc");
		}
		else 
		{
			if ($data['trierPar'] == 'prix')
				$this->db->order_by("prix", "desc");
				else
					$this->db->order_by("quantite", "desc");
		}
		$result = $this->db->get()->result();
		return $result;
	}
}