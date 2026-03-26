<?php
    // Connexion à la BD
    include("connect.php");
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch($request_method)
    {
      case 'GET':
        if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getMedicament($id);
            } else {
                getMedicament();
            }
            break;
    }

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
