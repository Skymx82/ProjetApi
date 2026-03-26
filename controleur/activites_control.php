<?php
  function getAllActivite()
  {
    $activites = selectActivite(); // modèle
    include("vues/vue_activite.php");
  }

  function getOneActivite()
  {
    $id = $_GET["id"];
    $activite = selectActiviteById($id); // modèle
    include("vues/vue_activite.php");
  }
?>