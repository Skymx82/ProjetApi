<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Pharmacie GSB</title>
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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=medoc">Médicaments</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=activite">Activités</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4 flex-grow-1">

        <div class="p-5 rounded-3 text-white mb-4" style="background:linear-gradient(135deg,#1a6b4a 0%,#2e9e6d 100%);">
            <h2 class="fw-bold">Bienvenue à la Pharmacie GSB</h2>
            <p class="mb-0 opacity-90">
                Votre santé est notre priorité. Depuis de nombreuses années, la Pharmacie GSB accompagne
                ses patients avec professionnalisme, écoute et bienveillance. Notre équipe de pharmaciens
                et préparateurs qualifiés est à votre disposition pour vous conseiller et vous orienter
                vers les meilleures solutions de santé.
            </p>
        </div>

        <h2 class="ps-2 mb-3 fs-5 fw-semibold" style="border-left:4px solid #1a6b4a;">Nos Services</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
            <div class="col">
                <div class="card h-100 gsb-card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">💊 Médicaments</h5>
                        <p class="card-text text-muted small">Nous disposons d'un large stock de médicaments sur ordonnance et sans ordonnance. Nos pharmaciens vérifient chaque prescription avec rigueur.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 gsb-card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🩺 Conseils & Accompagnement</h5>
                        <p class="card-text text-muted small">Nos équipes sont formées pour vous accompagner dans la gestion de vos traitements et répondre à toutes vos questions.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 gsb-card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🌿 Parapharmacie & Bien-être</h5>
                        <p class="card-text text-muted small">Découvrez notre sélection de produits de parapharmacie : soins de la peau, compléments alimentaires et produits naturels.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 gsb-card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">📋 Suivi des Activités</h5>
                        <p class="card-text text-muted small">Consultez l'ensemble des activités et événements : campagnes de dépistage, ateliers santé et séances d'information.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm p-4">
            <h2 class="ps-2 mb-3 fs-5 fw-semibold" style="border-left:4px solid #1a6b4a;">Informations Pratiques</h2>
            <p class="mb-1"><strong>📍 Adresse :</strong> 12 Rue de la Santé, 75000 Paris</p>
            <p class="mb-1"><strong>📞 Téléphone :</strong> 01 23 45 67 89</p>
            <p class="mb-0"><strong>🕐 Horaires :</strong> Lundi – Vendredi : 8h30 – 19h30 | Samedi : 9h – 18h</p>
        </div>

    </main>

    <footer class="text-white text-center py-3 mt-4" style="background-color:#1a6b4a;">
        <p class="mb-1">&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
        <a href="forme_juridique.php" class="text-white-50 small">Mentions légales</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
