<?php 
require __DIR__."/classes/pdo.php";
require __DIR__."/classes/annonce.php";

$query = $pdo->prepare("SELECT * 
FROM `annonce`
JOIN voiture ON annonce.voiture_id = voiture.id;");

$query->execute();

$annonces = $query->fetchAll(PDO::FETCH_ASSOC);

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php require __DIR__."/classes/navBar.php" ?>
    </header>

    <ul>
        <li>
            <?php
            foreach ($annonces as $key => $value){ ?>
            <p><?=$value["prix-depart"];?></p>
            <p><?=$value["date-fin"];?></p>
            <p><?=$value["modele"];?></p>
            <p><?=$value["marque"];?></p>
           <?php } ?>
        </li>
    </ul>

    <a href="ajouter-annonce-anchere.php">Ajouter une annonce</a>


    
</body>
</html>