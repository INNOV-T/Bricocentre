<?php
require '../../Connexion.php';

// AFFICHER CLIENT
$requeteP = $connection->query('SELECT NomComplet,adresse,phone,`typeCompte`,NIF,STAT FROM client ORDER BY id DESC');
$resultatP = $requeteP->fetchAll(PDO::FETCH_ASSOC);


$nom = isset($_GET['nom']) ? $_GET['nom'] :'';
$adresse = isset($_GET['adresse']) ? $_GET['adresse'] : '';
$phone = isset($_GET['phone']) ? $_GET['phone'] :'';
$type = isset($_GET['type']) ? $_GET['type']:'';
$nif = isset($_GET['nif']) ? $_GET['nif']:'';
$stat = isset($_GET['stat']) ? $_GET['stat']:'';
$cif = isset($_GET['cif']) ? $_GET['cif']:'';
$rcs = isset($_GET['rcs']) ? $_GET['rcs']:'';

if (isset($_GET['btn'])){
  if($type =='Entreprise'){
    $requete1 = $connection->query("INSERT INTO `client`(`NomComplet`, `adresse`, `phone`, `typeCompte`, `NIF`, `STAT`, `CIF`, `RCS`) VALUES('$nom','$adresse','$phone','$type','$nif','$stat','$cif','$rcs')");
    if($requete1){
      header('Location: Client.php');
      echo "<script> alert('success')</script>";
    }
    else{
      echo "<script> alert('Echec')</script>";
    }
  }else{
    $requete2 = $connection->query("INSERT INTO `client`(`NomComplet`, `adresse`, `phone`, `typeCompte`) VALUES('$nom','$adresse','$phone','$type')");
    if($requete2){
      echo "<script> alert('success')</script>";
    }else{
      echo "<script> alert('Echec')</script>";
    }
  }
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
    <link rel="stylesheet" href="../css/Client.css" />

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
      function entreprise(){
        var entre = Client.type.value;
        var entreprises = document.querySelector(".entreprise");
        if(entre == "Client simple"){
          entreprises.style.display = "none !important";
        }
      }
    </script>
  </head>
  <body>
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
            <a class="btn btn-light active" href="#">
              <i class="fa fa-user"></i> Gérer les clients
            </a>
            <a class="btn btn-light" href="Produit.php">
              <i class="fa fa-list"></i> Gérer les produits
            </a>
            <a class="btn btn-light" href="Commande.html">
              <i class="fa fa-check-circle"></i> Gérer les commandes
            </a>
            <!-- <a class="btn btn-warning" href="#">
              <i class="fa fa-bar-chart"></i> Gérer les stocks
            </a> -->
            <a class="btn btn-warning" href="Login.php">
              <i class="fas fa-sign-out-alt"></i> Deconnexion
            </a>
          </div>
        </aside>
        <section class="contenu">
          <!-- MODALE CLIENT -->
          <div class="modale">
            <div class="ajout-cli p-3">
              <!-- <p class="alert alert-secondary"><i class="fa fa-plus-square"></i> Ajouter une nouvelle client</p> -->
              <div class="formulaire p-4">
                <form method="GET" name="Client">
                  <div class="simple p-3">
                    <input type="text" class="form-control" placeholder="Nom complet" name="nom">
                    <div class="center">
                      <input type="text" class="form-control mt-3" placeholder="Adresse exacte du client" name="adresse">
                      <input type="tel" class="form-control mt-3" placeholder="Numero telephone" name="phone">
                    </div>
                    <div class="mt-3">
                      <label for="" class="text-primary">Type du client</label>
                      <select name="type" class="form-control mt-2" onchange="entreprise()">
                        <option>Entreprise</option>
                        <option>Client simple</option>
                      </select>
                    </div>
                  </div>
                  <div class="entreprise center  p-3 bg-light m-3">
                    <div style="width: 50%;" class="m-3">
                      <input type="text" class="form-control" placeholder="NIF" name="nif">
                      <input type="text" class="form-control mt-3" placeholder="STAT" name="stat">
                    </div>
                    <div style="width: 50%;" class="m-3">
                      <input type="text" class="form-control" placeholder="CIF" name="cif">
                      <input type="text" class="form-control mt-3" placeholder="RCS" name="rcs">
                    </div>
                  </div>
                  <div>
                    <button class="btn btn-primary m-3" type="submit" name="btn"><i class="fa fa-check-circle"></i> Enregistrer client</button>
                    <button class="btn btn-danger m-3" type="button" onclick="hide()"><i class="fa fa-xmark"></i> Fermer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- FIN MODALE CLIENT -->
          <div class="container-fluid p-3">
            <p class="alert alert-secondary"><i class="fa fa-users"></i> Gestion des clients</p>
            <div class="clients p-3">
                <div class="head alert alert-secondary p-3">
                    <form action="" class="center">
                        <div>
                            <input type="text" class="form-control" placeholder="Recherche par nom">
                        </div>
                        <button class="btn btn-warning"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="bouton">
                        <button class="btn btn-primary" onclick="show()"><i class="fa fa-plus-circle"></i> Ajouter une nouvelle client</button>
                    </div>
                </div>
                <div class="list p-3">
                    <p>
                        <i class="fa fa-calendar-check"></i> Historique des clients
                      </p>
                      <div class="listes">
                        <table
                          class="table table-hover table-responsive table-striped table-sm"
                        >
                          <thead class="bg-primary text-dark">
                            <tr>
                              <td>Nom du client</td>
                              <td>Adresse</td>
                              <td>Numero télèphone</td>
                              <td>Type</td>
                              <td>NIF </td>
                              <td>STAT</td>
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
          </div>
        </section>
      </main>
    </main>
  </body>
</html>
