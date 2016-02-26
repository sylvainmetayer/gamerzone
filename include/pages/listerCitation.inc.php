<?php
$db = new Mypdo();
$citationManager = new CompteManager($db);
$resu = $citationManager->listerCitations();
var_dump($resu);
?>
<h1>Liste des villes</h1>
