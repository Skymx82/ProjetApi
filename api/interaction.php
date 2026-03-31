<?php
    // Connexion à la BD
    include("connect.php");
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch($request_method)
    {
      case 'GET':
        if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getInteraction($id);
            } 
            break;
    }

    function getInteraction($id = null)
    {
        global $conn;

        if ($id) {
            $query = "SELECT * FROM INTERACTION WHERE id_medicament1 = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':id' => $id]);
        } else {
            $query = "SELECT * FROM INTERACTION ORDER BY nom";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }

        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

?>