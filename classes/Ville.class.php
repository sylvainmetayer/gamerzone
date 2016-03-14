<?php
class Ville{
  private $vil_num;
  private $vil_nom;

  public function __construct($valeurs = array()){
    $this->affecte($valeurs);
  }

  public function setVilNum($num){
    if(!empty($num) && $num > 0){
      $this->vil_num = $num;
    }
    else{
      echo "Erreur de saisie du numéro";
    }
  }

  public function getVilNum(){
    return $this->vil_num;
  }

  public function setVilNom($nom){
    if(!empty($nom)){
      $this->vil_nom = $nom;
    }
    else{
      echo "Erreur de saisie du nom";
    }
  }

  public function getVilNom(){
    return $this->vil_nom;
  }

    /* Fonction d'affectation pour le constructeur */
  public function affecte($donnees){
    foreach($donnees as $attribut => $valeur){

      switch ($attribut){
        case 'vil_num' : $this->setVilNum($valeur);
        break;

        case 'vil_nom' : $this->setVilNom($valeur);
        break;

      }
    }
  }
}
?>
