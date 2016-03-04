<?php

class Salle{

  private $idSalle;
  private $nomSalle;
  private $emplacement;
  private $capacite;

  public function __construct($valeurs = array()){
    $this->affecte($valeurs);
  }

  public function getIdSalle(){
		return $this->idSalle;
	}

	public function setIdSalle($idSalle){
		$this->idSalle = $idSalle;
	}

  public function getNomSalle(){
		return $this->nomSalle;
	}

	public function setNomSalle($nomSalle){
		$this->nomSalle = $nomSalle;
	}

  public function getEmplacement(){
    return $this->emplacement;
  }

  public function setEmplacement($emplacement){
    $this->emplacement = $emplacement;
  }

  public function getCapacite(){
    return $this->capacite;
  }

  public function setCapacite($capacite){
    $this->capacite = $capacite;
  }

  public function affecte($donnees){
    foreach($donnees as $attribut => $valeur){
      switch($attribut){
        case 'idSalle' : $this->setIdSalle($valeur);
        break;
        case 'nomSalle' : $this->setNomSalle($valeur);
        break;
        case 'emplacement' : $this->setEmplacement($valeur);
        break;
        case 'capacite' : $this->setCapacite($valeur);
        break;
      }
    }
  }

}
?>
