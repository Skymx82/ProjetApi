<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $data = json_decode($medicament, true)[0]; ?>
    <title><?= htmlspecialchars($data['nom']) ?> - Pharmacie GSB</title>
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
                <li><a href="index.php?page=droits">Mentions légales</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <a href="index.php?page=medoc" class="btn-retour">← Retour aux médicaments</a>

        <div class="detail-container">

            <div class="detail-image-col">
                <?php if (!empty($data['image'])): ?>
                    <img class="detail-image"
                         src="<?= htmlspecialchars($data['image']) ?>"
                         alt="<?= htmlspecialchars($data['nom']) ?>">
                <?php else: ?>
                    <div class="card-image-placeholder" style="height:120px;font-size:60px;">💊</div>
                <?php endif; ?>
            </div>

            <div class="detail-info-col">
                <span class="card-famille"><?= htmlspecialchars($data['famille']) ?></span>
                <h2 class="detail-nom"><?= htmlspecialchars($data['nom']) ?></h2>
                <p class="detail-description"><?= htmlspecialchars($data['description']) ?></p>
            </div>

        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>
</body>
</html>