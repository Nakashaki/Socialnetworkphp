<?php
include '../view_profil_on.php';


$id = $_GET['id'];

try {
  $publication = $bdd->query('SELECT * FROM text_img where id=' . $id)->fetch();
  $comments = $bdd->query('SELECT * FROM comment where publicationId=' . $id);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

$comment = $_POST['commentaire'];

if (isset($comment)) {
  $ins = $bdd->prepare('INSERT INTO comment (content, publicationId) 
      VALUES (?, ?)');

  $ins->execute(array($comment, $id));
}

?>
<img src="<?= $publication['img_path'] ?>" alt="">
<p><?= $publication['content'] ?></p>
<p><?= $publication['date_time_posts'] ?></p>

<meta charset="UTF-8">
<h2>Commentaire</h2>

<body>

  <?php while ($comment = $comments->fetch()) { ?>

    <p><?= $comment['content'] ?></p>

  <?php } ?>

  <form method="POST" enctype="multipart/form-data">
    <textarea name="commentaire" placeholder="Votre commentaire..." cols="20" rows="10"></textarea></br>
    <input type="submit" value="Publier"></br>
  </form>

</body>

</html>