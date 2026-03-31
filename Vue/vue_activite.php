<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités - Pharmacie GSB</title>
    <link rel="stylesheet" href="Vue/style.css">
</head>
<body>
    <header>
        <h1>Pharmacie GSB</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?page=activite">Activités</a></li>
                <li><a href="index.php?page=medoc">Médicament</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="page-title">Nos activités</h1>

    <div class="cards-container">
        <?php
        class Card {
            public function __construct(
                private string $nom,
                private string $description,
                private \DateTime $date,
                private string $lieu,
                private string $nb_place_max
            ){}

            public function render(): string {
                return "
                    <div class='card'>
                        <div class='card-image-placeholder'>🏃</div>
                        <div class='card-body'>
                            <span class='card-famille'>" . htmlspecialchars($this->lieu) . "</span>
                            <div class='card-nom'>" . htmlspecialchars($this->nom) . "</div>
                            <div class='card-description'>" . htmlspecialchars($this->description) . "</div>
                            <div class='card-date'>📅 " . $this->date->format('d/m/Y') . "</div>
                            <div class='card-places'>🪑 Places disponibles : " . htmlspecialchars($this->nb_place_max) . "</div>
                            <div class='card-actions'>
                                <button class='btn btn-selectionner'>S'inscrire</button>
                            </div>
                        </div>
                    </div>
                ";
            }
        }

        $liste = is_array($activites) ? $activites : json_decode($activites, true);
        if ($liste && count($liste) > 0) {
            foreach ($liste as $activite) {
                $card = new Card(
                    $activite['nom'],
                    $activite['description'],
                    new DateTime($activite['date_activite']),
                    $activite['lieu'],
                    (string)$activite['nb_places_max']
                );
                echo $card->render();
            }
        } else {
            echo "<p style='text-align:center;color:#718096;'>Aucune activité disponible.</p>";
        }
        ?>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>
</body>
</html>