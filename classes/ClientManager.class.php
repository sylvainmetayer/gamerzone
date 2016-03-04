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
        $compte = new Compte(array('solde' => 0));
        $compteManager = new CompteManager($this->db);
        $idCompte = $compteManager->add($compte);

        $sql = 'INSERT INTO client(idCompte, nom, prenom, mail, date_naissance, login, pwd) VALUES (:idCompte, :nom, :prenom, :mail, :date_naissance, :login, :pwd)';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':idCompte', $idCompte);
        $requete->bindValue(':nom', $client->getNom());
        $requete->bindValue(':prenom', $client->getPrenom());
        $requete->bindValue(':mail', $client->getMail());
        $requete->bindValue(':date_naissance', $client->getDate_naissance());
        $requete->bindValue(':login', $client->getLogin());
        $requete->bindValue(':pwd', $client->getPwd());

        return $requete->execute();
    }
}
