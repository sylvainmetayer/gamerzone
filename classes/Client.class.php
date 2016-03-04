<?php

class Client
{
    private $idClient;
    private $idCompte;
    private $nom;
    private $prenom;
    private $mail;
    private $date_naissance;
    private $login;
    private $pwd;

  /* Fonction d'affectation pour le constructeur */
  public function affecte($donnees)
  {
      foreach ($donnees as $attribut => $valeur) {
          switch ($attribut) {
        case 'idClient' : $this->setIdClient($valeur);
        break;

        case 'idCompte' : $this->setIdCompte($valeur);
        break;

        case 'nom' : $this->setNom($valeur);
        break;

        case 'prenom' : $this->setPrenom($valeur);
        break;

        case 'mail' : $this->setMail($valeur);
        break;

        case 'date_naissance' : $this->setDate_naissance($valeur);
        break;

        case 'login' : $this->setLogin($valeur);
        break;

        case 'pwd' : $this->setPwd($valeur);
        break;
      }
      }
  }

  /* Constructeur d'un étudiant */

  public function __construct($valeurs = array())
  {
      if (!empty($valeurs)) {
          $this->affecte($valeurs);
      }
  }

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }

    public function getIdCompte()
    {
        return $this->idCompte;
    }

    public function setIdCompte($idCompte)
    {
        $this->idCompte = $idCompte;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getDate_naissance()
    {
        return $this->date_naissance;
    }

    public function setDate_naissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    public function toJSON()
    {
        $response = array(
        'idClient' => $this->idClient,
        'idCompte' => $this->idCompte,
        'nom' => $this->nom,
        'prenom' => $this->prenom,
        'mail' => $this->mail,
        'date_naissance' => $this->date_naissance,
        'login' => $this->login,
        'pwd' => $this->pwd,
      );

        return json_encode($response);
    }
}
