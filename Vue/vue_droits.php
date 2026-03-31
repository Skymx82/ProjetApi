<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions légales - Pharmacie GSB</title>
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

    <div class="droits-container">
        <h1 class="page-title">Mentions légales</h1>

        <div class="droits-section">
            <h2 class="droits-subtitle">Éditeur du site</h2>
            <p class="droits-text">
                Ce site est édité dans le cadre d'un projet pédagogique BTS SIO — Pharmacie GSB.<br>
                Il n'a pas de vocation commerciale.
            </p>
        </div>

        <div class="droits-section">
            <h2 class="droits-subtitle">Droits des images</h2>
            <p class="droits-text">
                Les images utilisées sur ce site proviennent de <strong>Wikimedia Commons</strong>
                et sont soumises aux licences indiquées ci-dessous.
            </p>

            <div class="table-wrapper">
                <table class="droits-table">
                    <thead>
                        <tr>
                            <th>Médicament</th>
                            <th>Source</th>
                            <th>Licence</th>
                            <th>Type de licence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="med-badge">💊</span>
                                Paracétamol
                            </td>
                            <td>Wikimedia Commons</td>
                            <td>
                                <span class="licence-badge licence-cc-sa">CC BY-SA 4.0</span>
                            </td>
                            <td>Creative Commons Attribution-Share Alike 4.0</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="med-badge">💊</span>
                                Ibuprofène
                            </td>
                            <td>Wikimedia Commons</td>
                            <td>
                                <span class="licence-badge licence-cc-sa">CC BY-SA 4.0</span>
                            </td>
                            <td>Creative Commons Attribution-Share Alike 4.0</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="med-badge">💊</span>
                                Amoxicilline
                            </td>
                            <td>Wikimedia Commons</td>
                            <td>
                                <span class="licence-badge licence-cc">CC BY 4.0</span>
                            </td>
                            <td>Creative Commons Attribution 4.0</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="med-badge">💊</span>
                                Oméprazole
                            </td>
                            <td>Wikimedia Commons</td>
                            <td>
                                <span class="licence-badge licence-pd">Domaine public</span>
                            </td>
                            <td>Public Domain — aucune restriction d'utilisation</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="med-badge">💊</span>
                                Aspirine
                            </td>
                            <td>Wikimedia Commons</td>
                            <td>
                                <span class="licence-badge licence-cc-sa">CC BY-SA 4.0</span>
                            </td>
                            <td>Creative Commons Attribution-Share Alike 4.0</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="licences-legend">
                <h3 class="legend-title">Explication des licences</h3>
                <div class="legend-grid">
                    <div class="legend-item">
                        <span class="licence-badge licence-cc-sa">CC BY-SA 4.0</span>
                        <p>Vous pouvez partager et adapter l'image, à condition de créditer l'auteur et de redistribuer sous la même licence.</p>
                    </div>
                    <div class="legend-item">
                        <span class="licence-badge licence-cc">CC BY 4.0</span>
                        <p>Vous pouvez partager et adapter l'image librement, à condition de créditer l'auteur.</p>
                    </div>
                    <div class="legend-item">
                        <span class="licence-badge licence-pd">Domaine public</span>
                        <p>L'image est libre de droits, aucune restriction d'utilisation ou de redistribution.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>
</body>
</html>