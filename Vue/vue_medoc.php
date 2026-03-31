<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicaments - Pharmacie GSB</title>
    <link rel="stylesheet" href="Vue/style.css">
</head>
<body>
    <header>
        <h1>Pharmacie GSB</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?page=medoc">Médicament</a></li>
                <li><a href="index.php?page=activite">Activités</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="page-title">Nos médicaments</h1>

    <div class="cards-container">
    <?php
    $string_decode = $medicament ?? [];

    if (empty($string_decode)) {
        echo '<p class="empty-state">Aucun médicament disponible.</p>';
    } else {
        for ($i = 0; $i < count($string_decode); $i++) {
            $med = $string_decode[$i];
            $nom         = htmlspecialchars($med["nom"]);
            $description = htmlspecialchars($med["description"]);
            $famille     = htmlspecialchars($med["famille"]);
            $image       = htmlspecialchars($med["image"]);
            $id          = htmlspecialchars($med["id_medicament"]);
            echo '
            <div class="card">
                ' . ($image
                    ? '<img class="card-image" src="' . $image . '" alt="' . $nom . '">'
                    : '<div class="card-image-placeholder">💊</div>'
                ) . '
                <div class="card-body">
                    <span class="card-famille">' . $famille . '</span>
                    <div class="card-nom">' . $nom . '</div>
                    <div class="card-description">' . $description . '</div>
                    <div class="card-actions">
                        <form action="index.php" method="post" style="display:contents">
                            <input type="hidden" name="id_medicament" value="' . $id . '">
                            <button class="btn btn-selectionner" name="actionMedoc" value="selectionner">Sélectionner</button>
                        </form>
                    </div>
                </div>
            </div>';
        }
    }
    ?>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>
</body>
</html>