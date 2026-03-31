<?php

  // ============================================================
  // ACTIVITES
  // ============================================================
  function getAllActivite()
  {
    $activites = selectActivite(); // modèle
    include("Vue/vue_activite.php");
  }

  function getOneActivite()
  {
    $id = $_GET["id"];
    $activite = selectActiviteById($id); // modèle
    $inscriptions = selectInscriptionByActivite($id); // modèle
    include("Vue/vue_activite_id.php");
  }

  // ============================================================
  // INSCRIPTIONS
  // ============================================================
  function getAllInscription()
  {
    $inscriptions = selectIncription(); // modèle
    include("Vue/vue_inscription.php");
  }

  function addInscription()
  {
    $nom    = $_POST["nom_participant"];
    $prenom = $_POST["prenom_participant"];
    $mail   = $_POST["email"];
    insertInscription($nom, $prenom, $mail); // modèle
  }

  // ============================================================
  // MEDICAMENTS
  // ============================================================
  function getAllMedoc()
  {
    $medicament = selectMedoc(); // modèle
    include("Vue/vue_medoc.php");
  }

  function getOneMedoc()
  {
    $id = $_GET["id"];
    $medicament = selectMedocById($id); // modèle
    include("Vue/vue_medoc.php");
  }

  // ============================================================
  // EFFETS THERAPEUTIQUES
  // ============================================================
  function getEffetTherapeutique()
  {
    $id = $_GET["id"];
    $effets = selectEffetTherapeutiqueById($id); // modèle
    include("Vue/vue_effet_therapeutique.php");
  }

  // ============================================================
  // EFFETS SECONDAIRES
  // ============================================================
  function getEffetSecondaire()
  {
    $id = $_GET["id"];
    $effets = selectEffetSecondaireById($id); // modèle
    include("Vue/vue_effet_secondaire.php");
  }

  // ============================================================
  // INTERACTIONS
  // ============================================================
  function getInteraction()
  {
    $id = $_GET["id"];
    $interactions = selectInteractionById($id); // modèle
    include("Vue/vue_interaction.php");
  }

  function acceuil(){
    include("Vue/index.php");
  }
?>