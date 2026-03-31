<?php
  function selectMedoc()
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/api/medicament.php";
    $options = array(
      'http' =>array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $medicament = file_get_contents($url, false, $context);
     return json_decode($medicament, true); // ✅ Convertit le JSON en tableau PHP
  }

  // Retourne un seul médicament par id
  function selectMedocById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/api/medicament.php?id=" . $id;
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $medicament = file_get_contents($url, false, $context);
     return json_decode($medicament, true); // ✅ Convertit le JSON en tableau PHP
  }

  // Retourne toutes les activites
  function selectActivite()
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/api/Activites.php";
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $activites = file_get_contents($url, false, $context);
    return $activites;
  }

  // Retourne une seule activité par id
  function selectActiviteById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/api/Activites.php?id=" . $id;
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $activite = file_get_contents($url, false, $context);
    return $activite;
  }

  function selectIncription()
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/api/inscription.php";
    $options = array(
      'http' =>array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $inscriptions = file_get_contents($url, false, $context);
    return $inscriptions;
  }

  // Retourne les effets thérapeutiques par id de médicament
  function selectEffetTherapeutiqueById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/api/effet_therapeutique.php?id=" . $id;
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $effets = file_get_contents($url, false, $context);
    return $effets;
  }

  // Retourne les effets secondaires par id de médicament
  function selectEffetSecondaireById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/api/effet_secondaire.php?id=" . $id;
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $effets = file_get_contents($url, false, $context);
    return $effets;
  }

  // Retourne les interactions par id de médicament
  function selectInteractionById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/api/interaction.php?id=" . $id;
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $interactions = file_get_contents($url, false, $context);
    return $interactions;
  }

  function insertInscription($nom, $prenom, $mail, $ville)
  {
    $url = 'http://127.0.0.1/ProjetApi/ProjetApi/api/inscription.php';
    $data = array('nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'ville' => $ville);

    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
      )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
  }

?>
