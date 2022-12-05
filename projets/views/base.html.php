<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="publics/css/style.css">
</head>
<body>
<div class="menu">
        <ul>
            <li><a href="index.php?view=1">Ouvrages</a></li>
            <li><a href="index.php?view=2">Rayons</a></li>
            <li><a href="index.php?view=3">Auteurs</a></li>
            <li><a href="index.php?view=4&filtre=0">Demande de pret</a></li>
            <li><a href="index.php?view=5">Deconnexion</a></li>
        </ul>
        <div class="user-connect" style="display: flex">
            <h3>Nom : <?= $_SESSION['user']['nom'] ?></h3>
            <h3>Prénom : <?= $_SESSION['user']['prenom']?></h3>
        </div>
    </div>
    <?php echo($contentView); ?>
</body>
</html>