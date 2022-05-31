<?php


// se connecter à la db sur myadmin
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../view_profil_on.php';
    

    $statement = $pdo->prepare("SELECT * FROM profil_on WHERE user_name=:username");
    $statement->execute([
        ':username' => $_SESSION['user']
    ]);

    $profil_on = $statement->fetch(PDO::FETCH_ASSOC);

    $user_name=$_POST['user_name'];
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $adresse=$_POST['adresse'];
    $password=hash('sha256', $password);

    $email=$_POST['email']; 

    if($user_name == "") {
        $user_name = $profil_on["user_name"];
    }

    if($prenom == "") {
        $prenom = $profil_on["prenom"];
    }

    if($password == "") {
        $password = $profil_on["password"];
    }

    if($nom == "") {
        $nom = $profil_on["nom"];
    }

    if($adresse == "") {
        $adresse = $profil_on["adresse"];
    }

    if($email == "") {
        $email = $profil_on["email"];
    }

    $query = $pdo->prepare("UPDATE profil_on SET user_name=:user_name, prenom=:prenom, nom=:nom, adresse=:adresse, password=:password, email=:email WHERE user_name=:username");
    $query->execute(array(
        ":user_name" => $user_name,
        ":prenom" => $prenom,
        ":nom" => $nom,
        ":adresse" => $adresse,
        ":password" => $password,
        ":email" => $email,
        ":username" => $_SESSION['user']
        ));
        $_SESSION['user'] = $user_name;


    // Ici on est en POST
    header('Location: view_profil_on.php');
    exit();
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modification du profil_on</title>
</head>
<body>
    <h1>Mon formulaire</h1>
    
    <!-- action="profil_ontest.php"  permet à la page profil_ontest.php de récupérer les données transmises par test.php -->
    <form method="post">
        user_name : <input type="text" name="user_name" value="<?php echo $profil_on["user_name"]; ?>"/><br>
        prenom : <input type="text" name="prenom"/><br>
        Nom : <input type="text" name="nom"/><br>
        Adresse : <input type="text" name="adresse"/><br>
        
        <br>
        Mot de passe : <input type="password" name="password"/><br>
        Email : <input type="email" name="email"/><br>
        
        <br>
        <input type="submit" name= "Submit" value="mettre à jour">
    </form>
</body>
</html>