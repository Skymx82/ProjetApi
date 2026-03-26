<?php
    // Connexion à la BD
    include("db_connect.php");

    header('Content-Type: application/json');
    $conn->query("SET NAMES utf8");

    // Orientation selon le paramètre action
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {

        case 'medicaments':
            if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getMedicament($id);
            } else {
                getMedicament();
            }
            break;

        case 'effets_secondaires':
            if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getMedicamentEffetSecondaire($id);
            } else {
                getMedicamentEffetSecondaire();
            }
            break;

        case 'effets_therapeutiques':
            if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getMedicamentEffetTherapeutique($id);
            } else {
                getMedicamentEffetTherapeutique();
            }
            break;

        case 'interactions':
            if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getMedicamentInteraction($id);
            } else {
                getMedicamentInteraction();
            }
            break;

        case 'activites':
            if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getActivite($id);
            } else {
                getActivite();
            }
            break;

        case 'inscription':
            addInscription();
            break;

        default:
            echo json_encode(["message" => "Action invalide"]);
            break;
    }

    // ============================================================
    // Récupérer un ou tous les médicaments
    // ============================================================
    function getMedicament($id = null)
    {
        global $conn;

        if ($id) {
            $query = "SELECT * FROM MEDICAMENT WHERE id_medicament = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':id' => $id]);
        } else {
            $query = "SELECT * FROM MEDICAMENT ORDER BY nom";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }

        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // ============================================================
    // Récupérer les effets secondaires (tous ou par médicament)
    // ============================================================
    function getMedicamentEffetSecondaire($id = null)
    {
        global $conn;

        if ($id) {
            $query = "SELECT * FROM EFFET_SECONDAIRES WHERE id_medicament = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':id' => $id]);
        } else {
            $query = "SELECT * FROM EFFET_SECONDAIRES";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }

        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // ============================================================
    // Récupérer les effets thérapeutiques (tous ou par médicament)
    // ============================================================
    function getMedicamentEffetTherapeutique($id = null)
    {
        global $conn;

        if ($id) {
            $query = "SELECT * FROM EFFET_THERAPEUTIQUE WHERE id_medicament = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':id' => $id]);
        } else {
            $query = "SELECT * FROM EFFET_THERAPEUTIQUE";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }

        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // ============================================================
    // Récupérer les interactions (toutes ou par médicament)
    // ============================================================
    function getMedicamentInteraction($id = null)
    {
        global $conn;

        if ($id) {
            $query = "SELECT * FROM INTERACTION WHERE id_medicament = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':id' => $id]);
        } else {
            $query = "SELECT * FROM INTERACTION";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }

        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // ============================================================
    // Récupérer une ou toutes les activités
    // ============================================================
    function getActivite($id = null)
    {
        global $conn;

        if ($id) {
            $query = "SELECT * FROM ACTIVITE WHERE id_activite = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':id' => $id]);
        } else {
            $query = "SELECT * FROM ACTIVITE ORDER BY date_activite";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }

        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // ============================================================
    // Ajouter une inscription à une activité
    // ============================================================
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

        // Vérifier que l'activité existe
        $checkQuery = "SELECT id_activite FROM ACTIVITE WHERE id_activite = :id";
        $checkStmt  = $conn->prepare($checkQuery);
        $checkStmt->execute([':id' => $id_activite]);
        if (!$checkStmt->fetch()) {
            echo json_encode([
                'status'         => 0,
                'status_message' => 'Activité introuvable'
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
            echo json_encode([
                'status'         => 1,
                'status_message' => 'Vous êtes bien inscrit.',
                'id_inscription' => $conn->lastInsertId()
            ]);
        } else {
            echo json_encode([
                'status'         => 0,
                'status_message' => 'Erreur lors de l\'inscription.'
            ]);
        }
    }