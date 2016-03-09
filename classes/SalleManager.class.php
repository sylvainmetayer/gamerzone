<?php

class SalleManager
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
  /**
   *Fonction qui ajoute une salle.
   *Une salle a un id, un nom, un emplacement et une capacité de pc maximale.
   **/
  public function addSalle($salle)
  {
      $requete = $this->db->prepare(
      'INSERT INTO salle(idSalle, nomSalle, emplacement, capacite) VALUES (:idSalle, :nomSalle, :emplacement, :capacite)');
      $requete->bindValue(':idSalle',$salle->getIdSalle());
      $requete->bindValue(':nomSalle',$salle->getNomSalle());
      $requete->bindValue(':emplacement',$salle->getEmplacement());
      $requete->bindValue(':capacite',$salle->getCapacite());
      $retour=$requete->execute();
      return $retour;
  }

  /**
   *Fonction qui affiche toutes les salles.
   *
   *@return la liste des salles
   **/
  public function listerSalles()
  {
      $listSalles = array();
      $sql = 'SELECT idSalle, nomSalle, emplacement, capacite FROM salle';
      $requete = $this->db->prepare($sql);
      while ($salle = $requete->fetch(PDO::FETCH_OBJ)) {
          $listSalles[] = new Salle($salle);
      }
      return $listSalles;
      $requete->closeCursor();
  }

  /*
  *Fonction qui affiche le nombre de salles
  *
  */
    public function countSalle()
    {
      $sql = 'SELECT COUNT(idSalle) as nbSalles FROM salle';
      $requete = $this->db->query($sql);
      $requete = $requete->fetch(PDO::FETCH_ASSOC);
      return $requete['nbSalles'];
    }

    /*
    *Procedure qui affiche le nombre de pc par salle
    *
    */
    public function countPcSalle($id)
    {
      $sql = "SELECT COUNT(idOrdi) as nbPcSalles FROM ordinateur WHERE idSalle= :num";

      $requete = $this->db->prepare($sql);
      $requete->bindValue(':num',$id);
      $requete->execute();
      $requete = $requete->fetch(PDO::FETCH_ASSOC);

      return $requete['nbPcSalles'];
    }

    /*
    * Fonction qui vérifie si la salle est vide
    *
    */
    public function salleEmpty($id)
    {
      return $this->countPcSalle($id) == 0;
    }

  /*
  *Fonction qui supprime une salle
  * Verifie si la salle est vide
  */
  public function deleteSalle($id)
  {
      $listeOrdi = array();

      if ($this->salleEmpty($id)) {
        $requete = $this->db->prepare('DELETE FROM Salle WHERE idSalle=:num;');
        $requete->bindValue(':num', $id);
        $requete->execute();
      }
      else{
        $response=array('SupprSalle' => "La salle n'est pas vide");
        return json_encode($response);
      }
    }
  }
?>
