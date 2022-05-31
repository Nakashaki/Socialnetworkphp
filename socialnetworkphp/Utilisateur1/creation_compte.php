
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Facebook</title>
    </head>
    <body>
        <?php
            if(isset($_GET['reg_err'])){
                $err = htmlspecialchars(filter_input(INPUT_GET,'reg_err'));
                switch($err){
                    case 'already':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> le compte a cette adress mail est deja existant
                        </div>
                        <?php
                        break;
                    case 'identifiant_length':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> veuillez renseigner un identifiant 
                        </div>
                        <?php
                        break;
                    case 'no_email':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> veuillez renseigner un mail
                        </div>
                        <?php
                        break;
                    case 'email_length':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> veuillez renseigner un mail inferieure à 100 caractéres
                        </div>
                        <?php
                        break;
                    case 'no_email':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> veuillez renseigner un mail
                        </div>
                        <?php
                        break;
                    case 'email':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> le mail que evous avez saisie n'est pas valide
                        </div>
                        <?php
                        break;
                    case 'no_email':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> veuillez renseigner un mail
                        </div>
                        <?php
                        break;
                    case 'password':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> la confirmation du mot de pass n'est pas la même
                        </div>
                        <?php
                        break;
                    case 'no_password_or_confirmation':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> veuillez saisir le mot de pass ou la confirmation du mot de pass
                        </div>
                        <?php
                        break;
                    case 'champs_no_remplis':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> veuillez remplir tous les champs
                        </div>
                        <?php
                        break;
                    }
            }
        ?>
        <h3>CREATION DE VOTRE COMPTE</h3>
        <form action="traitement_creation_compte.php"method="POST">
            <input type="email" class="form_control" name="email" placeholder="email" required="required" autocomplate="off">
            <input type="text" class="form_control" name="identifiant" placeholder="identifiant" autocomplete="off"/><br/>
            <input type="password" class="form_control" name="password" placeholder="password" autocomplete="off"/><br/>
            <input type="password" class="form_control" name="verification_password" placeholder="password confirmation" autocomplete="off"/><br/>
            <input type="submit" value="création"/>
            <!-- ensuite il faut intéroger la base de donnée -->
        </form>
            <br>
    </body>
</html>