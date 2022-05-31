<?php
include '../view_profil_on.php';

// récupérer les données de la db de myadmin 
// changer l'id pour changer de personne
$statement = $pdo->prepare("INSERT INTO profil_off(SELECT * FROM profil_on WHERE user_id='1'); DELETE FROM `profil_on` WHERE user_id = '1'");
$statement->execute();
$profil_on = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete du profil_on</title>
</head>
<body>
    <h1>Mon formulaire</h1>
    <h3>Votre compte a bien été désactivé</h3>
    <form method="post">
        <input type="submit" name= "Submit" value="delete" onclick="window.location.href='view_profil.php';">
    </form>
</body>
</html>