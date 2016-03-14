<?php

class FactureManager
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get($idCommande)
    {
        // commande
        $sql1 = 'SELECT co.idClient, co.dateCommande, co.idCommande FROM commande co WHERE co.idCommande= :id';
        $requete1 = $this->db->prepare($sql1);

        $requete1->bindValue(':id', $idCommande);

        $requete1->execute();
        $resultat1 = $requete1->fetch(PDO::FETCH_OBJ);
        $commande = new Facture($resultat1);

        // Ligne
        $sql = 'SELECT c.idCommande,c.idArticle,c.quantite,c.prix, c.commentaire FROM compose c JOIN commande co on co.idCommande=c.idCommande WHERE co.idCommande = :id;';
        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id', $idCommande);

        $requete->execute();

        while ($resultat = $requete->fetch(PDO::FETCH_OBJ)) {
            $ligneCommande[] = new LigneFacture($resultat);
        }
        $retour = array(
          'commande' => $commande,
          'lignes' => $ligneCommande,
          'total' => $this->getTotal($ligneCommande),
        );

        return $retour;
    }

    public function getTotal($lignes)
    {
        $somme = 0;
        foreach ($lignes as $ligne) {
            $somme += $ligne->getQuantite() * $ligne->getPrix();
        }

        return $somme;
    }


    public function getAll()
    {
        $sql1 = 'SELECT co.idClient, co.dateCommande, co.idCommande FROM commande co ';
        $requete1 = $this->db->prepare($sql1);

        $requete1->execute();
        while ($resultat1 = $requete1->fetch(PDO::FETCH_OBJ)) {
            $resu[] = new Facture($resultat1);
        }

        return $resu;
    }

}
