<?php 
   echo validation_errors();
   $hidden = array('codeClient' => $client->idClient);
   echo form_open('verifymodif',"",$hidden); 
   $villesLibelle = array();
   foreach ($villes['listeVilles'] as $ville)
   {
   	$villesLibelle[$ville->nomVille] = $ville->nomVille;
   }
   $age = array('name' => 'age', 'type' => 'number');
   $effacer = array('type' => 'Reset', 'content' => 'Effacer', 'name'=>'effacer_button');
   $data = array(
   		array(),
   		array('Nom:', form_input('nom', set_value('', $client -> nomClient))),
   		array('Prenom:', form_input('prenom', set_value('',$client->prenomClient))),
   		array('Age:', form_input($age, set_value("",$client->ageClient))),
   		array('Adresse:', form_input('adresse', set_value("",$client->adresse))),
   		array('Ville:', form_dropdown('ville', $villesLibelle, $villeClient)),
   		array('Courriel:', form_input('email', set_value("",$client->courrielClient))),
   		array(form_submit('submit', 'Modifier'))
   );
   echo $this->table->generate($data);  
?>