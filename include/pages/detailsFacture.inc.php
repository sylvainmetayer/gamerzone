<?php

if (isset($_GET['idCommande'])) {
    $pdo = new Mypdo();
    $manager = new FactureManager($pdo);

    $resu = $manager->get($_GET['idCommande']);

    var_dump($resu);
}
