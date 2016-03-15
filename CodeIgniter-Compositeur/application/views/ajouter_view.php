 <body>
   <?php echo validation_errors();
   echo form_open('verifyajout'); 
   $villesLibelle = array();
   foreach ($listeVilles as $row)
   {
   		array_push($villesLibelle, $row->nomVille);
   }
   $age = array('name' => 'age', 'type' => 'number');
   $effacer = array('type' => 'Reset', 'content' => 'Effacer', 'name'=>'effacer_button');
   $data = array(
   		array(),
   		array('Nom:', form_input('nom')),
   		array('Prenom:', form_input('prenom')),
   		array('Age:', form_input($age)),
   		array('Adresse:', form_input('adresse')),
   		array('Ville:', form_dropdown('ville', $villesLibelle)),
   		array('Courriel:', form_input('email')),
   		array(form_button($effacer), form_submit('submit', 'Ajouter'))
   );
   echo $this->table->generate($data);
 ?>  
 </body>