<!DOCTYPE html>
<html>
<head>
    <title>Médicaments</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f4f8;
            padding: 40px 20px;
        }

        h1 {
            text-align: center;
            color: #1a202c;
            font-size: 2rem;
            margin-bottom: 40px;
            letter-spacing: 0.5px;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            justify-content: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            width: 280px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.14);
        }

        .card-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background-color: #e2e8f0;
        }

        .card-image-placeholder {
            width: 100%;
            height: 180px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
        }

        .card-body {
            padding: 20px;
        }

        .card-famille {
            display: inline-block;
            background-color: #ebf4ff;
            color: #3182ce;
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 4px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        .card-nom {
            font-size: 1.15rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .card-description {
            font-size: 0.88rem;
            color: #718096;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .card-actions {
            display: flex;
        }

        .btn {
            flex: 1;
            padding: 9px 0;
            border: none;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-selectionner {
            background-color: #4299e1;
            color: white;
        }

        .btn-selectionner:hover {
            background-color: #3182ce;
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

<h1>Nos médicaments</h1>

<div class="cards-container">
<?php
$string_decode = json_decode($medicaments, true);

for ($i = 0; $i < count($string_decode); $i++) {
    $med = $string_decode[$i];
    $nom         = htmlspecialchars($med["nom"]);
    $description = htmlspecialchars($med["description"]);
    $famille     = htmlspecialchars($med["famille"]);
    $image       = htmlspecialchars($med["image"]);
    $id          = htmlspecialchars($med["id_medicament"]);
    echo '
    <div class="card">
        ' . ($image
            ? '<img class="card-image" src="' . $image . '" alt="' . $nom . '">'
            : '<div class="card-image-placeholder">💊</div>'
        ) . '
        <div class="card-body">
            <span class="card-famille">' . $famille . '</span>
            <div class="card-nom">' . $nom . '</div>
            <div class="card-description">' . $description . '</div>
            <div class="card-actions">
                <form action="index.php" method="post" style="display:contents">
                    <input type="hidden" name="id_medicament" value="' . $id . '">
                    <button class="btn btn-selectionner" name="actionMedoc" value="selectionner">Sélectionner</button>
                </form>
            </div>
        </div>
    </div>';
}
?>
</div>

</body>
</html>
