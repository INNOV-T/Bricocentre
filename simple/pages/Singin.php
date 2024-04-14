<?php
require '../../Connexion.php';
// session_start();
$nom = isset($_GET['Nom']) ? $_GET['Nom'] :'';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$pwd = isset($_GET['password']) ? $_GET['password'] : '';
$type = isset($_GET['type']) ? $_GET['type'] :'';


if (isset($_GET['btn'])) {
    $requete = $connection->query("INSERT INTO `user_demande`(`NomComplet`, `typeCompte`, `email`, `pwd`) VALUES ('$nom','$type','$email','$pwd')");
    if($requete){
      echo "<script> alert('success')</script>";
      header('Location: Login.php');
    }else{
      echo "<script> alert('echec')</script>";
    }
    
    
    
    // if ($resultat[0]["email"] == $email && $resultat[0]["password"] == $pwd) {
    //     session_start();
    //     $_SESSION['email'] = $resultat[0]["email"];
    //     $_SESSION["connecte"] = 1;
    //     header('Location: Home.php');
    // } else {
    //     echo "<script> alert('Echec')</script>";
    // }
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
    <link rel="stylesheet" href="../css/Singin.css" />
    <script src="../../Bootstrap/js/all.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../../images/logi.png" />

  </head>
  <body>
    <div class="contenu-login center p-2 container mt-1">
      <div class="description p-5">
        <h1 class="gradient-text mt-4">
          Digitalisation de l'entreprise BRICOCENTRE
        </h1>
        <h4>STOCK, CLIENT, FOURNISSEUR, CAISSE</h4>
        <div>
          <a href="Login.php" class="btn btn-warning btn-sm p-3 mt-4">
            <i class="fa fa-check-circle"></i> J'ai dèja un compte
          </a>
        </div>
      </div>
      <div class="login p-5 inscription">
        <form class="p-5" method="GET">
          <h2 style="font-weight: bold">Inscription</h2>
          <div>
            <input
              type="text"
              class="form-control mt-3"
              placeholder="Nom complet"
              name="Nom"
            />
          </div>
          <div style="text-align: left !important;" class="mt-2">
            <label style="font-size: 0.7em;">Type de compte</label>
            <select name="type" class="form-control mt-2">
                <option>Commerciale</option>
                <option>Mangasinier</option>
                <option>Caissier(e)</option>
            </select>
          </div>
          <div>
            <input
              type="text"
              class="form-control mt-3"
              placeholder="Adresse e-mail"
              name="email"
            />
          </div>
          <div>
            <input
              type="password"
              class="form-control mt-3"
              name="password"
              placeholder="Mot de passe"
            />
          </div>
          <div>
            <button class="btn btn-primary btn-sm p-2 mt-3" name="btn">
              <i class="fa fa-check-square"></i> Creer mon compte
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
