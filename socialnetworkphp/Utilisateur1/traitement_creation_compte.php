<?php
include '../view_profil_on.php';

if(isset($_POST['identifiant']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['verification_password'])){
    $identifiant=htmlspecialchars(filter_input(INPUT_POST,"identifiant"));
    $email = htmlspecialchars(filter_input(INPUT_POST,"email"));
    $password=htmlspecialchars(filter_input(INPUT_POST,"password"));
    $password_confirmation=htmlspecialchars(filter_input(INPUT_POST,"verification_password"));

    $check = $pdo -> prepare('SELECT email, user_name, password FROM user WHERE email = ? ');
    $check -> execute(array($email));
    $data = $check -> fetch();
    $row = $check -> rowCount();

    if($row == 0){
        if(strlen($identifiant)){
            if(isset($email)){
                if(strlen($email) <= 100){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if(isset($password)&&isset($password_confirmation)){
                            if($password == $password_confirmation){
                                $password = hash('sha256', $password);
                                $insert = $pdo->prepare('INSERT INTO user(email, user_name, password) VALUES(:email, :username, :password)');
                                $insert->execute(array(
                                    'email' => $email,
                                    'username' => $identifiant,
                                    'password' => $password
                                ));

                                $insert = $pdo->prepare('INSERT INTO profil_on(email, user_name) VALUES(:email, :username)');
                                $insert->execute(array(
                                    'email' => $email,
                                    'username' => $identifiant,
                                ));
                                header('Location: page_connexion.php?reg_err=success');
                            }else header('Location: creation_compte.php?reg_err=no_password_or_confirmation');
                        }else header('Location: creation_compte.php?reg_err=password');
                    }else header('Location: creation_compte.php?reg_err=email');
                }else header('Location: creation_compte.php?reg_err=email_length');
            }else header('Location: creation_compte.php?reg_err=no_email');
        }else header('Location: creation_compte.php?reg_err=identifiant_length'); 
    }else header('Location: creation_compte.php?reg_err=already');

    

}else header('Location: creation_compte.php?reg_err=champs_no_remplis');
?>