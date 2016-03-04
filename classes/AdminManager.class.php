<?php
class AdminManager{
  private $db;

  public function __construct($db){
    $this->db = $db;
  }

  /**
  * Cette fonction permet de savoir si l'on est connecté en tant qu'admin.
  */
  public function checkLogin($admin){

    $sql = 'SELECT login, pwd FROM admin WHERE login=:login AND pwd=:pwd;';
    $requete = $this->db->prepare($sql);

    $requete->bindValue(':login', $admin->getLogin());
    $requete->bindValue(':pwd', $admin->getPwd());

    $requete->execute();

    $resultat = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
    if ($resultat != NULL) {
      return true;
    } else {
      return false;
    }
  }
}

?>
