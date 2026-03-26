<?php
  require_once "modele/modele.php"; 
  require_once "controleur/medicament_control.php"; 

if (isset($_POST["actionEtu"]))
{
	if ($_POST["actionEtu"]=="inscrire")
	{
		addEtu() ; //contrôleur

	}
	else
		if ($_POST["actionEtu"]=="modifier")
		{
			updEtu() ; //contrôleur
		}
		else
		{
			//cas suppr
			delEtu() ; //contrôleur
		}
}


// cas défaut : affichage de tous
getAllEtu() ; //contrôleur

?>

?>
