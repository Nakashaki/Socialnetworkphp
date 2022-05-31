<!-- #CONTENU - Mehdi
    - créer une publication apparaissant sur son profile
    - commenter une publication ou un autre commentaire
    - réagir à une publication ou un commentaire avec un emoji -->

<?php
// Connexion à la base de données
include '../view_profil_on.php';

$file_path = '';

if (!empty($_FILES['avatar']) && isset($_POST['publication_content'])) {
  if (!empty($_FILES['avatar'])) {

    $nameFile = $_FILES['avatar']['name'];
    $typeFile = $_FILES['avatar']['type'];
    $sizeFile = $_FILES['avatar']['size'];
    $tmpFile = $_FILES['avatar']['tmp_name'];
    $errFile = $_FILES['avatar']['error'];

    // Extensions
    $extensions = ['png', 'jpg', 'jpeg', 'gif'];
    // Type d'image
    $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
    // On récupère
    $extension = explode('.', $nameFile);
    // Max size
    $max_size = 100000000000;


    // On vérifie que le type est autorisés
    if (in_array($typeFile, $type)) {
      // On vérifie que il n'y a qu'une extension
      if (count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions)) {
        // On vérifie le poids de l'image
        if ($sizeFile < $max_size && $errFile == 0) {
          // On bouge l'image uploadé dans le dossier upload
          $file_path = './picture/' . $nameFile . '.' . strtolower(end($extension));
          if (move_uploaded_file($tmpFile, $file_path)) {
            echo "";
          } else {
            echo "failed";
          }
        } else {
          echo "Fichier trop lourd ou format incorrect";
        }
      } else {
        echo "Extension failed";
      }
    } else {
      echo "";
    }
  }

  if(empty($_POST['publication_content']) && empty($_POST['img_path'])){


    echo "Vous devez renseigner du contenu !";

  }
    else {
      $publication_content = htmlspecialchars($_POST['publication_content']);


      $ins = $bdd->prepare('INSERT INTO text_img (content, date_time_posts, img_path) 
        VALUES (?, NOW(), ?)');

      $ins->execute(array($publication_content, $file_path));

      $message = 'Votre publication a bien ete poste';
    }
  
}

    try {
      $publication = $bdd->query('SELECT * FROM text_img ORDER BY id DESC');
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
    

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Publication</title>
  <meta charset="UTF-8">
</head>

<body>
  <form method="POST" enctype="multipart/form-data">
    <textarea name="publication_content" placeholder="Contenu de l'article" cols="20" rows="10"></textarea><br />

    <input type="file" name="avatar">

    <input type="submit" value="Envoyer la publication"></input>

  </form>

  <?php while ($a = $publication->fetch()) { ?>

    <img src="<?= $a['img_path'] ?>" alt=""><br>
    <p><?= $a['content'] ?></p>
    <p><?= $a['date_time_posts'] ?></p>
    <input type="submit" value="J'aime"><br>
    <a href="<?= "comment.php?id=" . $a['id'] ?>">Commentaire</a><br>

  <?php } ?>

  <?php if (isset($message)) {
    echo "$message";
  } ?>

</body>

</html>


