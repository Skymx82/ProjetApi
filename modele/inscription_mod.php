<?php
  function selectIncription()
  {
    $url = "http://127.0.0.1/PROJETApi/ProjetApi/inscription.php";    
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

  function insertEtu($nom, $prenom, $mail, $ville)
{
	$url = 'http://127.0.0.1/PROJETApi/ProjetApi/inscription.php';
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
	Return $result;

}

?>