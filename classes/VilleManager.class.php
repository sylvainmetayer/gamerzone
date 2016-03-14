<?php
class VilleManager{
  private $db;

  public function __construct($db){
    $this->db = $db;
  }

  public function add($ville){
    $requete=$this->db->prepare(
      'INSERT INTO ville(vil_num, vil_nom) VALUES (:vil_num, :vil_nom)'
    );
    $requete->bindValue(':vil_num', $ville->getVilNum());
    $requete->bindValue(':vil_nom', $ville->getVilNom());

    return $requete->execute();
  }

  public function countVilles(){
    $requete=$this->db->query(
      'SELECT COUNT(vil_num) as nbVilles FROM ville'
    );
    $resu = $requete->fetch(PDO::FETCH_ASSOC)
    $requete->closeCursor();
    return $resu;
  }

  public function listerVilles(){
    $listVilles = array();

    $sql = 'SELECT vil_num, vil_nom FROM ville';
    $requete = $this->db->prepare($sql);

    while ($ville = $requete->fetch(PDO::FETCH_OBJ)){
      $listVilles[] = new Ville($ville);
    }
    return $listVilles;
    $requete->closeCursor();
  }
}
?>
