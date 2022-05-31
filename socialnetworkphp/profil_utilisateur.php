<!DOCTYPE html><?php 

include 'view_profil_on.php';
$allmembers = $pdo->prepare('SELECT * FROM user ORDER BY id DESC');
if(isset($_GET['research']) AND !empty($_GET['research'])){
    $search = htmlspecialchars($_GET['research']);
    $allmembers = $pdo->query('SELECT user_name FROM user WHERE user_name LIKE "'.$search.'%" ORDER BY id DESC');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Facebook</title>
    </head>
    <body>
        <h1>Profil</h1>
        <form action="Utilisateur1/page_connexion.php" method="POST">
            <input type="submit" value="deconnexion"/>
        </form>
        <form action="Utilisateur1/suppression_compte.php" method="POST">
            <input type="submit" value="suppression"/>
        </form>
        <a href="messagerie/PageContact.php">Message</a>
        <a href="content.php">Creation de Page</a>
        <a href="posts/publication.php">Creation de Post</a>


        <form method="GET">
            <input type="search" name="research" placeholder="Rechercher un membre">
            <input type="submit" value="Envoyer">
        </form>
        <section class="afficher_membres">
        <?php
            if($allmembers->rowCount() > 0){
                while($member = $allmembers->fetch()){
                    ?>
                    <p><?= $member['user_name'];?></p>
                    <?php
                }
            }
        ?>
    </section>
    </body>
    
</html>
