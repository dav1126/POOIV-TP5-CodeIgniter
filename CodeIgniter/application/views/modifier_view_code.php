<body>
<?php echo validation_errors();
echo form_open('verify_code');

$code = array('name' => 'code', 'type' => 'number');
$effacer = array('type' => 'Reset', 'content' => 'Effacer', 'name'=>'effacer_button');
$data = array(
		array(),
		array('Code:', form_input($code, set_value('code'))),
		array(form_button($effacer), form_submit('submit', 'Modifier'))
);
if (isset($erreur))
	echo "Code introuvable";
echo $this->table->generate($data);
?>
 
   
 </body>