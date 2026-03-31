<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($activite['nom']) ?></title>
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
    <a href="/?page=activite">← Retour à la liste</a>

    <h1><?= htmlspecialchars($activite['nom']) ?></h1>
    <p><strong>Description :</strong> <?= htmlspecialchars($activite['description']) ?></p>
    <p><strong>Lieu :</strong>    <?= htmlspecialchars($activite['lieu']) ?></p>
    <p><strong>Nombre de place :</strong> <?= htmlspecialchars($activite['nb_places_max']) ?></p>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>
</body>
</html>
