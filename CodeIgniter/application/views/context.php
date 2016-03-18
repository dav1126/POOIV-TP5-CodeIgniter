<table border="1">
<?php foreach($liste_compositeurs as $compositeur):  ?>
    <tr>
        <td><?php echo $compositeur->nom; ?></td>
        <td><?php echo $compositeur->prenom; ?></td>
        <td><?php echo anchor('compositeur/show_update/'.$compositeur->id,'Modifier'); ?></td>
         <td><?php echo anchor('compositeur/delete/'.$compositeur->id,'Supprimer'); ?></td>
    </tr>
<?php endforeach; ?>
</table>

<p><?php echo anchor('compositeur/show_add','Ajouter'); ?></p>

