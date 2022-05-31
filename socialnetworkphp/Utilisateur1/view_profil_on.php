<?php
include '../view_profil_on.php';


// récupérer les données de la db de myadmin 
// changer l'id pour changer de personne
// $statement = $pdo->prepare("INSERT INTO profil_on(SELECT * FROM user)");
// $statement->execute();

$statement = $pdo->prepare("SELECT * FROM profil_on WHERE user_name=:username");
$statement->execute([
    ':username' => $_SESSION['user']
]);
$profil_on = $statement->fetch(PDO::FETCH_ASSOC);



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil_on</title>
    
</head>
<body>
    <h1>Mes identifiants</h1>
    
    <form method="post">
        identifiant : <?= $profil_on["user_name"] ?><br>
        Prénom : <?= $profil_on["prenom"] ?><br>
        Nom : <?= $profil_on["nom"] ?><br>
        Adresse : <?= $profil_on["adresse"] ?><br>
        
        <br>
        Mot de passe : <?= $profil_on["password"] ?><br>
        Email : <?= $profil_on["email"] ?><br>

        <br>
        <input type="button" value="modifier" onclick="window.location.href='modif_profil_on.php';">
        <input type="button" value="désactiver" onclick="window.location.href='profil_off.php';">
    </form>
    
    <a href="../profil_utilisateur.php">Profil</a>
</body>
</html>