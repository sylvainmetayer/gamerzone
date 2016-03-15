<?php
$pdo = new Mypdo();
$manager = new FactureManager($pdo);
$clientManager = new ClientManager($pdo);
if (isset($_GET['idCommande'])) {
    $articleManager = new ArticleManager($pdo);
    $resu = $manager->get($_GET['idCommande']);

    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <p> Commande <?php echo $resu['commande']->getIdCommande();
    ?>
                du <?php echo $resu['commande']->getDateCommande()
                .' par '.$clientManager->getClient($resu['commande']->getIdClient(), false)->getNom();
    ?> <br/>
                Montant : <?php echo $resu['total'];
    ?>€
              </p>

              <table>
                <tr>
                  <th>Nom Article</th>
                  <th>Prix Unitaire</th>
                  <th>Quantite</th>
                  <th>Commentaire</th>
                  <th>Catégorie </th>
                  <th>Total</th>
                </tr>
                <?php
                foreach ($resu['lignes'] as $ligneFacture) {
                    $article = $articleManager->get($ligneFacture->getIdArticle());
                    ?>
                  <tr>
                    <td><?php echo $article->getNom();
                    ?></td>
                    <td><?php echo $ligneFacture->getPrix();
                    ?></td>
                    <td><?php echo $ligneFacture->getQuantite();
                    ?></td>
                    <td><?php echo $ligneFacture->getCommentaire();
                    ?></td>
                    <td><?php echo $article->getNomCategorie();
                    ?></td>
                    <td><?php echo $ligneFacture->getPrix() * $ligneFacture->getQuantite();
                    ?></td>
                  </tr>
                <?php

                }
    ?>
              </table>
        </div>
    </div>
    <?php

} else {
    echo 'Pas de facture précisée';
    $all = $manager->getAll();
    //var_dump($all);

    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

              <table>
                <tr>
                  <th>Client</th>
                  <th>Date</th>
                  <th>Numero</th>
                  <th>Details</th>
                </tr>
                <?php
                foreach ($all as $a) {
                    $client = $clientManager->getClient($a->getIdClient(), false)->getNom();
                    ?>
                  <tr>
                    <td><?php echo $client
                    ?></td>
                    <td><?php echo $a->getDateCommande();
                    ?></td>
                    <td><?php echo $a->getIdCommande();
                    ?></td>
                    <td><a href="index.php?page=3&amp;idCommande=<?php echo $a->getIdCommande()
                    ?>">Clic</a> </td>
                  </tr>
                <?php

                }
    ?>
              </table>
        </div>
    </div>
    <?php

}
