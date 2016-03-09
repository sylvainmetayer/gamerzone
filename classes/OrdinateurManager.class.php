<?php

class OrdinateurManager
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add($ordinateur)
    {
        $requete = $this->db->prepare('INSERT INTO ordinateur(idOrdi,nomOrdi,idSalle,etat) values (:idOrdi,:nomOrdi,:idSalle, :etat);');
        $requete->bindValue(':idOrdi', $ordinateur->getIdOrdi());
        $requete->bindValue(':nomOrdi', $ordinateur->getNomOrdi());
        $requete->bindValue(':idSalle', $ordinateur->getIdSalle());
        $requete->bindValue(':etat', $ordinateur->getEtat());
        $retour = $requete->execute();

        $retour = $requete->execute();
        $idInserted = $this->db->lastInsertId();

        $response = array(
          'idOrdinateur' => $idInserted,
          'ajoutOrdi' => $retour,
        );

        return json_encode($response);
    }

    public function deleteOrdi($id)
    {
        $requete = $this->db->prepare('DELETE FROM ordinateur WHERE idOrdi=:num;');
        $requete->bindValue(':num', $id);
        $requete->execute();
    }
}
