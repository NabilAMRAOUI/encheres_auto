<?php
require __DIR__."/classes/pdo.php";
require __DIR__."/classes/annonce.php";
require __DIR__."/classes/enchere.php";


var_dump($_SESSION);

$query = $pdo->prepare("SELECT annonce.`id`,annonce.`prix-depart`,annonce.`date-fin`,annonce.voiture_id,voiture.marque,voiture.modele,voiture.puissance,voiture.annee,voiture.description
FROM `annonce`
JOIN voiture ON annonce.voiture_id = voiture.id
WHERE annonce.id = :id;");
$query->bindValue(":id",$_GET["id"],PDO::PARAM_INT);

$query->execute();

$annonce = $query->fetch(PDO::FETCH_ASSOC);

$query2 = $pdo->prepare("SELECT enchere.`prix-propose`,enchere.`date`,utilisateur.`nom`,utilisateur.`prenom` 
FROM `enchere`
JOIN utilisateur ON enchere.utilisateur_id = utilisateur.id
WHERE annonce_id = :id;");
$query2->bindValue(":id",$_GET["id"],PDO::PARAM_INT);

$query2->execute();

$encheres = $query2->fetchAll(PDO::FETCH_ASSOC);



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php require __DIR__."/classes/navBar.php" ?>
    </header>

    
    <h2>Annonce selectionner</h2>
    <p>Prix de départ: <?=$annonce["prix-depart"];?></p>               
    <p>Date de fin de l'enchère: <?=$annonce["date-fin"];?></p>
    <p>Modele: <?=$annonce["modele"];?></p>
    <p>Marque: <?=$annonce["marque"];?></p>
    <p>Puissance: <?=$annonce["puissance"];?></p>
    <p>Annee: <?=$annonce["annee"];?></p>
    <p>Description: <?=$annonce["description"];?></p>

    <h2>Les enchères en cours de l'annonce</h2>
    <ul>
        <li>
            <?php
            foreach ($encheres as $key => $value){ ?>               
            <p>Prix de départ: <?=$value["prix-propose"];?></p>               
            <p>Date de fin de l'enchère: <?=$value["date"];?></p>
            <p>Enchère de: <?=$value["nom"]." ". $value["prenom"];?></p>
           <?php } ?>
        </li>
    </ul>






    <h2>Formulaire pour proposer une enchère</h2>
    <?php
    if(isset($_SESSION["id_utilisatateur"])) { ?>
        <form action="PageEnchere.php?id=<?= $_GET["id"]?>" method="post">
            <p>
                <label for="prixPropose">Prix proposer</label>
                <input type="text" name="prixPropose" id="prixPropose">
            </p>
            <p>
                <label for="dateD">Date de fin de l'enchère</label>
                <input type="date" name="dateD" id="dateD">
            </p>
    
            <p>
                <input type="submit" value="Proposer" name="submitEnchere">
            </p>
            
        </form>
        
    <?php } else { ?>
        <a href="connexion.php">Connectez vous </a>
    <?php }
    ?>



    <?php 


        if(isset($_POST["submitEnchere"])){

            if($resultat4){
                echo '<p class="confirm">Enchère rajouter</p>';
            } else {
                echo "Erreur lors de l'ajout de l'enchère";
            }

        }
    ?>
    
    
</body>
</html>