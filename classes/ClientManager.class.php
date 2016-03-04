<?php

class ClientManager
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add($client)
    {
        if ($client->getIdCompte() != null) {
            $idCompte = $client->getIdCompte();
        } else {
            $compte = new Compte(array('solde' => 0));
            $compteManager = new CompteManager($this->db);
            $idCompte = $compteManager->add($compte);
        }

        $date = getEnglishDate($client->getDate_naissance());

        $sql = 'INSERT INTO client(idCompte, nom, prenom, mail, date_naissance, login, pwd) VALUES (:idCompte, :nom, :prenom, :mail, :date_naissance, :login, :pwd)';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':idCompte', $idCompte);
        $requete->bindValue(':nom', $client->getNom());
        $requete->bindValue(':prenom', $client->getPrenom());
        $requete->bindValue(':mail', $client->getMail());
        $requete->bindValue(':date_naissance', $date);
        $requete->bindValue(':login', $client->getLogin());
        $requete->bindValue(':pwd', $client->getPwd());

        $retour = $requete->execute();
        $idInserted = $this->db->lastInsertId();

        $response = array(
          'idClient' => $idInserted,
          'idCompte' => $idCompte,
          'ajoutClient' => $retour,
        );

        return json_encode($response);
    }

    public function getNbClient()
    {
        $sql = 'SELECT count(idClient) as nb FROM client;';
        $requete = $this->db->prepare($sql);
        $retour = $requete->execute();
        $data = $requete->fetch(PDO::FETCH_ASSOC)['nb'];

        $response = array(
          'nbClient' => $data,
        );

        return json_encode($response);
    }

    public function delete($client)
    {
        $sql = 'DELETE FROM client WHERE idClient = :idClient';
        $requete = $this->db->prepare($sql);

        $requete->bindValue(':idClient', $client->getIdClient());
        $retour = $requete->execute();
        $response = array(
          'idClient' => $client->getIdClient(),
          'delete' => $retour,
        );

        return json_encode($response);
    }

    public function getClient($idClient)
    {
        $sql = 'SELECT * FROM client WHERE idClient = :idClient';
        $requete = $this->db->prepare($sql);

        $requete->bindValue(':idClient', $idClient);
        $retour = $requete->execute();
        $clientTmp = $requete->fetch(PDO::FETCH_OBJ);
        $client = new Client($clientTmp);

        return $client->toJSON();
    }
}
