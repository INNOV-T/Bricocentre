<?php

require('../../Connexion.php');
// AFFICHER FOURNISSEUR
$requeteP = $connection->query('SELECT NomFournisseur,adresse FROM fournisseur ORDER BY idFournisseur DESC');
$resultatP = $requeteP->fetchAll(PDO::FETCH_ASSOC);


// COMPTE CLIENT
$requeteC = $connection->query('SELECT COUNT(id) FROM client');
$resultatC = $requeteC->fetchAll(PDO::FETCH_ASSOC);

$requetePP = $connection->query('SELECT COUNT(id) FROM produit');
$resultatPP = $requetePP->fetchAll(PDO::FETCH_ASSOC);

$clients = $resultatC[0]["COUNT(id)"];
$produits = $resultatPP[0]["COUNT(id)"];
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
                <a href="Clients.php" class="btn btn-light"><i class="fa fa-users"></i> Clients</a>
                <a href="Fournisseur.php" class="btn btn-light"><i class="fa fa-user-circle"></i> Fournisseurs</a>
                <a href="Produits.php" class="btn btn-light"><i class="fa-solid fa-sitemap"></i> Produits</a>
                <a href="Stocks.html" class="btn btn-light"><i class="fa-solid fa-square-poll-horizontal"></i> Stocks</a>
                <a href="Comptable.html" class="btn btn-light"><i class="fa-solid fa-scale-balanced"></i> Comptablité</a>
                <a href="" class="btn btn-light"><i class="fa-solid fa-clock"></i> Demande en attente</a>
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
            <div class="stats mt-2 center p-2">
                <div class="one m-2 p-3">
                    <p class="p-3 bg-secondary text-light"><i class=" fa fa-line-chart"></i> statistique generale</p>
                    <div class="center">
                        <div class="cli m-2 center">
                            <div>
                                <h2 style="font-weight: bold;"><?=$clients?></h2>
                                <p>Clients</p>
                            </div>
                        </div>
                        <div class="cli m-2 center">
                            <div>
                                <h2 style="font-weight: bold;"><?=$produits?></h2>
                                <p>Produits</p>
                            </div>
                        </div>
                    </div>
                    <div class="chart mt-3 p-3">
                        <p>Evaluation des clients</p>
                        <canvas id="myChart" width="900" height="400"></canvas>
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
                <div class="two m-2 p-3">
                    <p class="alert alert-light" style="font-weight: bold;"><i class="fa fa-users"></i> Vos fournisseurs</p>
                    <div class="fournisseur">
                        <table
                  class="table table-hover table-responsive table-striped table-sm"
                >
                  <thead class="bg-secondary text-light">
                    <tr>
                      <td>Nom du founisseur</td>
                      <td>Adresse</td>
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
                <div class="one m-2 p-3">
                    <p class="p-3 bg-secondary text-light"><i class=" fa fa-signal-perfect"></i> Commande et caisse</p>
                    <div class="center">
                        <div class="cli m-2 center">
                            <div>
                                <h2 style="font-weight: bold;" class="text-info">230</h2>
                                <p>Effectué</p>
                            </div>
                        </div>
                        <div class="cli m-2 center">
                            <div>
                                <h2 style="font-weight: bold;" class="text-primary">12</h2>
                                <p>En attente</p>
                            </div>
                        </div>
                    </div>
                    <div class="chart commande mt-3 p-3">
                        <p class="alert alert-light"><i class="fa fa-calculator text-warning"></i> Consultation de recette</p>
                        <h4 class="bg-secondary text-light p-3">Journalier :  <br> <br><b class="text-warning text-center">10 000 000 Ar</b></h4>
                    </div>
                </div>
            </div>
            <div class="footer p-3">
                <a href="" class="btn btn-secondary mt-2"><i class="fa fa-refresh"></i> Reinitialiser la recette journaliere</a>
            </div>
        </div>
    </section>
</body>
</html>