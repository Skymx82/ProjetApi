<!DOCTYPE html>
<html>
<head>
    <title>Médicaments</title>
</head>
<body>
<h1>Nos médicaments</h1>
<?php
$string_decode=json_decode($medicaments,true);


for ($i = 0; $i < count($string_decode); $i++) {
	echo '    <form action="index.php" method="post">';
    echo '<input type="hidden" id="id_medicament" name="id_medicament" value="'.$string_decode[$i]["id_medicament"].'">';
    echo '<label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="'.$string_decode[$i]["nom"].'">';
    echo '<label for="description">Description :</label>
        <input type="text" id="description" name="description" value="'.$string_decode[$i]["description"].'">';
    echo '<label for="famille">Famille :</label>
        <input type="text" id="famille" name="famille" value="'.$string_decode[$i]["famille"].'">';
    echo '<label for="image">Image :</label>
        <input type="text" id="image" name="image" value="'.$string_decode[$i]["image"].'">';
    echo '<input type="submit" name="actionMedoc" value="modifier">';
    echo '<input type="submit" name="actionMedoc" value="supprimer">';
	echo"</form>";

}
    echo '</br></br></br>';
?>

    <h2>Ajouter un médicament</h2>
    <form action="index.php" method='post'>

        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="description">Description :</label><br>
        <input type="text" id="description" name="description"><br><br>
        <label for="famille">Famille :</label><br>
        <input type="text" id="famille" name="famille"><br><br>
        <label for="image">Image :</label><br>
        <input type="text" id="image" name="image"><br><br>

        <input type="submit" name="actionMedoc" value="ajouter">
    </form>
</body>
</html>
