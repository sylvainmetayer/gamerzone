<?php
class CategorieManager{
  private $db;

  public function __construct($db){
    $this->db = $db;
  }

  public function add($salle){
    $requete=$this->db->prepare(
      'INSERT INTO categorie(idCategorie, nomCategorie) VALUES (:idCategorie, :nomCategorie)'
  }

  public function listerCategories(){
    $listCategories = array();

    $sql = 'SELECT idCategorie, nomCategorie FROM categorie';
    $requete = $this->db->prepare($sql);

    while ($categorie = $requete->fetch(PDO::FETCH_OBJ)){
      $listCategories[] = new categorie($categorie);
    }
    return $listCategories;
    $requete->closeCursor();
  }


?>
