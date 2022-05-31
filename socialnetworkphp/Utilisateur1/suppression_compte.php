<?php
include '../view_profil_on.php';

$id = $_SESSION['user_id'];
$statement1 = $pdo->prepare("DELETE FROM grouppage WHERE user_id = :id");
$statement1->execute([
    ":id" => $id
]);
$statement2 = $pdo->prepare("DELETE FROM user WHERE id = :id");
$statement2->execute([
    ":id" => $id
]);
session_destroy();
header('Location:page_connexion.php');
exit();
?>