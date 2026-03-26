<?php
  function getAllInscription()
  {
    $inscriptions = selectInscription(); // modèle
    include("vues/vue_inscription.php");
  }

  function getOneInscription()
  {
    $id = $_GET["id"];
    $inscription = selectInscriptionById($id); // modèle
    include("vues/vue_inscription.php");
  }

  function addInscription()
  {
    $nom_participant    = $_POST["nom_participant"];
    $prenom_participant = $_POST["prenom_participant"];
    $email              = $_POST["email"];
    $lieu               = $_POST["lieu"];
    $date_inscription   = $_POST["date_inscription"];
    $id_activite        = $_POST["id_activite"];
    insertInscripation($nom_participant, $prenom_participant, $email, $lieu, $date_inscription, $id_activite); // modèle
  }
?>