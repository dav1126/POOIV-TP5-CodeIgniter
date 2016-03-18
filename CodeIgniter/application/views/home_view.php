<?php
if ($context == 'ajouter')
{
	$this->load->view('ajouter_view', $villes);
}
else if ($context == 'modifier')
{
	$this->load->view('modifier_view_code');
}
else if ($context == 'consulter')
{
	$this -> load -> view ('consulter_view', $categories);	
}
else
{
	echo "Bienvenue " . $this->session->userdata('nom_utilisateur');
}




