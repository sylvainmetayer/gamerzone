<?php

/**
 * classe express d'article. 
 */
class LigneFacture
{
    private $idCommande;
    private $idArticle;
    private $quantite;
    private $prix;
    private $commentaire;

    public function __construct($valeurs = array())
    {
        $this->affecte($valeurs);
    }

    public function affecte($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            switch ($attribut) {
        case 'idCommande' : $this->setIdCommande($valeur); break;
        case 'idArticle' : $this->setIdArticle($valeur); break;
        case 'quantite' : $this->setQuantite($valeur); break;
        case 'prix' : $this->setPrix($valeur); break;
        case 'commentaire' : $this->setCommentaire($valeur); break;
      }
        }
    }
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    public function getIdArticle()
    {
        return $this->idArticle;
    }

    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }
}
