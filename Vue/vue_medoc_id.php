<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($medicament["nom"], 'UTF-8') ?> - Pharmacie GSB</title>
    <link rel="stylesheet" href="Vue/style.css">
</head>
<body>
    <header>
        <h1>Pharmacie GSB</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?page=medoc">Médicaments</a></li>
                <li><a href="index.php?page=activite">Activités</a></li>
            </ul>
        </nav>
    </header>

    <?php
        $nom         = htmlspecialchars($medicament["nom"], 'UTF-8');
        $description = htmlspecialchars($medicament["description"], 'UTF-8');
        $famille     = htmlspecialchars($medicament["famille"], 'UTF-8');
        $image       = htmlspecialchars($medicament["image"], 'UTF-8');
        $id          = (int)$medicament["id_medicament"];
    ?>

    <a class="btn-retour" href="index.php?page=medoc">← Retour aux médicaments</a>

    <div class="detail-container">

        <div class="detail-image-col">
            <?php if ($image): ?>
                <img class="detail-image" src="<?= $image ?>" alt="<?= $nom ?>">
            <?php else: ?>
                <div class="card-image-placeholder">💊</div>
            <?php endif; ?>
        </div>

        <div class="detail-info-col">
            <span class="card-famille"><?= $famille ?></span>
            <h2 class="detail-nom"><?= $nom ?></h2>
            <p class="detail-description"><?= $description ?></p>
        </div>

    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>
</body>
</html>