<?php
    // Connexion à la BD
    include("connect.php");
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch($request_method)
    {
      case 'GET':
        if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getActivite($id);
            } else {
                getActivite();
            }
            break;

        default:
            echo json_encode(["message" => "Action invalide"]);
            break;
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
