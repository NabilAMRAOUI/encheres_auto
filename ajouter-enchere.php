<?php 
require __DIR__."/classes/pdo.php";

$query2 = $pdo->prepare("SELECT * FROM `utilisateur` ORDER BY nom ASC");
$query2->execute();
$utilisateurs = $query2->fetchAll(PDO::FETCH_ASSOC);

$query3 = $pdo->prepare("SELECT * FROM `annonce`");
$query3->execute();
$annonces = $query3->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST["submitEnchere"])){
    

    $query2 = $pdo->prepare("INSERT INTO `enchere` (`prix-propose`, `date`,`utilisateur_id`,`annonce_id`) VALUES (:prixPropose,:dateD,:utilisateurId,:annonceId)");
    $query2->bindValue(':prixPropose',$_POST["prix-propose"],PDO::PARAM_INT);
    $query2->bindValue(':dateD',$_POST["date"],PDO::PARAM_STR);
    $query2->bindValue(':utilisateurId',$_POST["utilisateur_id"],PDO::PARAM_INT);
    $query3->bindValue(':annonceId',$_POST["annonce_id"],PDO::PARAM_INT);
    $resultat2 = $query2->execute();
    $resultat3 = $query3->execute();

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="form-position">
        <h2>Formulaire pour proposer une enchère</h2>

        <form action="ajouter-annonce-enchere.php" method="post">
            <p>
                <label for="prixPropose">Prix proposer</label>
                <input type="text" name="prixPropose" id="prixPropose">
            </p>
            <p>
                <label for="dateD">Date de l'enchère</label>
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
</body>
</html>