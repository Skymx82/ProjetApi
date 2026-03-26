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
    $medicaments = file_get_contents($url, false, $context);
    return $medicaments;
  }

  // Retourne une seul activités par id
  function selectMedocById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/medicament?id=" . $id;    
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $medicament = file_get_contents($url, false, $context);
    $medicament = substr($medicament, 1); // pour supprimer le '/' du début json
    return $medicament;
  }

  // Retourne toutes les activites
  function selectActivite()
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/Activites";    
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $activites = file_get_contents($url, false, $context);
    $activites = substr($activites, 1); // pour supprimer le '/' du début json
    return $activites;
  }

  // Retourne une seul activités par id
  function selectActiviteById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/Activites?id=" . $id;    
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $activite = file_get_contents($url, false, $context);
    $activite = substr($activite, 1); // pour supprimer le '/' du début json
    return $activite;
  }

  function selectIncription()
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/inscription.php";    
    $options = array(
      'http' =>array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $inscriptions = file_get_contents($url, false, $context);
    $inscriptions=substr($inscriptions,1);
    return $inscriptions ;

  }

  // Retourne les effets thérapeutiques par id de médicament
  function selectEffetTherapeutiqueById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/effet_therapeutique.php?id=" . $id;
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $effets = file_get_contents($url, false, $context);
    $effets = substr($effets, 1); // pour supprimer le '/' du début json
    return $effets;
  }

  // Retourne les effets secondaires par id de médicament
  function selectEffetSecondaireById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/effet_secondaire.php?id=" . $id;
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $effets = file_get_contents($url, false, $context);
    $effets = substr($effets, 1); // pour supprimer le '/' du début json
    return $effets;
  }

  // Retourne les interactions par id de médicament
  function selectInteractionById($id)
  {
    $url = "http://127.0.0.1/ProjetApi/ProjetApi/interaction.php?id=" . $id;
    $options = array(
      'http' => array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $interactions = file_get_contents($url, false, $context);
    $interactions = substr($interactions, 1); // pour supprimer le '/' du début json
    return $interactions;
  }

  function insertInscription($nom, $prenom, $mail, $ville)
  {
    $url = 'http://127.0.0.1/ProjetApi/ProjetApi/inscription.php';
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