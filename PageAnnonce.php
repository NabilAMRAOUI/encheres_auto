<?php 
require __DIR__."/classes/pdo.php";


$query = $pdo->prepare("SELECT annonce.`id`,annonce.`prix-depart`,annonce.`date-fin`,annonce.voiture_id,voiture.marque,voiture.modele,voiture.puissance,voiture.annee,voiture.description
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
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Document</title>
</head>
<body>

        <?php require __DIR__."/classes/navBar.php" ?>
    
    <br>
    <div class="annonce-li">
            <ul class="annonce">
            
                <?php
                foreach ($annonces as $key => $value){ ?>               
                <li>
                    <p>Prix de départ:</p> 
                    <p><?=$value["prix-depart"];?></p> 
                </li>
                <li>
                    <p>Date de fin de l'enchère:</p> 
                    <p><?=$value["date-fin"];?></p>
                </li> 
                <li>
                    <p>Modele:</p> 
                    <p><?=$value["modele"];?></p>
                </li>             
                <li>
                    <p>Marque:</p>
                    <p><?=$value["marque"];?></p>
                </li>
                <li>
                    <p>Puissance:</p> 
                    <p><?=$value["puissance"];?></p>
                </li>
                <li>
                    <p>Annee:</p> 
                    <p><?=$value["annee"];?></p>
                </li>
                <li>
                    <p>Description:</p> 
                    <p><?=$value["description"];?></p>
                </li>
                <li>
                   <p><a href="PageEnchere.php?id=<?= $value['id']?>">Afficher</a></p> 
                </li>
                
            </ul>
            <?php } ?>
        </div>

    <div class="block-annonce">
        <h2>Ajouter une Annonce</h2>
        <button><a href="ajouter-annonce-enchere.php">Ajouter une annonce</a></button>
    </div>
    
    
    


    
</body>
</html>