<?php
    // Connexion à la BD
    include("db_connect.php");
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch($request_method)
    { 
        case 'POST' :
            addInscription();
            break;
        

        case 'GET' :
            if(!empty($_GET["id"]))
            {
                $id=intval($_GET["id"]);
                getInscription($id);
            }
            else{
                getInscription();
            }
            break;
        }

function addInscription()
    {
        global $conn;

        // Récupération et vérification des champs obligatoires
        $nom_participant    = $_POST["nom_participant"]    ?? '';
        $prenom_participant = $_POST["prenom_participant"] ?? '';
        $email              = $_POST["email"]              ?? '';
        $lieu               = $_POST["lieu"]               ?? '';
        $date_inscription   = $_POST["date_inscription"]   ?? '';
        $id_activite        = isset($_POST["id_activite"]) ? intval($_POST["id_activite"]) : 0;

        // Vérification des champs obligatoires
        if (empty($nom_participant) || empty($prenom_participant) || empty($email) || empty($id_activite)) {
            echo json_encode([
                'status'         => 0,
                'status_message' => 'Champs obligatoires manquants : nom, prénom, email, id_activite'
            ]);
            return;
        }

        // Vérifier que l'activité existe et récupérer nb_places_max
        $checkQuery = "SELECT id_activite, nb_places_max FROM ACTIVITE WHERE id_activite = :id";
        $checkStmt  = $conn->prepare($checkQuery);
        $checkStmt->execute([':id' => $id_activite]);
        $activite = $checkStmt->fetch(PDO::FETCH_ASSOC);

        if (!$activite) {
            echo json_encode([
                'status'         => 0,
                'status_message' => 'Activité introuvable'
            ]);
            return;
        }

        // Vérifier qu'il reste des places
        if ($activite['nb_places_max'] <= 0) {
            echo json_encode([
                'status'         => 0,
                'status_message' => 'Plus de places disponibles pour cette activité.'
            ]);
            return;
        }

        // Insertion avec requête préparée (sécurisé contre les injections SQL)
        $query = "INSERT INTO INSCRIPTION
                    (nom_participant, prenom_participant, email, lieu, date_inscription, id_activite)
                  VALUES
                    (:nom, :prenom, :email, :lieu, :date_inscription, :id_activite)";

        $stmt = $conn->prepare($query);
        $success = $stmt->execute([
            ':nom'            => $nom_participant,
            ':prenom'         => $prenom_participant,
            ':email'          => $email,
            ':lieu'           => $lieu,
            ':date_inscription' => $date_inscription ?: date('Y-m-d'),
            ':id_activite'    => $id_activite
        ]);

        if ($success) {
            // Décrémenter nb_places_max dans ACTIVITE
            $updateQuery = "UPDATE ACTIVITE SET nb_places_max = nb_places_max - 1 WHERE id_activite = :id";
            $updateStmt  = $conn->prepare($updateQuery);
            $updateStmt->execute([':id' => $id_activite]);

            echo json_encode([
                'status'         => 1,
                'status_message' => 'Vous êtes bien inscrit.',
                'id_inscription' => $conn->lastInsertId(),
                'places_restantes' => $activite['nb_places_max'] - 1
            ]);
        }
         else {
            echo json_encode([
                'status'         => 0,
                'status_message' => 'Erreur lors de l\'inscription.'
            ]);
        }
    }

    function getInscription($id = null)
    {
        global $conn;

        if ($id) {
            $query = "SELECT * FROM INSCRIPTION WHERE id_inscrption = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':id' => $id]);
        } else {
            $query = "SELECT * FROM INSCRIPTION";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }

        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }