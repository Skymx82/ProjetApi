<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $data = json_decode($activite, true)[0]; ?>
    <title><?= htmlspecialchars($data['nom']) ?></title>
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

    <main>
        <a href="index.php?page=activite" class="btn-retour">← Retour à la liste</a>

        <div class="detail-card">
            <div class="card-image-placeholder" style="height:120px;font-size:60px;">🏃</div>
            <div class="card-body">
                <span class="card-famille"><?= htmlspecialchars($data['lieu']) ?></span>
                <div class="card-nom"><?= htmlspecialchars($data['nom']) ?></div>
                <div class="card-description"><?= htmlspecialchars($data['description']) ?></div>
                <div class="card-date">📅 <?= (new DateTime($data['date_activite']))->format('d/m/Y') ?></div>
                <div class="card-places">🪑 Places disponibles : <?= htmlspecialchars($data['nb_places_max']) ?></div>
            </div>
        </div>
    </main>

    <form method="POST" action="index.php" class="inscription-form">
        <h2 class="form-title">S'inscrire à cette activité</h2>
        <input type="hidden" name="actionInscription" value="inscrire">
        <input type="hidden" name="id_activite" value="<?= $data['id_activite'] ?>">
        <div class="form-row">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
            </div>
        </div>
        <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" id="mail" name="mail" placeholder="exemple@email.com" required>
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" placeholder="Votre ville" required>
        </div>
        <button type="submit" class="btn btn-selectionner">S'inscrire</button>
    </form>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>
</body>
</html>