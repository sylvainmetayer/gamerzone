<?php

if (!isset($_POST['nom'])) {
    ?>
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1>Ajouter un client</h1>
              <form action="#" method="post">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="prenom" required>
                <input type="text" name="mail" placeholder="em@il" required>
                <input type="text" name="date" placeholder="DD/MM/YYYY" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" required>
                <input type="text" name="idCompte" placeholder="ID compte" >
                <input type="text" name="login" placeholder="Login" required>
                <input type="password" name="pwd" value="Mot de passe" required>
                <input type="submit"  value="Valider">
              </form>
          </div>
      </div>
  </div>
  <?php

} else {
    $clientData = array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'mail' => $_POST['mail'],
    'idCompte' => isset($_POST['idCompte']) ? $_POST['idCompte'] : null,
    'date_naissance' => getEnglishDate($_POST['date']),
    'login' => $_POST['login'],
    'pwd' => $_POST['pwd'],
  );

    $client = new Client($clientData);

    $pdo = new Mypdo();
    $manager = new ClientManager($pdo);
    $retour = $manager->add($client);
    var_dump($retour);
}
?>
