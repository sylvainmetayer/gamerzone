<?php
class CategorieManager{
  private $db;

  public function __construct($db){
    $this->db = $db;
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
