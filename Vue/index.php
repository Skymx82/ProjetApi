<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Pharmacie GSB</title>
    <link rel="stylesheet" href="style.css">
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

        <!-- Section héro / présentation -->
        <section id="hero">
            <h2>Bienvenue à la Pharmacie GSB</h2>
            <p>
                Votre santé est notre priorité. Depuis de nombreuses années, la Pharmacie GSB accompagne 
                ses patients avec professionnalisme, écoute et bienveillance. Notre équipe de pharmaciens 
                et préparateurs qualifiés est à votre disposition pour vous conseiller et vous orienter 
                vers les meilleures solutions de santé.
            </p>
        </section>

        <!-- Section services -->
        <section id="services">
            <h2>Nos Services</h2>
            <div id="services-grid">

                <div class="service-card">
                    <h3>💊 Médicaments</h3>
                    <p>
                        Nous disposons d'un large stock de médicaments sur ordonnance et sans ordonnance. 
                        Nos pharmaciens vérifient chaque prescription avec rigueur pour garantir votre sécurité.
                    </p>
                </div>

                <div class="service-card">
                    <h3>🩺 Conseils & Accompagnement</h3>
                    <p>
                        Nos équipes sont formées pour vous accompagner dans la gestion de vos traitements 
                        et répondre à toutes vos questions sur votre santé au quotidien.
                    </p>
                </div>

                <div class="service-card">
                    <h3>🌿 Parapharmacie & Bien-être</h3>
                    <p>
                        Découvrez notre sélection de produits de parapharmacie : soins de la peau, 
                        compléments alimentaires, aromathérapie et produits naturels pour prendre soin de vous.
                    </p>
                </div>

                <div class="service-card">
                    <h3>📋 Suivi des Activités</h3>
                    <p>
                        Consultez l'ensemble des activités et événements organisés par notre pharmacie, 
                        comme des campagnes de dépistage, des ateliers santé et des séances d'information.
                    </p>
                </div>

            </div>
        </section>

        <!-- Section informations pratiques -->
        <section id="infos">
            <h2>Informations Pratiques</h2>
            <div id="content">
                <p><strong>📍 Adresse :</strong> 12 Rue de la Santé, 75000 Paris</p>
                <p><strong>📞 Téléphone :</strong> 01 23 45 67 89</p>
                <p><strong>🕐 Horaires :</strong> Lundi – Vendredi : 8h30 – 19h30 | Samedi : 9h – 18h</p>
                <?php
                    // Vous pouvez afficher ici des informations dynamiques depuis votre base de données
                ?>
            </div>
        </section>

    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
        <ul>
            <li><a href="forme_juridique.php">Mentions légales</a></li>
        </ul>
    </footer>
</body>
</html>j