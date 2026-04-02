<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions légales - Pharmacie GSB</title>
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
                    <li class="nav-item"><a class="nav-link" href="index.php?page=activite">Activités</a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php?page=droits">Mentions légales</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4 flex-grow-1">
        <div class="mx-auto" style="max-width:860px;">

            <h1 class="fw-bold mb-4">Mentions légales</h1>

            <!-- Éditeur -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="fs-5 fw-semibold mb-3" style="border-left:4px solid #1a6b4a; padding-left:.6rem;">Éditeur du site</h2>
                    <p class="text-muted mb-0">
                        Ce site est édité dans le cadre d'un projet pédagogique BTS SIO — Pharmacie GSB.<br>
                        Il n'a pas de vocation commerciale.
                    </p>
                </div>
            </div>

            <!-- Droits des images -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="fs-5 fw-semibold mb-3" style="border-left:4px solid #1a6b4a; padding-left:.6rem;">Droits des images</h2>
                    <p class="text-muted mb-3">
                        Les images utilisées sur ce site proviennent de <strong>Pexels.com</strong>
                        et sont soumises aux licences indiquées ci-dessous.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background-color:#1a6b4a; color:#fff;">
                                <tr>
                                    <th>Médicament</th>
                                    <th>Source</th>
                                    <th>Licence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>💊 Paracétamol</td>
                                    <td>Pexels.com</td>
                                    <span class="badge rounded-pill px-3 py-2 mb-2" style="background-color:#d4edda;color:#155724;">Domaine public</span>
                                    <td class="text-muted small">Image libre de droits, aucune restriction d'utilisation ou de redistribution.</td>
                                </tr>
                                <tr>
                                    <td>💊 Ibuprofène</td>
                                    <td>Pexels.com</td>
                                    <span class="badge rounded-pill px-3 py-2 mb-2" style="background-color:#d4edda;color:#155724;">Domaine public</span>
                                    <td class="text-muted small">Image libre de droits, aucune restriction d'utilisation ou de redistribution.</td>
                                </tr>
                                <tr>
                                    <td>💊 Amoxicilline</td>
                                    <td>Pexels.com</td>
                                    <span class="badge rounded-pill px-3 py-2 mb-2" style="background-color:#d4edda;color:#155724;">Domaine public</span>
                                    <td class="text-muted small">Image libre de droits, aucune restriction d'utilisation ou de redistribution.</td>
                                </tr>
                                <tr>
                                    <td>💊 Oméprazole</td>
                                    <td>Pexels.com</td>
                                    <span class="badge rounded-pill px-3 py-2 mb-2" style="background-color:#d4edda;color:#155724;">Domaine public</span>
                                    <td class="text-muted small">Image libre de droits, aucune restriction d'utilisation ou de redistribution.</td>
                                </tr>
                                <tr>
                                    <td>💊 Aspirine</td>
                                    <td>Pexels.com</td>
                                    <span class="badge rounded-pill px-3 py-2 mb-2" style="background-color:#d4edda;color:#155724;">Domaine public</span>
                                    <td class="text-muted small">Image libre de droits, aucune restriction d'utilisation ou de redistribution.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Légende licences -->
                    <div class="rounded p-4 mt-4" style="background-color:#f4f7f9;">
                        <h3 class="fs-6 fw-bold mb-3">Explication des licences</h3>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <span class="badge rounded-pill px-3 py-2 mb-2" style="background-color:#d4edda;color:#155724;">Domaine public</span>
                                <p class="text-muted small mb-0">Image libre de droits, aucune restriction d'utilisation ou de redistribution.</p>
                            </div>
                        </div>
                    </div>

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
