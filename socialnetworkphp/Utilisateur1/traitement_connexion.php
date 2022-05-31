<?php
include '../view_profil_on.php';

    $identifiant = htmlspecialchars(filter_input(INPUT_POST,"identifiant"));
    $password = htmlspecialchars(filter_input(INPUT_POST,"password"));
    var_dump($password);
    $statement1 = $pdo->prepare("SELECT email, user_name, password, id FROM user WHERE user_name = ?");
    $statement1->execute(array($identifiant));
    $data = $statement1->fetch();
    $row = $statement1->rowCount();


    if($_POST['identifiant']){
        if($_POST['password']){
            if($row == 1){
                $password = hash('sha256', $password);
                if($data['password'] === $password){
                    $_SESSION['id'] = $data['email'];
                    $_SESSION['user'] = $data['user_name'];
                    $_SESSION['user_id'] = $data['id'];
                    // echo "vous avez bien un compte dans notre serveur";
                    
                    

                    header('Location:view_profil_on.php');

                }else header('Location:page_connexion.php?login_err=password');
            }else header('Location:page_connexion.php?login_err=already');
        }else header('Location:page_connexion.php?login_err=no_password');
    }else header('Location:page_connexion.php?login_err=no_identifiant');
?>