<?php
include '../view_profil_on.php';  
$pseudo = htmlspecialchars($_POST['name']);
$message =nl2br(htmlspecialchars($_POST['message']));

/*
$form_id=htmlspecialchars($_POST['form_id']);
$to_id=htmlspecialchars($_POST['to_id']);



$check = $pdo -> prepare('SELECT email, user_name, password FROM user WHERE email = ? ');
$check -> execute(array($email));
$data = $check -> fetch();
$row = $check -> rowCount();*/





if ($message===""){
    $requete = $bdd->prepare('SELECT * FROM message');
    $requete->execute();
    $messages = $requete->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($messages);

}
else {
    $insererMessage = $bdd->prepare('INSERT INTO message(pseudo,message) VALUES(?,?)');
    $insererMessage->execute(array($pseudo, $message));

    $requete = $bdd->prepare('SELECT * FROM message');
    $requete->execute();
    $messages = $requete->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($messages);
}