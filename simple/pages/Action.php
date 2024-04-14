<?php
require ('../../Connexion.php');


if (isset($_GET["action"]) && $_GET["action"] === "dell" && isset($_GET["name"])) {
  $id = $_GET["name"];
  $requete2 = $connection->query("DELETE FROM pannier WHERE id = $id");
  $resultat2 = $requete2->fetchAll(PDO::FETCH_ASSOC);
  if ($requete2) {
    header('Location: ValidCommande.php');
  }
}





?>





