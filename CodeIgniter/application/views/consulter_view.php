<?php 
	$categoriesLibelle = array();
	foreach ($categories['listeCategories'] as $categorie)
	{
		$categoriesLibelle[$categorie->nomCategorie] = $categorie->nomCategorie;
	}
   echo form_open('chercherProduits'); 
   $motCle = array('name' => 'motCle', 'type' => 'text', 'size'=>'30');
   $trierOption = array('prix' => 'Prix', 'quantite' => 'Quantite');
   $radioCroissant = array('name' => 'radio1', 'value' => 'croissant', 'checked' => 'true');
   $radioDecroissant = array('name' => 'radio1', 'value' => 'decroissant');
   $effacer = array('type' => 'Reset', 'content' => 'Effacer', 'name'=>'effacer_button');
   $data = array(
   		array(),
   		array('Mot cle:', form_input($motCle)),
   		array('Dans la categorie:', form_dropdown('categorie', $categoriesLibelle)),
   		array('Trier par:', form_dropdown('trierPar', $trierOption)),
   		array('En ordre: ', form_radio($radioCroissant) . 'Croissant',form_radio($radioDecroissant) . 'Decroissant'),
   		array(form_button($effacer), form_submit('submit', 'Rechercher'))
   );
   echo $this->table->generate($data);
   
   if (isset($erreur))
   	echo "Aucun produit trouve";
   if (isset($produits))
   {
   		$htmlOutput = "<table border = '1'><tr><td>Code article</td><td>Description</td><td>Prix</td><td>Quantite</td><td>Categorie</td></tr>";
   		foreach ($produits as $produit)
   		{
   			$htmlOutput .= "<tr>";
   			$htmlOutput .= "<td>" . $produit -> codeArticle . "</td>";
   			$htmlOutput .= "<td>" . $produit -> description . "</td>";
   			$htmlOutput .= "<td>" . $produit -> prix . "</td>";
   			$htmlOutput .= "<td>" . $produit -> quantite . "</td>";
   			$htmlOutput .= "<td>" . $produit -> nomCategorie . "</td>";
   			$htmlOutput .= "</tr>";
   		} 
   	echo $htmlOutput;
   }
?>