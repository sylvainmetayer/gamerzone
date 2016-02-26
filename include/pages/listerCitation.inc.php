<?php
$db = new Mypdo();
$compteManager = new CompteManager($db);
$resu = $compteManager->getSolde(1);
?>
<h1>Liste des villes</h1>
