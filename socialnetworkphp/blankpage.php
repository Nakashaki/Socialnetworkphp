<?php
session_start();
$pdo = new PDO('mysql:host=localhost:8889;dbname=projetphp;charset=utf8;', 'root','root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
// var_dump($_POST); // En POST
// var_dump($_GET); // En GET

// se connecter à la db sur myadmin

echo"connecter a la base de donner";
// sur la page crée si cliquer sur le bouton "create page" et ne possède pas d'id
if (isset($_POST['createpage']) && !isset($_GET['id'])){
    if(!empty($_POST['nomdelapage']) && !empty($_POST['description'])){
        $nomdelapage = htmlspecialchars(filter_input(INPUT_POST,"nomdelapage"));//htmlspecialchars($_POST['nomdelapage']);
        $description = htmlspecialchars(filter_input(INPUT_POST,"description"));//nl2br(htmlspecialchars($_POST['description']));

        $insererinformations = $pdo->prepare('INSERT INTO grouppage(nomdelapage,description,banniere,user_id) VALUES(:nomdelapage,:description,:banniere,:user_id)');
        
        $insererinformations->execute(array
            ('nomdelapage'=>$nomdelapage,
            'description'=>$description,
            'banniere'=>"",
            'user_id'=>$_SESSION['user_id'])); //mettre une variable au lieu du chiffre pour designer la personne connecter actuellement
            $id= $pdo->lastInsertId();
            header("Location: voirfichier-page.php?id=$id");
            exit();
    }
    else{
        echo "error";
    }
}
?>


<!-- <!DOCTYPE html>
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
<form method="POST">
    <label for="nom">Nom de la page</label>
    <input type="text" name="nomdelapage" /><br>

    <label for="desc">Description</label>
    <textarea cols="30" rows="5" name="description"></textarea><br>

    Bannière :
    <input type="file" name="ceciestunebannière" /><br>

    <input type="submit" value="Créer la page" name="createpage"/>
</form>
</body>
</html> -->
