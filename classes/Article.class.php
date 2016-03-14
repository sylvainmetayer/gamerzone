<?php

/**
 * classe express d'article. Mix entre article et catégorie.
 */
class Article
{
    private $idArticle;
    private $nom;
    private $idCategorie;
    private $nomCategorie;

    public function __construct($valeurs = array())
    {
        $this->affecte($valeurs);
    }

    public function affecte($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            switch ($attribut) {
        case 'idArticle' : $this->setIdArticle($valeur); break;
        case 'nom' : $this->setNom($valeur); break;
        case 'idCategorie' : $this->setIdCategorie($valeur); break;
        case 'nomCategorie' : $this->setNomCategorie($valeur); break;
      }
        }
    }
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
    }

    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;
    }
}
