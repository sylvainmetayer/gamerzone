<?php
$db = new Mypdo();

$compteManager = new CompteManager($db);
$resu = $compteManager->getSolde(1);
echo $resu;
?>
<h1>Liste des villes</h1>
