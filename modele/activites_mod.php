<?php

// Retourne toutes les activites
  function selectActivite()
  {
    $url = "http://127.0.0.1/PROJETApi/ProjetApi/Activites";    
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
    $url = "http://127.0.0.1/PROJETApi/ProjetApi/Activites?id=" . $id;    
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
?>