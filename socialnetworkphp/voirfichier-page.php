<?php
include 'view_profil_on.php';
$id = filter_input(INPUT_GET, "id");
$check=$pdo->prepare('SELECT * FROM grouppage WHERE id=?');
$check->execute(array($id));
$data=$check->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title><?php echo $data["nomdelapage"]; ?></title>
</head>
<body>
<form method="POST">
    <h1>
    <?php echo $data["nomdelapage"]; ?>
    </h1><br><br>
    <p><?php echo $data["description"]; ?></p>
</form>
<?php if($data['user_id'] == $_SESSION['user_id']): ?>
<a href="content.php?id=<?php echo $id; ?>">modifier</a>
<?php endif; ?>
</body>
</html>
