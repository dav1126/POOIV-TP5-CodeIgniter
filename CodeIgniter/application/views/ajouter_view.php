
 <body>
   <?php echo validation_errors();
   echo form_open('verifyajout'); 
   $villesLibelle = array();
   foreach ($villes['listeVilles'] as $ville)
   {
   	$villesLibelle[$ville->nomVille] = $ville->nomVille;
   }
   $age = array('name' => 'age', 'type' => 'number');
   $effacer = array('type' => 'Reset', 'content' => 'Effacer', 'name'=>'effacer_button');
   $data = array(
   		array(),
   		array('Nom:', form_input('nom', set_value('nom'))),
   		array('Prenom:', form_input('prenom', set_value('prenom'))),
   		array('Age:', form_input($age, set_value('age'))),
   		array('Adresse:', form_input('adresse', set_value('adresse'))),
   		array('Ville:', form_dropdown('ville', $villesLibelle)),
   		array('Courriel:', form_input('email', set_value('email'))),
   		array(form_button($effacer), form_submit('submit', 'Ajouter'))
   );
   echo $this->table->generate($data);  
 ?>
 
   
 </body>