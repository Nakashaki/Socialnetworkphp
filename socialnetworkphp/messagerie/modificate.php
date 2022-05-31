<?php
include '../view_profil_on.php';
$id = htmlspecialchars($_POST['id']);
$message =nl2br(htmlspecialchars($_POST['message']));
$stmt = $bdd->prepare("UPDATE message SET message = :message WHERE id = :id");
$stmt->execute([
  ":message" => $message,
  ":id" => $id
]);



?>