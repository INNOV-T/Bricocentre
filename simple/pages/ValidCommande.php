<?php
require ('../../Connexion.php');

// AFFICHER PRODUITS
$requetePa = $connection->query('SELECT pannier.idPa,produit.NomProduit,produit.PrixU,produit.id FROM pannier,produit WHERE  pannier.id=produit.id ORDER BY pannier.idPa DESC');
$resultatPa = $requetePa->fetchAll(PDO::FETCH_ASSOC);
$error="";

// GET CLIENTS
$requeteF = $connection->query("SELECT * FROM client");
$resultat = $requeteF->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET["action"]) && $_GET["action"] === "dell" && isset($_GET["name"])) {
  $id = $_GET["name"];
  $requete2 = $connection->query("DELETE FROM pannier WHERE id = $id");
  $resultat2 = $requete2->fetchAll(PDO::FETCH_ASSOC);
}

$produit = isset($_GET['idProd']) ? $_GET['idProd'] :'';
$client = isset($_GET['client']) ? $_GET['client'] : '';
$quantite = isset($_GET['quantite']) ? $_GET['quantite'] : '';
if(isset($_GET['valider'])){
  $ajoutComm = $connection->query("INSERT INTO commande_courant(id,idClient,quantite) values('$produit','$client','$quantite')");
  if($ajoutComm){
    $dellPann = $connection->query("DELETE FROM pannier WHERE id = '$produit'");
    if($dellPann){
      header('Location: ValidCommande.php');
    }
  }
}


// if (isset($_GET["action"]) && $_GET["action"] === "add" && isset($_GET["name"])) {
//   $id = $_GET["name"];
//   $requete1 = $connection->query("SELECT NomProduit,prixVente FROM produit where id = '$id'");
//   $resultat1 = $requete1->fetchAll(PDO::FETCH_ASSOC);
//   $produit = $resultat1[0]['NomProduit'];
//   $prix = $resultat1[0]['prixVente'];
//   // var_dump($produit);
//   // var_dump($prix);
//   if($resultat1){
//     $req = $connection->query("INSERT INTO pannier(NomProduit,prix) VALUES('$produit','$prix')");
//     if($req){
//       $requetePa = $connection->query('SELECT id,NomProduit,prix,quantite FROM pannier ORDER BY id DESC');
//       $resultatPa = $requetePa->fetchAll(PDO::FETCH_ASSOC);
//       if(empty($resultatPa)){
//         $error = 'pannier vide';
//       }
//     }
//   }
// }else{
//   $reqq = $connection->query('DELETE FROM pannier');
// }





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
              <!-- <div class="cont bg-light p-3" style="height: auto;width: 100%;">
                <form method="GET">
                  <label for="">Quantité</label>
                  <input type="number" placeholder="Quantité" class="form-control mt-2">
                  <button class="btn btn-warning btn-sm mt-2" style="width: 100%;" name="bouton">Valider</button>
                </form>
              </div> -->
            </div>
            <p class="alert alert-secondary"><i class="fa fa-users"></i> Gestion des commandes chez <b class="text-warning">Bricocentre Fianarantsoa</b></p>
            
            <form>
              <div class="clients p-3">
                  <div class="list center">
                    <div class="produit m-3">
                      <h4 class="text-dark alert alert-light" style="font-weight: bold;"><i class="fa fa-list"></i> Voici la listes de vos commandes 
                       <a class="btn btn-info" href="../pages/Commande.php" style="float: right;"><i class="fa fa-left-long"></i> Commander une autre produit</a></h4>
                      <div class="prods" style="height: 52vh !important;">
                      
                        <table
                        class="table table-hover table-responsive table-striped table-sm"
                      >
                      <thead class="bg-primary text-dark">
                              <tr>
                                <td>♣</td>
                                <td>Nom du produit</td>
                                <td>Prix unitaire HT <b class="text-warning">(Ar)</b></td>
                                <td>id Produit</td>
                                <td>Quantité</td>
                                <td>Action</td>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($resultatPa as $keys) : ?>
                                <tr>
                                    <?php foreach ($keys as $key) : ?>
                                        <td><?= $key ?></td>
                                    <?php endforeach ?>
                                      <!-- <?php
                                      
                                      var_dump($keys['id']);
                                      ?> -->
                                      <td>
                                          <input type="number" name="idProd" placeholder="idP" value="<?=$keys['id']?>" style="display: none;">
                                          <input type="number" name="quantite" placeholder="quantite">
                                      </td>
                                      <td>
                                        <a href="ValidCommande.php?name=<?= $keys['idPa'] ?>&&action=dell"><button class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></button></a>
                                      </td>
                                </tr>
                              <?php endforeach ?>
                            </tbody>
                      </table>
                      
                      

                      </div>
                    </div>
                    <div class="pannier p-3">
                      <p class="alert alert-secondary"><i class="fa fa-calculator"></i> Compte et validation des commandes</p>
                      
                          <div class="prod">
                              <div class="mb-3">
                                  <label for="" class="text-primary mt-3"><i class="fa fa-users"></i> Clients</label>
                                  <?php if (!empty($resultat)) : ?>
                                  <select name="client" class="form-control mt-2">
                                  <?php foreach ($resultat as $keyss) : ?>
                                      <option value="<?= $keyss['idClient']?>"><?= $keyss['NomComplet'] ?></option>
                                      <?php endforeach ?>
                                  </select>
                                  <?php  else:  ?>
                                      <p class="alert alert-danger" style="font-size: 0.7em;">Auccune client trouvéé... veiller ajouter votre fournisseur</p>
                                  <?php endif ?>
                              </div>
                          <?php if(!empty($resultatPa)): ?>
                              <h3 class="p-3 bg-light text-danger mt-5" style="font-weight: bold;">Total : 400 000 Ar</h3>
                          <?php else: ?>
                          <p class="alert alert-info"><?=$error?> Aucune commande passé</p>
                          <?php endif ?>
                      </div>
                      <div>

                          
                              <?php if(!empty($resultatPa)): ?>
                                <div class="center">
                                  <button style="width: 50%;" type="submit" name="valider" class="btn btn-secondary" ><i class="fa fa-check-square"></i> Valider</button>
                                  <button style="width: 50%;" type="reset" class="btn btn-info m-2" ><i class="fa fa-check-circle"></i> Finaliser les commandes</button>
                                </div>
                              <?php else: ?>
                              <button style="width: 100%;" type="reset" class="btn btn-secondary" disabled><i class="fa fa-check-circle"></i> Valider les commandes</button>
                              <?php endif ?>
                              
                          </div>
                  
                    <p class="alert alert-info mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, iure itaque. T</p>
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </section>
      </main>
    </main>
  </body>
</html>
