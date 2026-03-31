<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités - Pharmacie GSB</title>
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
                    <li class="nav-item"><a class="nav-link" href="index.php?page=medoc">Médicaments</a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php?page=activite">Activités</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=droits">Mentions légales</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4 flex-grow-1">
        <h1 class="text-center fw-bold mb-4">Nos activités</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php
        $liste = is_array($activites) ? $activites : json_decode($activites, true);
        if ($liste && count($liste) > 0) {
            foreach ($liste as $act) {
                $nom         = htmlspecialchars($act['nom']);
                $description = htmlspecialchars($act['description']);
                $lieu        = htmlspecialchars($act['lieu']);
                $places      = htmlspecialchars($act['nb_places_max']);
                $id          = htmlspecialchars($act['id_activite']);
                $date        = (new DateTime($act['date_activite']))->format('d/m/Y');
                echo '
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-top gsb-img-placeholder d-flex align-items-center justify-content-center" style="height:140px;font-size:3rem;">🏃</div>
                        <div class="card-body d-flex flex-column">
                            <span class="gsb-badge mb-2 align-self-start">' . $lieu . '</span>
                            <h5 class="card-title">' . $nom . '</h5>
                            <p class="card-text text-muted small flex-grow-1">' . $description . '</p>
                            <p class="mb-1 small">📅 ' . $date . '</p>
                            <p class="mb-3 small">🪑 Places disponibles : ' . $places . '</p>
                            <form action="index.php" method="GET">
                                <input type="hidden" name="page" value="activite_id">
                                <input type="hidden" name="id" value="' . $id . '">
                                <button class="btn btn-success w-100" type="submit">S\'inscrire</button>
                            </form>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<p class="text-center text-muted py-5">Aucune activité disponible.</p>';
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
