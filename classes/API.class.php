<?php

/**
* Cette API répond en JSON et ne contient que les méthodes
* nécessaires aux autres groupes.
*
*/
class API
{
    private $adminManager;
    private $categorieManager;
    private $clientManager;
    private $compteManager;
    private $ordinateurManager;
    private $salleManager;

    private $db;

    /* Constructeur, avec le lien vers la base de donnée en paramètre */
    public function __construct($db)
    {
        $this->db = $db;
        $this->adminManager = new AdminManager($db);
        $this->categorieManager = new CategorieManager($db);
        $this->clientManager = new ClientManager($db);
        $this->compteManager = new CompteManager($db);
        $this->ordinateurManager = new OrdinateurManager($db);
        $this->salleManager = new SalleManager($db);
    }

    /**
    * Cette fonction retourne un tableau JSON contenant
    * la liste de toutes les catégories
    */
    public function getAllCategories() {
      $categories = $this->categorieManager->listerCategories();
      $response = array();
      for ($categorie in $categories) {
        array_push($response, $categorie->toJSON());
      }
      return json_encode($response);
    }

    /**
    * Cette fonction permet d'ajouter un client.
    *
    */
    public function addClient($client) {
      return $this->clientManager->add($client);
    }

    /**
    * Cette fonction permet de savoir le nombre
    * de client enregistrés en base
    */
    public function getNombreClient() {
      return $this->clientManager->getNbClient();
    }


    /**
    * Cette fonction permet de supprimer un client, par son id.
    *
    */
    public function deleteClient($idClient) {
      return $this->clientManager->delete($idClient);
    }

    /**
    * Cette fonction retourne les détails d'un client, par son id.
    *
    */
    public function getDetailsClient($idClient) {
      return $this->clientManager->getClient($idClient, true);
    }

    /* Cette fonction retourne le solde du client, selon son id. */
    public function getSoldeClient($idClient) {
      return $this->clientManager->getSolde($idClient);
    }

    /**
    * Cette fonction permet de créditer le solde d'un client
    * Le montant passé en paramètre doit être positif.
    */
    public function crediterSoldeClient($idClient, $montant) {
      return $this->clientManager->crediter($idClient, $montant);
    }

    /**
    * Cette fonction permet de débiter le solde d'un client
    * Le montant passé en paramètre doit être positif.
    */
    public function debiterSoldeClient($idClient, $montant) {
      return $this->clientManager->debiter($idClient, $montant);
    }

    /* Cette fonction permet de vérifier qu'un utilisateur peut s'authentifier */
    public function checkLoginClient($login, $pwd) {
      return $this->clientManager->checkLogin($login, $pwd, true);
    }

    /* Cette fonction permet d'ajouter un ordinateur*/
    public function addComputer($computer) {
      return $this->ordinateurManager->add($computer);
    }

    /* Cette fonction permet de supprimer un ordinateur */
    public function deleteComputer($idComputer) {
      return $this->ordinateurManager->deleteOrdi($idComputer);
    }

    /* Cette fonction permet d'ajouter une salle*/
    public function addSalle($salle) {
      return $this->salleManager->addSalle($salle);
    }

    /* Cette fonction permet d'obtenir la liste de toutes les salles*/
    public function getAllSalles() {
      $salles = $this->salleManager->listerSalles();
      $response = array();
      for ($salle in $salles) {
        array_push($response, $salle->toJSON());
      }
      return json_encode($response);
    }

    /* Cette fonction permet de savoir le nombre de salle*/
    public function getNombreSalle() {
      $nb = $this->salleManager->countSalle();
      $response = array('nombreSalle' => $nb, );
      return json_encode($response);
    }

    /* Cette fonction permet de savoir le nombre de pc présent dans une salle*/
    public function getNombreDePcParSalle($idSalle) {
      $nb = $this->salleManager->countPcSalle($idSalle);
      $response = array('nombrePC' => $nb, );
      return json_encode($response);
    }

    /* Cette fonction permet de supprimer une salle */
    public function deleteSalle($idSalle) {
      return $this->salleManager->deleteSalle($idSalle);
    }

}
