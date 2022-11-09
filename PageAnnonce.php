<?php 
require __DIR__."/classes/pdo.php";


$query = $pdo->prepare("SELECT annonce.`id`,annonce.`prix-depart`,annonce.`date-fin`,annonce.voiture_id,voiture.marque,voiture.modele,voiture.puissance,voiture.annee,voiture.description
FROM `annonce`
JOIN voiture ON annonce.voiture_id = voiture.id;");

$query->execute();

$annonces = $query->fetchAll(PDO::FETCH_ASSOC);

$query4 = $pdo->prepare("SELECT * 
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
    <br>
    <div class="annonce-li">
        <ul>
            <li>
                <?php
                foreach ($annonces as $key => $value){ ?>               
                <p>Prix de départ: <?=$value["prix-depart"];?></p>               
                <p>Date de fin de l'enchère: <?=$value["date-fin"];?></p>
                <p>Modele: <?=$value["modele"];?></p>
                <p>Marque: <?=$value["marque"];?></p>
                <p>Puissance: <?=$value["puissance"];?></p>
                <p>Annee: <?=$value["annee"];?></p>
                <p>Description: <?=$value["description"];?></p>
                <a href="PageEnchere.php?id=<?= $value['id']?>">Afficher</a>
            <?php } ?>
            </li>
        </ul>
    </div>

    <div class="block-annonce">
        <h1>AJOUTER UNE ANNONCE</h1>
        <button><a href="ajouter-annonce-enchere.php">Ajouter une annonce</a></button>
    </div>
    
    
    


    
</body>
</html>