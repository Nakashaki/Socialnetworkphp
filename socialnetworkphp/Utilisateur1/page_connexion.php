
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
        if(isset($_GET['login_err'])){
            $err = htmlspecialchars(filter_input(INPUT_GET,'login_err'));
            switch($err){
                case 'password':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> mot de pass incorrect
                    </div>
                    <?php
                    break;

                case 'no_password':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> saisir un mot de pass
                    </div>
                    <?php
                    break;

                case 'no_identifiant':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> saisir un identifiant
                    </div>
                    <?php
                    break;
                
                case 'already':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> compte non existant
                    </div>
                    <?php
                    break;
            }
        }
        ?>
        <h3>CONNEXION</h3>
        
        <form action="traitement_connexion.php" method="POST">
            <input type="text" name="identifiant" placeholder="identifiant"/><br/>
            <input type="password" name="password" placeholder="password"/><br/>
            <input type="submit" value="connexion"/>
            <!-- ensuite il faut intéroger la base de donnée -->
        </form>
            <br>
            <!-- si le client n'a pas de compte on lui propose d'en crée un -->
            <a href="creation_compte.php">cree un compte</a>
    </body>
</html>