<?php

class Admin
{
    private $login;
    private $pwd;

    public function __construct($valeurs = array())
    {
        $this->affecte($valeurs);
    }

    public function affecte($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            switch ($attribut) {
        case 'login' : $this->setLogin($valeur); break;
        case 'pwd' : $this->setPwd($valeur); break;
      }
        }
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }
}
