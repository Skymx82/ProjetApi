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
    $nom         = $_POST["nom_participant"];
    $prenom      = $_POST["prenom_participant"];
    $mail        = $_POST["email"];
    $id_activite = $_POST["id_activite"];
    insertInscription($nom, $prenom, $mail, $id_activite); // modèle
  }

  // ============================================================
  // MEDICAMENTS
  // ============================================================
  function getAllMedoc()
  {
    $medicament = selectMedoc(); // modèle
    include("Vue/vue_medoc.php");
  }

    // ✅ APRÈS
  function getOneMedoc()
{
  $id = (int)$_GET["id"];

  // Médicament de base
  $medResult = selectMedocById($id);
  $med = isset($medResult[0]) ? $medResult[0] : $medResult;

  // Effets thérapeutiques → tableau de libellés
  $effetsThera = json_decode(selectEffetTherapeutiqueById($id), true) ?? [];
  $med['effets_therapeutiques'] = array_column($effetsThera, 'libelle');

  // Effets secondaires → tableau de libellés
  $effetsSec = json_decode(selectEffetSecondaireById($id), true) ?? [];
  $med['effets_secondaires'] = array_column($effetsSec, 'libelle');

  // Interactions → tableau brut de l'API
  $med['interactions'] = json_decode(selectInteractionById($id), true) ?? [];

  $medicament = json_encode([$med]);
  include("Vue/vue_medoc_id.php");
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