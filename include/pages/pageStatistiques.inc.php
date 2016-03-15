<?php
  $db = new Mypdo();
  $clientManager = new ClientManager($db);
  $nbClients = json_decode($clientManager->getNbClient());
  //var_dump($nbClients->nbClient);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="post-preview">
              <h1>Tableau de bord</h1>

              <p>Nombre de client(s) connecté(s) : ??? / <?php echo $nbClients->nbClient; ?> </p>
              <p>Chiffre d'affaires actuel : <?php  ?> </p>
            </div>
        </div>
    </div>
</div>


<script src="js/statistiques.js"></script>
