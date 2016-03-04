<?php

class Compte
{
    private $idCompte;
    private $solde;

    public function __construct($valeurs = array())
    {
        $this->affecte($valeurs);
    }

    public function affecte($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            switch ($attribut) {
        case 'idCompte' : $this->setIdCompte($valeur);
        break;
        case 'solde' : $this->setSolde($valeur);
        break;
      }
        }
    }

    public function getIdCompte()
    {
        return $this->idCompte;
    }

    public function setIdCompte($idCompte)
    {
        $this->idCompte = $idCompte;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function setSolde($solde)
    {
        $this->solde = $solde;
    }
}
