<?php
  $db = new Mypdo();
  $clientManager = new ClientManager($db);
  $nbClients = json_decode($clientManager->getNbClient());
?>
<h1>Tableau de bord</h1>

<p>Nombre de client(s) connecté(s) : <?php echo $nbClients; ?> </p>
<p>Chiffre d'affaires actuel : <?php ?> </p>

<script src="js/statistiques.js"></script>
