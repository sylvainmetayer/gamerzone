<div id="texte">
<?php
if (!empty($_GET["page"])){
	$page=$_GET["page"];}
	else
	{$page=0;
	}
switch ($page) {
//
// Personnes
//

case 0:
	// inclure ici la page accueil photo
	include_once('pages/pageStatistiques.inc.php');
	break;

case 43:
	include_once('pages/statistiques.inc.php');
	break;

default : 	include_once('pages/pageStatistiques.inc.php');
}

?>
</div>
