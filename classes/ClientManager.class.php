<?php

class ClientManager
{
    private $db;
    private $compteManager;

    public function __construct($db)
    {
        $this->db = $db;
        $this->compteManager = new CompteManager($db);
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

    public function delete($idClient)
    {
        $sql = 'DELETE FROM client WHERE idClient = :idClient';
        $requete = $this->db->prepare($sql);

        $requete->bindValue(':idClient', $idClient);
        $retour = $requete->execute();

        $response = array(
          'idClient' => $idClient,
          'delete' => $retour,
        );

        return json_encode($response);
    }

    /**
     *  Retourne un client sous forme d'objet JSON
     *  Testée et fonctionnelle.
     *
     *  @return JSON Object if $toJSON == true, PHP Object otherwise
     */
    public function getClient($idClient, $toJSON)
    {
        $sql = 'SELECT * FROM client WHERE idClient = :idClient';
        $requete = $this->db->prepare($sql);

        $requete->bindValue(':idClient', $idClient);
        $retour = $requete->execute();
        $clientTmp = $requete->fetch(PDO::FETCH_OBJ);
        $client = new Client($clientTmp);

        if ($toJSON == true) {
            return $client->toJSON();
        }

        return $client;
    }

    public function getAllClients()
    {
        $sql = 'SELECT * FROM client ';
        $requete = $this->db->prepare($sql);

        $retour = $requete->execute();

        while ($clientTmp = $requete->fetch(PDO::FETCH_OBJ)) {
            $clients[] = new Client($clientTmp);
        }

        return $clients;
    }

    public function debiter($idClient, $somme)
    {
        $retour = $this->compteManager->debiter($somme, $this->getClient($idClient, false)->getIdCompte());
        $response = array(
        'idClient' => $idClient,
        'compte' => $retour,
      );

        return json_encode($response);
    }

    public function crediter($idClient, $somme)
    {
        $retour = $this->compteManager->crediter($somme, $this->getClient($idClient, false)->getIdCompte());
        $response = array(
            'idClient' => $idClient,
            'compte' => $retour,
          );

        return json_encode($response);
    }

    public function getSolde($idClient)
    {
        $retour = $this->compteManager->getSolde($this->getClient($idClient, false)->getIdCompte());
        $response = array(
          'idClient' => $idClient,
          'compte' => $retour,
        );

        return json_encode($response);
    }

    /**
     * Cette fonction permet de savoir si l'on est connecté en tant qu'admin.
     */
    public function checkLogin($login, $pwd, $toJSON)
    {
        $sql = 'SELECT * FROM client WHERE login=:login AND pwd=:pwd;';
        $requete = $this->db->prepare($sql);

        $requete->bindValue(':login', $login);
        $requete->bindValue(':pwd', $pwd);

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();
        if ($resultat != null) {
            $client = new Client($resultat);
            $response = array('authentification' => 'Authentification OK', 'client' => $client);

            if ($toJSON) {
                $response = array('authentification' => 'Authentification OK', 'client' => $client->toJSON());

                return json_encode($response);
            }

            return $response;
        } else {
            $response = array('authentification' => "Erreur d'authentification");

            if ($toJSON) {
                return json_encode($response);
            }

            return $response;
        }
    }
}
