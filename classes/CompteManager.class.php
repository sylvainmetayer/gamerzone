<?php
class CompteManager{
  private $db;

  public function __construct($db){
    $this->db = $db;
  }

  /**
  * Permet d'insérer un compte dans la base de données, avec un solde nul.
  *@return idInsere en base
  * Méthode testée et fonctionnelle
  */
  public function add($compte){
    $requete=$this->db->prepare(
      'INSERT INTO compte(solde) VALUES (:solde)'
    );

    $requete->bindValue(':solde',$compte->getSolde() != null ? $compte->getSolde() : 0);

    $requete->execute();

    $idInserted = $this->db->lastInsertId();

    return $idInserted;
  }

  /**
  * Permet de créditer le solde d'un compte avec un montant strictement positif.
  *@return {'idCompte' : x, "creditOK": true|false}
  *
  */
  public function crediter($montant, $idCompte) {
    if ($montant <= 0) {
      return false;
    }

    //Test a faire si le compte existe ou pas.

    $sql = 'UPDATE compte SET solde = solde + :montant where idCompte = :idCompte;';
    $requete=$this->db->prepare($sql);

    $requete->bindValue(':montant', $montant);
    $requete->bindValue(':idCompte', $idCompte);

    $retour = $requete->execute();

    var_dump($requete);
    echo $retour;
    if ($retour == 0) {
      $response = array(
        'idCompte' => $idCompte,
        'creditOK' => false
      );
    }

    $response = array(
      'idCompte' => $idCompte,
      'creditOK' => true
    );

    $json = json_encode($response);
    return $json;
  }


  /**
  * Retourne le solde d'un client.
  *@return un objet JSON au format {idCompte : id | null, solde : solde | null}
  * Méthode testée et fonctionnelle.
  */
  public function getSolde($idCompte) {

    $sql = 'SELECT solde, idCompte FROM compte where idCompte = :idCompte;';

    $requete = $this->db->prepare($sql);

    $requete->bindValue(':idCompte', $idCompte);

    $retour = $requete->execute();

    if ($retour == 0) {
      return false;
    }

    $tmp = $requete->fetch(PDO::FETCH_ASSOC);

    $compte = new Compte($tmp);

    $response = array(
                  'idCompte' => $compte->getIdCompte(),
                  'solde' => $compte->getSolde()
                );

    $json = json_encode($response);
    return $json;
  }


}
?>
