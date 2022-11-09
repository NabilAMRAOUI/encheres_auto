<?php
require __DIR__."/classes/pdo.php";

require __DIR__."/classes/enchere.php";

$query = $pdo->prepare("SELECT annonce.`id`,annonce.`prix-depart`,annonce.`date-fin`,annonce.voiture_id,voiture.marque,voiture.modele,voiture.puissance,voiture.annee,voiture.description
FROM `annonce`
JOIN voiture ON annonce.voiture_id = voiture.id
WHERE annonce.id = 1;");

$query->execute();

$annonce = $query->fetch(PDO::FETCH_ASSOC);



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

    

    <p>Prix de départ: <?=$value["prix-depart"];?></p>               
    <p>Date de fin de l'enchère: <?=$value["date-fin"];?></p>
    <p>Modele: <?=$value["modele"];?></p>
    <p>Marque: <?=$value["marque"];?></p>
    <p>Puissance: <?=$value["puissance"];?></p>
    <p>Annee: <?=$value["annee"];?></p>
    <p>Description: <?=$value["description"];?></p>






    <h2>Formulaire pour proposer une enchère</h2>

    <form action="PageEnchere.php" method="post">
        <p>
            <label for="prixPropose">Prix proposer</label>
            <input type="text" name="prixPropose" id="prixPropose">
        </p>
        <p>
            <label for="dateD">Date de fin de l'enchère</label>
            <input type="date" name="dateD" id="dateD">
        </p>


        <label for="utilisateurId">Utilisateur</label>
        <select name="utilisateurId" id="utilisateurId">
            <?php foreach ($utilisateurs as $key =>$value){ ?>
                <option value="<?=$value["id"]?>"><?=$value["nom"]." ".$value["prenom"]  ?></option>
        <?php } ?>
        </select>

        <label for="annonceId">Annonce</label>
        <select name="annonceId" id="annonceId">
            <?php foreach ($annonces as $key =>$value){ ?>
                <option value="<?=$value["id"]?>"><?=$value["prix-depart"]."€  jusqu'au ".$value["date-fin"] ?></option>
        <?php } ?>
        </select>
        <p>
            <input type="submit" value="Proposer" name="submitEnchere">
        </p>
        
    </form>


    <?php 


        if(isset($_POST["submitEnchere"])){

            if($resultat){
                echo '<p class="confirm">Enchère rajouter</p>';
            } else {
                echo "Erreur lors de l'ajout de l'enchère";
            }

        }
    ?>
    
    
</body>
</html>