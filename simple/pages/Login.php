<?php
require '../../Connexion.php';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$pwd = isset($_GET['password']) ? $_GET['password'] : '';
$error ="";

if (isset($_GET['btn'])) {
  $requete = $connection->query("SELECT typeCompte,email,pwd FROM user_demande where email='$email'");
  $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
  if($resultat){
    if ($resultat[0]["typeCompte"] == 'Caissier(e)' && $resultat[0]["pwd"] == "$pwd") {
        header('Location: Caisse.html');
    }elseif($resultat[0]["typeCompte"] == 'Mangasinier'){
      header('Location: Home.php');
    }
    elseif($resultat[0]["typeCompte"] == 'Commerciale'){
      header('Location: Commande.html');
    }
     else {
        // echo "<script> alert('Echec')</script>";
        // header('Location: Login.php');
        $error = "une erreur s'est produite veuiller verifier vos informations";
    }
  }else{
    $error = "une erreur s'est produite veuiller verifier vos informations";
  }
}

$admin = isset($_GET['admin']) ? $_GET['admin'] :'';
$mdps = isset($_GET['mdps']) ? $_GET['mdps'] : '';

if(isset($_GET['add'])){
  if($admin == 'bricocentre.mg@gmail.com' && $mdps == 'passroot@bricocentre'){
    header('Location: ../../admin/pages/Admin.php');
  }else{
    $error = "une erreur s'est produite veuiller verifier vos informations";
  }
}

?>


























<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Authentification-Brico-centre-Digitalisation</title>
    <link rel="stylesheet" href="../../Bootstrap/css/all.min.css" />
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Bootstrap/css/Layout.css" />
    <link rel="stylesheet" href="../css/Login.css" />
    <script src="../../Bootstrap/js/all.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../../images/logi.png" />
    <script>
      function show(){
        var modall = document.querySelector(".login-admin");
        modall.style.display = "block";
      }
    </script>
  </head>
  <body>
    <!-- <header style="margin-top: 0.5vhvh;">
      <div class="container pt-2">
        <img src="../../images/logo.jpg" alt="" class="img-fluid" width="50" />
      </div>
    </header> -->
    
    <div class="contenu-login center p-2 container mt-1">
      <div class="login-admin">
        <div class="admin p-5 text-center">
          <h3>Administrateur</h3>
          <div class="form-group mt-5">
            <form method="GET">
              <!-- <label class="form-label mt-4">Floating labels</label> -->
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required name="admin">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off" required name="mdps">
                <label for="floatingPassword">Password</label>
              </div>
              <div>
                <button type="submit" class="btn btn-secondary p-2 btn-sm mt-3" name="add"><i class="fa fa-check-circle"></i> Se connecter</button>
              </div>
            </form>
          </div>
          <div class="social center mt-3">
            <h2><i class="fa-brands fa-facebook text-primary m-2"></i></h2>
            <h2><i class="fa-solid fa-envelope text-secondary m-2"></i></h2>
          </div>
        </div>
      </div>
      
      <div class="description p-5">
        <h1 class="gradient-text mt-4">
          Digitalisation de l'entreprise BRICOCENTRE
        </h1>
        <h4>STOCK, CLIENT, FOURNISSEUR, CAISSE</h4>
        <div>
          <a href="Singin.php" class="btn btn-warning btn-sm p-3 mt-4">
            <i class="fa fa-check-circle"></i> Creer un compte
          </a>
          <button class="btn btn-secondary btn-sm p-3 mt-4" onclick="show()">
            <i class="fa fa-lock"></i> Administration
          </button>
        </div>
        <?php if($error):?>
          <p class="alert alert-danger mt-5"><?= $error?></p>
        <?php endif ?>
      </div>
      <div class="login p-5">
        <form class="p-5">
          <h2 style="font-weight: bold">Connexion</h2>
          <div>
            <input
              type="text"
              class="form-control mt-3"
              placeholder="Adresse e-mail"
              name="email"
              required
            />
          </div>
          <div>
            <input
              type="password"
              class="form-control mt-3"
              placeholder="Mot de passe"
              name="password"
              required
            />
          </div>
          <div>
            <button class="btn btn-primary btn-sm p-2 mt-3" name="btn">
              <i class="fa fa-lock"></i> Se connecter
            </button>
          </div>
        </form>
      </div>
    </div>
    <footer>
      <div class="container center pt-4">
        <p>
          &copy;Copyright 2024 by
          <a
            style="text-decoration: none"
            target="_blank"
            href="https://www.facebook.com/profile.php?id=100089680669486"
            ><b class="text-primary">INNOV-T Madagascar</b></a
          >
        </p>
      </div>
    </footer>
  </body>
</html>
