<?php

require '../../Connexion.php';

// AFFICHER CLIENT
$requeteP = $connection->query('SELECT NomComplet,adresse,phone,`typeCompte` FROM client ORDER BY id DESC');
$resultatP = $requeteP->fetchAll(PDO::FETCH_ASSOC);






?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brico-centre-Digitalisation</title>
    <link rel="stylesheet" href="../../Bootstrap/css/all.min.css" />
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Bootstrap/css/Layout.css" />
    <link rel="stylesheet" href="../css/Admin.css" />

    <script src="../../Bootstrap/js/all.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../../images/logi.png" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <aside class="maping">
        <div class="container p-4">
            <div class="center">
                <img src="../../images/logo.jpg" alt="" width="80">
            </div>
            <div class="menu mt-5">
                <a href="" class="btn btn-light active"><i class="fa fa-users"></i> Clients</a>
                <a href="Fournisseur.php" class="btn btn-light"><i class="fa fa-user-circle"></i> Fournisseurs</a>
                <a href="Produits.php" class="btn btn-light"><i class="fa-solid fa-sitemap"></i> Produits</a>
                <a href="Stocks.html" class="btn btn-light"><i class="fa-solid fa-square-poll-horizontal"></i> Stocks</a>
                <a href="Comptable.html" class="btn btn-light"><i class="fa-solid fa-scale-balanced"></i> Comptablité</a>
                <a href="Admin.php" class="btn btn-info"><i class="fa-solid fa-left-long"></i> Retour au menu</a>
            </div>
        </div>
    </aside>
    <section class="contenu">
        <div class="container-fluid pt-2">
            <div class="header p-3">
                <div class="logo mt-1">
                    <h4><i class="fa-solid fa-chart-simple"></i> BRICO<b class="text-warning">CENTRE</b></h4>
                </div>
                <div class="profil center ">
                    <h3><i class="fas fa-bell text-secondary m-2"></i></h3>
                    <h3 style="margin-right: 3%;"><i class="fas fa-user-circle text-primary m-2"></i></h3>
                    <button class="btn btn-info btn-sm "><i class="fas fa-sign-out-alt"></i> Deconnexion</button>
                </div>
            </div>
            <div class="stats mt-2  p-2 bg-light">
                <p class="p-3"><i class="fa fa-users"></i> Listes des clients chez <b>Bricocentre Fianarantsoa</b></p>
                <div class="center">
                    <div class="listes m-3 p-4" style="padding-top: 0 !important;">
                        <div class="mb-4 mt-5">
                            <form action="" class="center">
                                <input type="text" class="form-control m-2 bg-light" placeholder="Recherche ...">
                                <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <table
                        class="table table-hover table-responsive table-striped table-sm"
                      >
                        <thead class="bg-primary text-dark">
                            <tr>
                              <td>Nom du client</td>
                              <td>Adresse</td>
                              <td>Numero télèphone</td>
                              <td>Type</td>
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
                    <div class="charts p-4">
                        <p>Evaluation des clients</p>
                        <canvas id="myChart" width="900" height=500"></canvas>
                        <div class="center mt-3">
                            <div class="cli m-3 center p-5">
                                <div>
                                    <h3 style="font-weight: bold;" class="text-primary">3000</h3>
                                    <p>Entreprise</p>
                                </div>
                            </div>
                            <div class="cli m-3 center p-5">
                                <div>
                                    <h3 style="font-weight: bold;" class="text-primary">150</h3>
                                    <p>Simple</p>
                                </div>
                            </div>
                        </div>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['January', 'February', 'March', 'April', 'May'],
                                    datasets: [{
                                        label: 'Monthly Sales',
                                        data: [12, 19, 3, 5, 2],
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <!-- <div class="footer p-3">
                <a href="" class="btn btn-secondary"></a>
            </div> -->
        </div>
    </section>
</body>
</html>