<div id="texte">
<?php
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 0;
}
switch ($page) {
case 0: // STATISTIQUES
    include_once 'pages/pageStatistiques.inc.php';
    break;
case 1: // ADD CLIENT
    include_once 'pages/addClient.inc.php';
    break;

default :    include_once 'pages/pageStatistiques.inc.php';
}

?>
</div>
