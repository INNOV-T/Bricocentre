<?php
require ('../../Connexion.php');

// AFFICHER PRODUITS
$requeteP = $connection->query('SELECT id,NomProduit,Designation,`references`,PrixU FROM produit ORDER BY id DESC');
$resultatP = $requeteP->fetchAll(PDO::FETCH_ASSOC);
$error="";

// if (isset($_GET["action"]) && $_GET["action"] === "dell" && isset($_GET["name"])) {
//   $id = $_GET["name"];
//   $requete2 = $connection->query("DELETE FROM pannier WHERE id = $id");
//   $resultat2 = $requete2->fetchAll(PDO::FETCH_ASSOC);
// }


if (isset($_GET["action"]) && $_GET["action"] === "add" && isset($_GET["name"])) {
  $id = $_GET["name"];
  $requete1 = $connection->query("SELECT * FROM produit where id = '$id'");
  $resultat1 = $requete1->fetchAll(PDO::FETCH_ASSOC);
  $produit = $resultat1[0]['id'];
  // var_dump($produit);
  // var_dump($prix);
  if($resultat1){
    $req = $connection->query("INSERT INTO pannier(id) VALUES('$produit')");
    if($req){
      $requetePa = $connection->query('SELECT pannier.idPa,produit.NomProduit,produit.PrixU FROM pannier,produit WHERE pannier.id=produit.id ORDER BY pannier.idPa DESC');
      $resultatPa = $requetePa->fetchAll(PDO::FETCH_ASSOC);
      if(empty($resultatPa)){
        $error = 'pannier vide';
      }
    }
  }
}else{
  $reqq = $connection->query('DELETE FROM pannier');
}





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
    <link rel="stylesheet" href="../css/Commande.css" />

    <script src="../../Bootstrap/js/all.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../../images/logi.png" />
    <script>
      function show(){
        var modall = document.querySelector(".modale");
        modall.style.display = "block";
      }
      function hide(){
        var modall = document.querySelector(".modale");
        modall.style.display = "none";
      }
      function quantite(){
        var qt = document.Q.qtt.value;
        var tt = document.TT.qqtt;
        tt.value = qt;
      }
    </script>
  </head>
  <body  onsubmit="show()">
    <header>
      <div class="container-fluid pt-3">
        <div class="mt-2" style="float: left;">
            <a href="Home.html">
                <img src="../../images/logi - Copie.png" alt="" width="150">
            </a>
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
            <a class="btn btn-light" href="Client.html">
              <i class="fa fa-user"></i> Gérer les clients
            </a>
            <a class="btn btn-light" href="Produit.html">
              <i class="fa fa-list"></i> Gérer les produits
            </a>
            <a class="btn btn-light active" href="#">
              <i class="fa fa-check-circle"></i> Gérer les commandes
            </a>
            <a class="btn btn-light" href="Caisse.html">
              <i class="fa fa-money-bill"></i> Géstion de caisse
            </a>
            <!-- <form name="TT" method="GET">
              <input type="number" name="qqtt">
            </form> -->
            <!-- <a class="btn btn-warning" href="#">
              <i class="fa fa-bar-chart"></i> Gérer les stocks
            </a> -->
            <a class="btn btn-warning" href="Login.html">
              <i class="fas fa-sign-out-alt"></i> Deconnexion
            </a>
          </div>
        </aside>
        <section class="contenu">
          <div class="container-fluid p-3">
            <div class="modale p-3" style="height: auto;
                    width: 20%;
                    background-color: black;
                    display: none;
                    position: absolute;
                    z-index: 11 !important;margin-top:7vh;margin-left:26%; animation: show linear 1s "  
              >
              <div class="cont bg-light p-3" style="height: auto;width: 100%;">
                <form method="GET">
                  <label for="">Quantité</label>
                  <input type="number" placeholder="Quantité" class="form-control mt-2">
                  <button class="btn btn-warning btn-sm mt-2" style="width: 100%;" name="bouton">Valider</button>
                </form>
              </div>
            </div>
            <p class="alert alert-secondary"><i class="fa fa-users"></i> Gestion des commandes chez <b class="text-warning">Bricocentre Fianarantsoa</b></p>
            <div class="clients p-3">
                <div class="head alert alert-secondary p-2">
                    <form action="" class="center">
                        <div>
                            <input type="text" class="form-control m-1" placeholder="Recherche produit ...">
                        </div>
                        <button class="btn btn-warning m-2"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="bouton">
                        <a href="Home.html" class="btn btn-primary m-2"><i class="fa fa-home-user"></i></a>
                    </div>
                </div>
                <div class="list center">
                  <div class="produit m-3">
                    <p class="text-dark" style="font-weight: bold;"><i class="fa fa-list"></i> Veiller selectionner vos produits ci-dessous</p>
                    <div class="prods">
                    
                      <table
                      class="table table-hover table-responsive table-striped table-sm"
                    >
                    <thead class="bg-primary text-dark">
                            <tr>
                              <td>♣</td>
                              <td>Nom du produit</td>
                              <td>Designation</td>
                              <td>Reference</td>
                              <td>Prix unitaire HT <b class="text-warning">(Ar)</b></td>
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
                                      <a href="Commande.php?name=<?= $keys['id'] ?>&&action=add"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button></a>
                                    </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                    </table>
                    
                    

                    </div>
                  </div>
                  <div class="pannier p-3">
                    <p class="alert alert-secondary"><i class="fa fa-shopping-cart"></i> Vos pannier</p>
                    <div class="prod">
                    <?php if(!empty($requetePa)): ?>
                      <table
                      class="table table-hover table-responsive table-striped table-sm"
                    >
                      <thead class="bg-primary text-dark">
                        <tr>
                          <td>♣</td>
                          <td>Nom produit</td>
                          <td>Prix HT</td>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($resultatPa as $keyss) : ?>
                              <tr>
                                  <?php foreach ($keyss as $keyy) : ?>
                                      <td><?= $keyy ?></td>
                                  <?php endforeach ?>
                              </tr>
                            <?php endforeach ?>
                      </tbody>
                    </table>
                    <?php else: ?>
                      <p class="alert alert-info"><?=$error?> Pannier vide veuiller ajouter</p>
                    <?php endif ?>
                  </div>
                  <div>
                    <form action="" class="center">
                        <a href="ValidCommande.php" style="width: 50%;" type="reset" class="btn btn-secondary"><i class="fa fa-check-circle"></i> Suivant</a>
                        <button class="btn btn-info" style="width: 50%; margin-left: 2%;" type="submit"><i class="fa fa-xmark-circle"></i> Vider le pannier</button>
                    </form>
                  </div>
                  </div>
                </div>
            </div>
          </div>
        </section>
      </main>
    </main>
  </body>
</html>
