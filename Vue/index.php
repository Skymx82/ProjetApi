<?php
  require_once "modele/modele.php"; 
  require_once "controleur/controleur.php"; 

if (isset($_POST["actionInscription"]))
{
	if ($_POST["actionInscription"]=="inscrire")
	{
		addInscription() ;

	}
}

getAllMedoc() ;
getAllInscription();
getAllActivite();
?>