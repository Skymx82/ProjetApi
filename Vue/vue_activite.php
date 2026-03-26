<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Activités</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="vue_activite.php">Activités</a></li>
                <li><a href="medicament.php">Médicament</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
          
        </section>
        <section>
            <h2>Liste des activités</h2>
            <div id="content">
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
                                <h2>{$this->nom}</h2>
                                <p>{$this->description}</p>
                                <p>{$this->date->format('d/m/Y')}</p>
                                <p>{$this->lieu}</p>
                                <p>Places disponibles : {$this->nb_place_max}</p>
                                <input type='submit' value=\"S'inscrire\" />
                            </div>
                        ";
                    }
                  }

                  // $activites vient du controller (getAllActivite)
                  $liste = json_decode($activites, true);

                  if ($liste && count($liste) > 0) {
                      foreach ($liste as $activite) {
                          $card = new Card(
                              $activite['nom'],
                              $activite['description'],
                              new DateTime($activite['date_activite']),
                              $activite['lieu'],
                              $activite['nb_place_max']
                          );
                          echo $card->render();
                      }
                  } else {
                      echo "<p>Aucune activité disponible.</p>";
                  }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> - ProjetApi</p>
    </footer>
</body>
</html>