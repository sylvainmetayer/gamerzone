<?php

class Etudiant{
  private $per_num;
  private $dep_num;
  private $div_num;

  /* Constructeur d'un étudiant */

  public function __construct($valeurs = array()) {
    if(!empty($valeurs)){
      this->affecte($valeurs)
    }
  }

  public function setPerNum($num){
    if(!is_int($num) && $num > 0){
        this->$per_num = $num;
    }
    else{
      echo "Il faut entrer un entier positif";
    }
  }

  public function getPerNum(){
    return $per_num;
  }

  public function setDepNum($num){
    if(!is_int($num) && $num > 0){
        this->$dep_num = $num;
    }
    else{
      echo "Il faut entrer un entier positif";
    }
  }

  public function getDepNum(){
    return $dep_num;
  }

  public function setDivNum($num){
    if(!is_int($num) && $num > 0){
        this->$div_num = $num;
    }
    else{
      echo "Il faut entrer un entier positif";
    }
  }

  public function getDivNum(){
    return $div_num;
  }

  /* Fonction d'affectation pour le constructeur */
  public function affecte($donnees){
    foreach($donnees as $attribut => $valeur){

      switch ($attribut){
        case 'per_num' : $this->setPerNum($valeur);
        break;

        case 'dep_num' : $this->setDepNum($valeur);
        break;

        case 'div_num' : $this->setDivNum($valeur);
        break;
        
      }
    }
  }

}

?>
