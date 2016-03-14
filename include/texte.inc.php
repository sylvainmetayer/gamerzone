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

case 2: // LISTER CLIENTS
  include_once 'pages/listerClients.inc.php';
  break;

case 42: // TEST
  include_once 'pages/test.php';
  break;
case 43:
    include_once 'pages/statistiques.inc.php';
    break;

default :    include_once 'pages/accueil.inc.php';
}

?>
</div>
