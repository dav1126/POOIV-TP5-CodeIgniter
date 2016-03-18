<head>
<style>
div {background-color:orange;
	 float: left;
	 width: 33%;}
</style>
</head>
<inline>
	<div>
		<?php
		echo anchor('home/ajouter', 'Ajouter un client');
		?>
	</div>
	<div>
		<?php
		echo anchor('home/modifier', 'Modifier un client');
		?>
	</div>
	<div>
		<?php
		echo anchor('home/consulter', 'Consulter des produits');
		?>
	</div>	
<inline>
<br/>
<br/>