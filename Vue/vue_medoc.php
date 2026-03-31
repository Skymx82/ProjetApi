<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicaments - Pharmacie GSB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Vue/style.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color:#1a6b4a;">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="index.php">Pharmacie GSB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php?page=medoc">Médicaments</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=activite">Activités</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4 flex-grow-1">
        <h1 class="text-center fw-bold mb-4">Nos médicaments</h1>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        <?php
        $string_decode = $medicament ?? [];

        if (empty($string_decode)) {
            echo '<p class="text-center text-muted py-5">Aucun médicament disponible.</p>';
        } else {
            for ($i = 0; $i < count($string_decode); $i++) {
                $med         = $string_decode[$i];
                $nom         = htmlspecialchars($med["nom"]);
                $description = htmlspecialchars($med["description"]);
                $famille     = htmlspecialchars($med["famille"]);
                $image       = htmlspecialchars($med["image"]);
                $id          = htmlspecialchars($med["id_medicament"]);
                echo '
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        ' . ($image
                            ? '<img src="' . $image . '" class="card-img-top" alt="' . $nom . '" style="height:180px;object-fit:cover;">'
                            : '<div class="card-img-top gsb-img-placeholder d-flex align-items-center justify-content-center" style="height:180px;font-size:3rem;">💊</div>'
                        ) . '
                        <div class="card-body d-flex flex-column">
                            <span class="gsb-badge mb-2 align-self-start">' . $famille . '</span>
                            <h5 class="card-title">' . $nom . '</h5>
                            <p class="card-text text-muted small flex-grow-1">' . $description . '</p>
                            <form action="index.php" method="GET" class="mt-2">
                                <input type="hidden" name="page" value="medoc_id">
                                <input type="hidden" name="id" value="' . $id . '">
                                <button class="btn btn-success w-100" type="submit">Voir le détail</button>
                            </form>
                        </div>
                    </div>
                </div>';
            }
        }
        ?>
        </div>
    </main>

    <footer class="text-white text-center py-3 mt-4" style="background-color:#1a6b4a;">
        <p class="mb-0">&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
