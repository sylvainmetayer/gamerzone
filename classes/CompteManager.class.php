<?php
class CompteManager{
  private $db;

  public function __construct($db){
    $this->db = $db;
  }

  /**
  * Permet d'insérer un compte dans la base de données, avec un solde nul.
  *@return la valeur de l'id du compte.
  */
  public function add($compte){
    $requete=$this->db->prepare(
      'INSERT INTO compte(solde) VALUES (:solde)'
    );

    $requete->bindValue(':solde', 0);

    $requete->execute();

    $idInserted = $db->lastInsertId();

    return $idInserted;
  }

  /**
  * Permet de créditer le solde d'un compte avec un montant strictement positif.
  *@return true si succès, false sinon.
  */
  public function crediter($montant, $idCompte) {
    if ($montant <= 0) {
      return false;
    }

    $requete=$this->db->prepare(
      'UPDATE compte SET solde = solde + :montant where idCompte = :idCompte;'
    );

    $requete->bindValue(':montant', $montant);
    $requete->bindValue(':idCompte', $idCompte);

    $retour = $requete->execute();

    if ($retour != 0) {
      return false;
    }

    return true;
  }


  /**
  * Retourne le solde d'un client.
  *@return un objet JSON au format {idCompte : id | null, solde : solde | null}
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

    var_dump($tmp);
    $compte = new Compte($tmp);

    $response = array(
                  'idCompte' => $compte->getIdCompte(),
                  'solde' => $compte->getSolde()
                );

    $jsonstring = json_encode($response);
    echo $jsonstring;
    return true;
  }
}
?>
