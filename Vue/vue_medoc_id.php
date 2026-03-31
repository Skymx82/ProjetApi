<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $data = json_decode($medicament, true)[0]; ?>
    <title><?= htmlspecialchars($data['nom']) ?> - Pharmacie GSB</title>
    <link rel="stylesheet" href="Vue/style.css">
    <style>
        /* ---- Sections enrichies ---- */
        .detail-sections {
            max-width: 900px;
            margin: 2rem auto;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            padding: 0 1rem;
        }

        .section-bloc {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem 1.75rem;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .section-titre {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        /* Badges listes */
        .badge-liste {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .badge {
            display: inline-block;
            padding: .35rem .85rem;
            border-radius: 999px;
            font-size: .85rem;
            font-weight: 500;
        }

        .badge-vert  { background: #d1fae5; color: #065f46; }
        .badge-rouge { background: #fee2e2; color: #991b1b; }

        /* Cartes interaction */
        .interaction-card {
            border-left: 4px solid #f59e0b;
            background: #fffbeb;
            border-radius: 0 8px 8px 0;
            padding: .75rem 1rem;
            margin-bottom: .75rem;
        }

        .interaction-card:last-child { margin-bottom: 0; }

        .interaction-med {
            font-weight: 700;
            color: #92400e;
            margin-bottom: .25rem;
        }

        .interaction-desc {
            font-size: .9rem;
            color: #555;
        }

        .empty-info {
            color: #9ca3af;
            font-style: italic;
            font-size: .9rem;
        }
    </style>
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
        <a href="index.php?page=medoc" class="btn-retour">← Retour aux médicaments</a>

        <!-- ── Bloc principal ── -->
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

        <!-- ── Sections enrichies ── -->
        <div class="detail-sections">

            <!-- Effets thérapeutiques -->
            <div class="section-bloc">
                <div class="section-titre">✅ Effets thérapeutiques</div>
                <?php if (!empty($data['effets_therapeutiques'])): ?>
                    <ul class="badge-liste">
                        <?php foreach ($data['effets_therapeutiques'] as $effet): ?>
                            <li class="badge badge-vert"><?= htmlspecialchars($effet) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="empty-info">Aucun effet thérapeutique renseigné.</p>
                <?php endif; ?>
            </div>

            <!-- Effets secondaires -->
            <div class="section-bloc">
                <div class="section-titre">⚠️ Effets secondaires</div>
                <?php if (!empty($data['effets_secondaires'])): ?>
                    <ul class="badge-liste">
                        <?php foreach ($data['effets_secondaires'] as $effet): ?>
                            <li class="badge badge-rouge"><?= htmlspecialchars($effet) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="empty-info">Aucun effet secondaire renseigné.</p>
                <?php endif; ?>
            </div>

            <!-- Interactions -->
<div class="section-bloc">
    <div class="section-titre">🔁 Interactions médicamenteuses</div>
    <?php if (!empty($data['interactions'])): ?>
        <?php foreach ($data['interactions'] as $inter): ?>
            <div class="interaction-card">
                <div class="interaction-desc">
                    <?= htmlspecialchars($inter['description']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="empty-info">Aucune interaction connue.</p>
    <?php endif; ?>
</div>

        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Pharmacie GSB | Tous droits réservés</p>
    </footer>
</body>
</html>