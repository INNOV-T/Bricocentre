

<?php

require('../../Connexion.php');
// AFFICHER PRODUITS
$requeteP = $connection->query('SELECT NomProduit,Designation,`references`,stock_initiale,PrixVente FROM produit ORDER BY id DESC');
$resultatP = $requeteP->fetchAll(PDO::FETCH_ASSOC);

// GET FOURNISSEUR
$requeteF = $connection->query("SELECT * FROM fournisseur");
$resultat = $requeteF->fetchAll(PDO::FETCH_ASSOC);

// var_dump($resultat);

$nom = isset($_GET['nom']) ? $_GET['nom'] :'';
$designation = isset($_GET['designation']) ? $_GET['designation'] : '';
$prix = isset($_GET['prix']) ? $_GET['prix']:'';
$ref = isset($_GET['reference']) ? $_GET['reference']:'';
$fournisseur = isset($_GET['fournisseur']) ? $_GET['fournisseur']:'';
$stock = isset($_GET['stock']) ? $_GET['stock']:'';
$prixvente = isset($_GET['prixVente']) ? $_GET['prixVente']:'';
$prixgros = isset($_GET['prixGros']) ? $_GET['prixGros']:'';

if(isset($_GET['btn'])){
  $requete = $connection->query("INSERT INTO `produit`(`NomProduit`, `Designation`, `PrixU`, `references`, `idFournisseur`, `stock_initiale`, `prixVente`, `prixGros`) VALUES ('$nom','$designation','$prix','$ref','$fournisseur','$stock','$prixvente','$prixgros')");
  if($requete){
    echo "<script> alert('success')</script>";
    header('Location: Produits.php');
  }else{
    echo "<script> alert('echec')</script>";
  }
}



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
    <script>
        function show(){
          var modall = document.querySelector(".modale");
          modall.style.display = "block";
        }
        function hide(){
          var modall = document.querySelector(".modale");
          modall.style.display = "none";
        }
      </script>
</head>
<body>
    <aside class="maping">
        <div class="container p-4">
            <div class="center">
                <img src="../../images/logo.jpg" alt="" width="80">
            </div>
            <div class="menu mt-5">
                <a href="Clients.php" class="btn btn-light "><i class="fa fa-users"></i> Clients</a>
                <a href="Fournisseur.php" class="btn btn-light "><i class="fa fa-user-circle"></i> Fournisseurs</a>
                <a href="" class="btn btn-light active"><i class="fa-solid fa-sitemap"></i> Produits</a>
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
            <!-- MODALE PRODUIT -->
          <div class="modale">
            <div class="ajout-cli p-3 mt-4">
              <!-- <p class="alert alert-secondary"><i class="fa fa-plus-square"></i> Ajouter une nouvelle client</p> -->
              
              <div class="formulaire p-4">
                <p class="alert alert-warning"><i class="fa fa-plus-square"></i> Ajouter une nouvelle produit</p>
                <form>
                  <div class="simple p-3">
                    <div class="center">
                      <input type="text" class="form-control" placeholder="Nom du produit" name="nom">
                      <input type="text" class="form-control" placeholder="Reference" name="reference" style="margin-left: 2%;">
                    </div>
                    <div class="center">
                      <input type="text" class="form-control mt-3" placeholder="Designation" name="designation">
                      <input type="number" class="form-control mt-3" placeholder="Prix d'achat" style="margin-left: 2%;" name="prix">
                    </div>
                    
                    <div class="center">
                      <input type="number" class="form-control mt-3" placeholder="Prix normale" name="prixVente">
                      <input type="number" class="form-control mt-3" placeholder="Prix de gros" name="prixGros" style="margin-left: 2%;">
                    </div>
                    <label for="" class="text-primary mt-3">Fournisseur</label>
                    <?php if (!empty($resultat)) : ?>
                      <select name="fournisseur" class="form-control mt-2">
                      <?php foreach ($resultat as $keyss) : ?>
                          <option value="<?= $keyss['idFournisseur']?>"><?= $keyss['NomFournisseur'] ?></option>
                        <?php endforeach ?>
                      </select>
                      <?php  else:  ?>
                        <p class="alert alert-danger" style="font-size: 0.7em;">Auccune fournisseur trouvéé... veiller ajouter votre fournisseur</p>
                    <?php endif ?>
                    <div class="mt-3">
                      <label for="" class="text-primary">Parametre des stocks</label>
                      <input type="number" class="form-control mt-3" placeholder="Stock initiale" name="stock">
                    </div>
                  </div>
              
                  <div>
                    <button class="btn btn-primary m-3" type="submit" name="btn"><i class="fa fa-check-circle"></i> Enregistrer le produit</button>
                    <button class="btn btn-danger m-3" type="button" onclick="hide()"><i class="fa fa-xmark"></i> Fermer</button>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
          <!-- FIN MODALE PRODUIT -->
            <div class="stats mt-2  p-2 bg-light">
                <p class="p-3"><i class="fa fa-users"></i> Listes des vos produits chez <b>Bricocentre Fianarantsoa</b> <button class="btn btn-primary btn-sm" style="float: right;" onclick="show()"><i class="fa fa-plus-circle"></i> Ajouter un nouveau produit</button></p>
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
                              <td>Nom du produit</td>
                              <td>Designation</td>
                              <td>Reference</td>
                              <td>En stocks</td>
                              <td>Prix unitaire <b class="text-warning">(Ar)</b></td>
                              <td>Action</td>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($resultatP as $keys) : ?>
                              <tr>
                                  <?php foreach ($keys as $key) : ?>
                                      <td><?= $key ?></td>
                                  <?php endforeach ?>
                                  <td>
                                 
                                    <!-- <a href="Salle.php?name=&
                                    &action=modify"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button></a> -->
                                    <div class="center">
                                      <button class="btn btn-secondary btn-sm m-1" style="font-size: 0.6em;"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-sm" style="font-size: 0.6em;"><i class="fa fa-trash"></i></button>
                                    </div>
                                  </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="charts p-4">
                        <p><i class="fa fa-bar-chart"></i> Evaluation des produits</p>
                        <canvas id="myChart" width="900" height=500"></canvas>
                        <div class="center mt-3">
                            <div class="cli m-3 center p-5">
                                <div>
                                    <!-- <h3 style="font-weight: bold;" class="text-primary">3000</h3>
                                    <p>Entreprise</p> -->
                                </div>
                            </div>
                            <div class="cli m-3 center p-5">
                                <div>
                                    <!-- <h3 style="font-weight: bold;" class="text-primary">150</h3>
                                    <p>Simple</p> -->
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