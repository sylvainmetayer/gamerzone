<?php

if (isset($_GET['idCommande'])) {
    $pdo = new Mypdo();
    $manager = new FactureManager($pdo);
    $clientManager = new ClientManager($pdo);
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
                  <th>Catégorie</th>
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
}
