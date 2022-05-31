<?php

$pdo = new PDO('mysql:host=localhost:8889;dbname=projetphp;charset=utf8;', 'root','root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
include 'blankpage.php';
$id = filter_input(INPUT_GET, "id");

$requeteSelect = $pdo->prepare('SELECT * FROM grouppage WHERE id = :id');
$requeteSelect->execute([
    "id" => $id
]);
$grouppageSelect = $requeteSelect->fetch();


// $error = null;
// ces lignes servent à modifier le contenu.
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $nomdelapage = htmlspecialchars(filter_input(INPUT_POST,"nomdelapage"));
    if($nomdelapage == "") {
        $nomdelapage = $grouppageSelect['nomdelapage'];
    }
    // if($nomdelapage == "") {
    //     $error = "Le nom de la page est vide";
    // } else if(strlen($nomdelapage) < 3) {
    //     $error = "Le nom de la page est trop court";
    // } else {
        $description = htmlspecialchars(filter_input(INPUT_POST,"description"));
        $insererinformations = $pdo->prepare('UPDATE grouppage SET nomdelapage=:nomdelapage, description=:description ,banniere=:banniere WHERE id=:id');
        $insererinformations->execute(array
        ('nomdelapage'=>$nomdelapage,
        'description'=>$description,
        'banniere'=>"",
        'id'=>$id));
        header("Location: voirfichier-page.php?id=$id");
        exit();
    //}
}
/////////
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>création de page</title>
</head>
<body>
<a href="content.php">retour</a>

<!--  -->
<form method="POST">
    <label for="nom">Nom de la page</label>
    <input type="text" name="nomdelapage" /><br>

    <label for="description">Description</label>
    <textarea cols="30" rows="5" name="description"></textarea><br>

    Bannière :
    <input type="file" name="ceciestunebannière" /><br>
<!-- bouton pour crée la page  -->
    <input type="submit" value="Créer la page" name="createpage"/>
<!--  -->
</form>

</body>
</html>

