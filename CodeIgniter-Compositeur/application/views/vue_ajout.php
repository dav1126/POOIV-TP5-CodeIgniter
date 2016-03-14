<?php
echo "OKOK";
require_once 'application/Controllers/compositeur.php'; 
$this->ctrlcomp = new compositeur();
$this->ctrlcomp->show_add();
?>
