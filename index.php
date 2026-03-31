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

$page = isset($_GET["page"]) ? $_GET["page"] : "accueil";

if ($page == "medoc") {
    getAllMedoc();
} elseif ($page == "activite") {
    getAllActivite();
} elseif($page == "activite_id"){
    getOneActivite();
}elseif($page == "medoc_id"){
    getOneMedoc();
}else {
    Acceuil();
}
?>