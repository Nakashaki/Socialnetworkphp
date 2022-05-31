<!DOCTYPE html>
<html>
<title>Pas de reload</title>
<head>
<link href="style.css" rel="stylesheet">

</head>

<body>
    <h1>Contacts :</h1>
    
    <?php 
    //creation de tout les contacts
    include '../view_profil_on.php';
    $publication = $bdd->query('SELECT * FROM user ORDER BY id DESC');
    //en fonction de contact
    if(array_key_exists('user',$_POST)){
      $stock=$_POST['user'];
      $_SESSION['transmet']= $stock;
      header("Location: PageMessage.php");
    }
    
    ?>
    

<?php while ($a = $publication->fetch()) { 
  $user=$a['user_name'];
?>

  <form  method="POST">
    <p> <?= $a['user_name'];?> </p>  
    <input name="user" type="submit" value="<?php echo htmlspecialchars($user); ?>"/>
    
  </form>
<?php } ?>
 
   
</div>


  
</body>

</html>