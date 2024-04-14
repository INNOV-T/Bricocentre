<?php

require '../../Connexion.php';

// AFFICHER CLIENT
$requeteC = $connection->query('SELECT NomComplet,adresse,`typeCompte` FROM client ORDER BY idClient DESC');
$resultatC = $requeteC->fetchAll(PDO::FETCH_ASSOC);

// AFFICHER PRODUITS
$requeteP = $connection->query('SELECT NomProduit,Designation,`references`,PrixU FROM produit ORDER BY id DESC');
$resultatP = $requeteP->fetchAll(PDO::FETCH_ASSOC);

// COMPTE CLIENT
$requeteCc = $connection->query('SELECT COUNT(idClient) FROM client where typeCompte ="Entreprise"');
$resultatCc = $requeteCc->fetchAll(PDO::FETCH_ASSOC);

$requeteS = $connection->query('SELECT COUNT(idClient) FROM client where typeCompte ="Client simple"');
$resultatS = $requeteS->fetchAll(PDO::FETCH_ASSOC);

$clients = $resultatCc[0]["COUNT(idClient)"];
$client2 = $resultatS[0]["COUNT(idClient)"];
?>
























<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brico-centre-Digitalisation</title>
    <link rel="stylesheet" href="../../Bootstrap/css/all.min.css" />
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Bootstrap/css/Layout.css" />
    <link rel="stylesheet" href="../css/Home.css" />

    <script src="../../Bootstrap/js/all.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../../images/logi.png" />
  </head>
  <body>
    <header>
      <div class="container-fluid pt-3">
        <div class="mt-2" style="float: left;">
          <img src="../../images/logi - Copie.png" alt="" width="150">
        </div>
        <div class="center" style="width: 20%;float: right;">
          <h3><i class="fa fa-user-circle"></i></h3>
          <p style="margin-left: 2%;font-weight: bold;" class="mt-1">mariusrandrianarison@gmail.com</p>
        </div>
      </div>
    </header>
    <main>
      <main>
        <aside>
          <div class="container-fluid p-5">
            <div class="center mb-4" style="width: 100%">
              <img src="../../images/logo.jpg" alt="" width="100" />
            </div>
            <a class="btn btn-light" href="Client.php">
              <i class="fa fa-user"></i> Gérer les clients
            </a>
            <a class="btn btn-light" href="Produit.php">
              <i class="fa fa-list"></i> Gérer les produits
            </a>
            <a class="btn btn-light" href="Commande.html">
              <i class="fa fa-check-circle"></i> Gérer les commandes
            </a>

            <a class="btn btn-warning" href="Login.html">
              <i class="fas fa-sign-out-alt"></i> Deconnexion
            </a>
          </div>
        </aside>
        <section class="contenu">
          <div class="container-fluid p-3">
            <p class="p-2">
              <b>
                <i class="fa fa-bank"></i> Application de gestion des stocks, clients, caisses, fournisseur
                developped by </b
              ><b class="text-primary">innov-T</b>
            </p>
            <div class="statistique center">
              <div class="one p-4">
                <h3 class="mt-3 text-success">
                  <i class="fa fa-bar-chart"></i> <?=$clients?>
                </h3>
                <p>Clients (Entreprise)</p>
              </div>
              <div class="one p-4">
                <h3 class="mt-3 text-primary">
                  <i class="fa fa-bar-chart"></i> <?=$client2?>
                </h3>
                <p>Clients (Simple)</p>
              </div>
              <div class="one p-4">
                <h3 class="mt-3"><i class="fa fa-bar-chart"></i> 12200</h3>
                <p>Commande passé</p>
              </div>
              <!-- <div class="one p-4">
                <h3 class="mt-3 text-success">
                  <i class="fa fa-dollar"></i> 12200
                </h3>
                <p>Recette journaliére</p>
              </div> -->
            </div>
            <div class="historique mt-3 p-2 center">
              <div class="client p-3">
                <p>
                  <i class="fa fa-calendar-check"></i> Historique des clients
                </p>
                <table
                  class="table table-hover table-responsive table-striped table-sm"
                >
                  <thead class="bg-secondary text-light">
                    <tr>
                        <td>Nom du client</td>
                        <td>Adresse</td>
                        <td>Type</td>
                    </tr>
                  </thead>
                  <tbody>
                          <?php foreach ($resultatC as $keys) : ?>
                              <tr>
                                  <?php foreach ($keys as $key) : ?>
                                      <td><?= $key ?></td>
                                  <?php endforeach ?>
                              </tr>
                          <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="produit p-3">
                <p>
                  <i class="fa fa-calendar-check"></i> Nos produits chez
                  <b class="text-warning">Bricocentre</b> Fianarantsoa
                </p>
                <table
                  class="table table-hover table-responsive table-striped table-sm"
                >
                  <thead class="bg-secondary text-light">
                    <tr>
                              <td>Nom du produit</td>
                              <td>Designation</td>
                              <td>Reference</td>
                              <td>Prix unitaire HT <b class="text-warning">(Ar)</b></td>
                    </tr>
                  </thead>
                  <tbody>
                          <?php foreach ($resultatP as $keys) : ?>
                              <tr>
                                  <?php foreach ($keys as $key) : ?>
                                      <td><?= $key ?></td>
                                  <?php endforeach ?>
                              </tr>
                          <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </main>
    </main>
  </body>
</html>
