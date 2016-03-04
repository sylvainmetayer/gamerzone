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
      $requete = bindValue(':idSalle', $salle->getNumVille());
      $requete = bindValue(':nomSalle', $salle->getNomVille());
      $requete = bindValue(':emplacement', $salle->getEmplacement());
      $requete = bindValue(':capacite', $salle->getCapacite());
      $retour = $requete->execute();

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

    public function countSalle()
    {
        $requete = $this->db->prepare('SELECT COUNT(*) FROM salle');
        $retour = $requete->execute();

        return $retour;
    }

    public function countPcSalle($id)
    {
        $requete = $this->db->prepare('SELECT COUNT(*) FROM ordinateur WHERE idSalle=:num');
        $requete->bindValue(':num', $id);
        $retour = $requete->execute();

        return $retour;
    }

    public function salleEmpty($id)
    {
        if (countPcSalle($id) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSalle($id)
    {
        $listeOrdi = array();

        if (salleEmpty($id)) {
            $requete = $this->db->prepare('DELETE FROM Salle WHERE idSalle=:num;');
            $requete->bindValue(':num', $id);
            $requete->execute();
        } else {
            foreach ($listeOrdi as $ordi) {
                if ($ordi->getIdSalle() == $id) {
                    $OrdiManager = new OrdinateurManager($db);
                    $OrdiManager->deleteOrdi($ordi);
                }
            }
            $requete = $this->db->prepare('DELETE FROM Salle WHERE idSalle=:num;');
            $requete->bindValue(':num', $id);
            $requete->execute();
        }
    }
}
  /*public function updateSalle($id){

  }*/;
