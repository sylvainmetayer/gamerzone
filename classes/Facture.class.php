<?php

/**
 * classe express d'article.
 */
class Facture
{
    private $idCommande;
    private $idClient;
    private $dateCommande;

    public function __construct($valeurs = array())
    {
        $this->affecte($valeurs);
    }

    public function affecte($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            switch ($attribut) {
        case 'idCommande' : $this->setIdCommande($valeur); break;
        case 'idClient' : $this->setIdClient($valeur); break;
        case 'dateCommande' : $this->setDateCommande($valeur); break;

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

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }

    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;
    }
}
