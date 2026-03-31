<?php
    // Connexion à la BD
    include("connect.php");
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch($request_method)
    {
      case 'GET':
        if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getEffetThera($id);
            } 
            break;
    }

    function getEffetThera($id = null)
    {
        global $conn;

        if ($id) {
            $query = "SELECT * FROM EFFET_THERAPEUTIQUE WHERE id_medicament = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':id' => $id]);
        } else {
            $query = "SELECT * FROM EFFET_THERAPEUTIQUE ORDER BY nom";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }

        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

?>