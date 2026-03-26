<?php
  function selectMedoc()
  {
    $url = "http://127.0.0.1/PROJETApi/api/medicament";    
    $options = array(
      'http' =>array(
      'header' => "Content_type: application/x-www-form-urlencoded\r\n",
      'method' => 'GET')
    );
    $context = stream_context_create($options);
    $medicaments = file_get_contents($url, false, $context);
    $medicaments=substr($medicaments,1); // pour supprimer le '/' du début json
    return $medicaments ;

  }
?>
