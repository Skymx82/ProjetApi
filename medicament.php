<!-- Cette page va gérer les interactions avec la bd pour les médicaments -->
<?php
	// Connection à la bd
	include("connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	// Orientation méthode
	$action = isset($_GET['action']) ? $_GET['action'] : '';

	switch($action)
	{
		case 'medicaments':
			if(!empty($_GET["id"]))
			{
				$id = intval($_GET["id"]);
				getMedicament($id);
			}
			else
			{
				getMedicament();
			}
			break;

		case 'effets_secondaires':
			getMedicamentEffetSecondaire();
			break;

		case 'effets_therapeutiques':
			getMedicamentEffetTherapeutique();
			break;

		case 'interactions':
			getMedicamentInteraction();
			break;

		default:
			echo json_encode(["message" => "Action invalide"]);
			break;
	}

	function getMedicament($id = null)
	{
		global $conn;

		if($id)
		{
			$query = "SELECT * FROM medicament WHERE id = $id";
		}
		else
		{
			$query = "SELECT * FROM medicament";
		}

		$response = array();
		$conn->query("SET NAMES utf8");
		$result = $conn->query($query);

		while ($row = $result->fetch())
		{
			$response[] = $row;
		}

		$result->closeCursor();
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}

	// Fonction pour récupérer  les effets secondaires
	function getMedicamentEffetSecondaire($id = null)
	{
		global $conn;

		if($id)
		{
			$query = "SELECT * FROM effet_secondaires WHERE id = $id";
		}
		else
		{
			$query = "SELECT * FROM effet_secondaires";
		}

		$response = array();
		$conn->query("SET NAMES utf8");
		$result = $conn->query($query);

		while ($row = $result->fetch())
		{
			$response[] = $row;
		}

		$result->closeCursor();
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}

	// Fonction pour récupérer  les effets thérapeutiques
	function getMedicamentEffetTherapeutique()
	{
		global $conn;

		if($id)
		{
			$query = "SELECT * FROM effet_therapeutique WHERE id = $id";
		}
		else
		{
			$query = "SELECT * FROM effet_therapeutique";
		}

		$response = array();
		$conn->query("SET NAMES utf8");
		$result = $conn->query($query);

		while ($row = $result->fetch())
		{
			$response[] = $row;
		}

		$result->closeCursor();
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}

	// Fonction pour récupérer  les interactions
	function getMedicamentInteraction()
	{
		global $conn;

		if($id)
		{
			$query = "SELECT * FROM interaction WHERE id = $id";
		}
		else
		{
			$query = "SELECT * FROM interaction";
		}

		$response = array();
		$conn->query("SET NAMES utf8");
		$result = $conn->query($query);

		while ($row = $result->fetch())
		{
			$response[] = $row;
		}

		$result->closeCursor();
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}