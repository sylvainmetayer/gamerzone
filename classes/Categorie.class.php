<?php

class Categorie{

  private $idCategorie;
  private $nomCategorie;

  public function __construct($valeurs = array()){
    $this->affecte($valeurs);
  }

  public function getIdCategorie(){
		return $this->idCategorie;
	}

	public function setIdCategorie($idCategorie){
		$this->idCategorie = $idCategorie;
	}

  public function getNomCategorie(){
		return $this->NomCategorie;
	}

	public function setNomCategorie($nomCategorie){
		$this->nomCategorie = $nomCategorie;
	}

  public function affecte($donnees){
    foreach($donnees as $attribut => $valeur){
      case 'idCategorie' : $this->setIdCategorie($valeur);
      break;
      case 'nomCategorie' : $this->setNomCategorie($valeur);
      break;
    }
  }
?>
