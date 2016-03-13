<?php

$pdo = new Mypdo();
$manager = new ClientManager($pdo);

if (!isset($_GET['idDelete'])) {
    $clients = $manager->getAllClients();

    ?>
  <div class="container">
    <a class="text-center" href="index.php?page=1">Ajouter un client</a>
      <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <table>
              <tr>
                <th>Nom</th>
                <th>Pr&eacute;nom</th>
                <th>Mail</th>
                <th>Date Naissance</th>
                <th>Login</th>
              </tr>
              <?php
              foreach ($clients as $client) {
                  ?>
                <tr>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getNom();
                  ?></a></td>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getPrenom();
                  ?></a></td>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getMail();
                  ?></a></td>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getDate_naissance();
                  ?></a></td>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getLogin();
                  ?></a></td>
                </tr>
              <?php

              }
    ?>
            </table>
      </div>
  </div>
  <?php

} else {
    var_dump($manager->delete($_GET['idDelete']));
    $clients = $manager->getAllClients();

    ?>
  <div class="container">
    <center><a href="index.php?page=1">Ajouter un client</a></center>
      <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <table>
              <tr>
                <th>Nom</th>
                <th>Pr&eacute;nom</th>
                <th>Mail</th>
                <th>Date Naissance</th>
                <th>Login</th>
              </tr>
              <?php
              foreach ($clients as $client) {
                  ?>
                <tr>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getNom();
                  ?></a></td>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getPrenom();
                  ?></a></td>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getMail();
                  ?></a></td>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getDate_naissance();
                  ?></a></td>
                  <td><a href="index.php?page=2&amp;idDelete=<?php echo $client->getIdClient();
                  ?>"><?php echo $client->getLogin();
                  ?></a></td>
                </tr>
              <?php

              }
    ?>
  </table><?php

}
?>
