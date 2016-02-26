<?php

class Categorie{

  private $idOrdi;
  private $nomOrdi;
  private $idSalle;
  private $etat;

  public function __construct($valeurs = array()){
    $this->affecte($valeurs);
  }

  public function getIdSalle(){
		return $this->idSalle;
	}

	public function setIdSalle($idSalle){
		$this->idSalle = $idSalle;
	}

  public function getNomOrdi(){
		return $this->NomOrdi;
	}

	public function setNomSalle($nomOrdi){
		$this->nomOrdi = $nomOrdi;
	}

  public function getIdOrdi(){
    return $this->idOrdi;
  }

  public function setIdOrdi($idOrdi){
    $this->idOrdi = $idOrdi;
  }

  public function getEtat(){
    return $this->etat;
  }

  public function setEtat($etat){
    $this->etat = $etat;
  }

  public function affecte($donnees){
    foreach($donnees as $attribut => $valeur){
      case 'idOrdi' : $this->setIdOrdi($valeur);
      break;
      case 'nomOrdi' : $this->setNomOrdi($valeur);
      break;
      case 'idSalle' : $this->setSalle($valeur);
      break;
      case 'etat' : $this->setEtat($capacite);
      break;
    }
  }

?>
