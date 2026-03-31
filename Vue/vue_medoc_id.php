<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $data = json_decode($medicament, true)[0]; ?>
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
                    <li class="nav-item"><a class="nav-link active" href="index.php?page=medoc">Médicaments</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=activite">Activités</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=droits">Mentions légales</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4 flex-grow-1">
        <div class="mx-auto" style="max-width:860px;">

            <a href="index.php?page=medoc" class="btn btn-outline-success btn-sm mb-4">← Retour aux médicaments</a>

            <!-- Bloc principal -->
            <div class="card shadow-sm mb-4">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-3"
                         style="background:linear-gradient(135deg,#1a6b4a,#2e9e6d); border-radius:.375rem 0 0 .375rem; min-height:200px;">
                        <?php if (!empty($data['image'])): ?>
                            <img src="<?= htmlspecialchars($data['image']) ?>"
                                 alt="<?= htmlspecialchars($data['nom']) ?>"
                                 class="img-fluid rounded"
                                 style="max-height:200px; object-fit:cover;">
                        <?php else: ?>
                            <span style="font-size:5rem;">💊</span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <span class="gsb-badge mb-2"><?= htmlspecialchars($data['famille']) ?></span>
                            <h2 class="card-title fw-bold mt-2"><?= htmlspecialchars($data['nom']) ?></h2>
                            <p class="text-muted"><?= htmlspecialchars($data['description']) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Effets thérapeutiques -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3">✅ Effets thérapeutiques</h5>
                    <?php if (!empty($data['effets_therapeutiques'])): ?>
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach ($data['effets_therapeutiques'] as $effet): ?>
                                <span class="badge rounded-pill px-3 py-2" style="background-color:#d1fae5;color:#065f46;font-size:.85rem;font-weight:500;">
                                    <?= htmlspecialchars($effet) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted fst-italic mb-0">Aucun effet thérapeutique renseigné.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Effets secondaires -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3">⚠️ Effets secondaires</h5>
                    <?php if (!empty($data['effets_secondaires'])): ?>
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach ($data['effets_secondaires'] as $effet): ?>
                                <span class="badge rounded-pill px-3 py-2" style="background-color:#fee2e2;color:#991b1b;font-size:.85rem;font-weight:500;">
                                    <?= htmlspecialchars($effet) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted fst-italic mb-0">Aucun effet secondaire renseigné.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Interactions -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3">🔁 Interactions médicamenteuses</h5>
                    <?php if (!empty($data['interactions'])): ?>
                        <div class="d-flex flex-column gap-2">
                            <?php foreach ($data['interactions'] as $inter): ?>
                                <div class="p-3 rounded" style="border-left:4px solid #f59e0b;background:#fffbeb;">
                                    <p class="mb-0 small text-secondary"><?= htmlspecialchars($inter['description']) ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted fst-italic mb-0">Aucune interaction connue.</p>
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
