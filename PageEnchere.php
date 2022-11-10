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

$query6 = $pdo->prepare ("SELECT MAX(`prix-propose`) FROM `enchere`JOIN utilisateur ON enchere.utilisateur_id = utilisateur.id WHERE `annonce_id` = :id, :nom") ;
$gagnant = $query6->bindValue(":id",$_GET["id"],PDO::PARAM_INT);
$query6->execute();



$query6 = $pdo->prepare ("SELECT  utilisateur_id, utilisateur.nom, utilisateur.prenom FROM `enchere`
JOIN utilisateur ON enchere.utilisateur_id = utilisateur.id
WHERE utilisateur_id = :id") ;
$gagnant2 = $query6->bindValue(":id",$_GET["id"],PDO::PARAM_INT);
$query6->execute();



if(isset($_POST["submitEnchere"])){
     

    if ($_POST["prixPropose"] > $annonce["prix-depart"]) {
        echo "prix correct";
        $query4 = $pdo->prepare("INSERT INTO `enchere` (`prix-propose`, `date`,`utilisateur_id`,`annonce_id`) VALUES (:prixPropose,:dateD,:utilisateurId,:annonceId)");
    $query4->bindValue(':prixPropose',$_POST["prixPropose"],PDO::PARAM_INT);
    $query4->bindValue(':dateD',date("Y-m-d H:i:s"),PDO::PARAM_STR);
    $query4->bindValue(':utilisateurId',$_SESSION["id_utilisatateur"],PDO::PARAM_INT);
    $query4->bindValue(':annonceId',$_GET["id"],PDO::PARAM_INT);
    $resultat4 = $query4->execute();
     }else {
         echo "incorrect";
     }

}


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
            <p>Date de l'enchère: <?=$value["date"];?></p>
            <p>Enchère de: <?=$value["nom"]." ". $value["prenom"];?></p>
           <?php } ?>
        </li>
    </ul>






    <h2>Formulaire pour proposer une enchère</h2>
    <?php
    if(isset($_SESSION["id_utilisatateur"]) && $annonce["date-fin"] > date("Y-m-d H:i:s") ) { ?>
       
       <form action="PageEnchere.php?id=<?= $_GET["id"]?>" method="post">
            <p>
                <label for="prixPropose">Prix proposer</label>
                <input type="text" name="prixPropose" id="prixPropose">
            </p>
           
    
            <p>
                <input type="submit" value="Proposer" name="submitEnchere">
            </p>
            
        </form>
        
    <?php } else { ?>
        <a href="connexion.php">Connectez vous </a> 
      
    <?php }
    if ($annonce["date-fin"] < date("Y-m-d H:i:s")) {?>
           <p> Enchère Fini </p>  
           <p><?php var_dump($gagnant) ?></p>
      <?php   
    }
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