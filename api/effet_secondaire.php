<?php
    // Connexion à la BD
    include("db_connect.php");
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch($request_method)
    {
      case 'GET':
        if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                getEffetSecon($id);
            } 
            break;
    }

    function getEffetSecon($id = null)
    {
        global $conn;

        if ($id) {
            $query = "SELECT * FROM EFFET_SECONDAIRE WHERE id_medicament = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([':id' => $id]);
        } else {
            $query = "SELECT * FROM EFFET_SECONDAIRE ORDER BY nom";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }

        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

?>