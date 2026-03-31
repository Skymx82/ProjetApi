<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $data = json_decode($activite, true)[0]; ?>
    <title><?= htmlspecialchars($data['nom']) ?> - Pharmacie GSB</title>
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
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4 flex-grow-1">
        <div class="mx-auto" style="max-width:680px;">

            <a href="index.php?page=activite" class="btn btn-outline-success btn-sm mb-3">← Retour à la liste</a>

            <!-- Détail activité -->
            <div class="card shadow-sm mb-4">
                <div class="gsb-img-placeholder d-flex align-items-center justify-content-center" style="height:130px;font-size:4rem;">🏃</div>
                <div class="card-body">
                    <span class="gsb-badge mb-2"><?= htmlspecialchars($data['lieu']) ?></span>
                    <h3 class="card-title fw-bold"><?= htmlspecialchars($data['nom']) ?></h3>
                    <p class="text-muted"><?= htmlspecialchars($data['description']) ?></p>
                    <p class="mb-1 small">📅 <?= (new DateTime($data['date_activite']))->format('d/m/Y') ?></p>
                    <p class="mb-0 small">🪑 Places disponibles : <?= htmlspecialchars($data['nb_places_max']) ?></p>
                </div>
            </div>

            <!-- Formulaire inscription -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="ps-2 mb-3 fw-semibold" style="border-left:4px solid #1a6b4a;">S'inscrire à cette activité</h5>
                    <form method="POST" action="index.php">
                        <input type="hidden" name="actionInscription" value="inscrire">
                        <input type="hidden" name="id_activite" value="<?= $data['id_activite'] ?>">
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nom_participant" class="form-label">Nom</label>
                                <input type="text" id="nom_participant" name="nom_participant" class="form-control" placeholder="Votre nom" required>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom_participant" class="form-label">Prénom</label>
                                <input type="text" id="prenom_participant" name="prenom_participant" class="form-control" placeholder="Votre prénom" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="exemple@email.com" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">S'inscrire</button>
                    </form>
                </div>
            </div>

            <!-- Tableau inscrits -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="ps-2 mb-3 fw-semibold" style="border-left:4px solid #1a6b4a;">Personnes inscrites</h5>
                    <?php if (empty($inscriptions)) : ?>
                        <p class="text-muted text-center py-3">Aucune inscription pour le moment.</p>
                    <?php else : ?>
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="gsb-thead">
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($inscriptions as $ins) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($ins['nom_participant']) ?></td>
                                    <td><?= htmlspecialchars($ins['prenom_participant']) ?></td>
                                    <td><?= htmlspecialchars($ins['email']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </main>

    <footer class="text-white text-center py-3 mt-4" style="background-color:#1a6b4a;">
        <p class="mb-0">&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
