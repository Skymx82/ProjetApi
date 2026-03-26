<?php

  // ============================================================
  // ACTIVITES
  // ============================================================
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

  // ============================================================
  // INSCRIPTIONS
  // ============================================================
  function getAllInscription()
  {
    $inscriptions = selectInscription(); // modèle
    include("vues/vue_inscription.php");
  }

  function addInscription()
  {
    $nom    = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail   = $_POST["mail"];
    $ville  = $_POST["ville"];
    insertInscription($nom, $prenom, $mail, $ville); // modèle
  }

  // ============================================================
  // MEDICAMENTS
  // ============================================================
  function getAllMedoc()
  {
    $medicaments = selectMedoc(); // modèle
    include("vues/vue_medoc.php");
  }

?>