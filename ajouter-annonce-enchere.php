<?php 
require __DIR__."/classes/pdo.php";
require __DIR__."/classes/session.php";

require __DIR__."/classes/annonce.php";


if (isset($_SESSION['id_utilisateur'])) {
    echo 'utilsateur connecté';
}





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


    <div class="text-annonce">
    
    
</div>
<div class="form-css1" >
    <h2>Formulaire pour ajouter une annonce</h2>
    <div class="form-position">
        <form action="ajouter-annonce-enchere.php" method="post">
            <p>
                <label for="prixDepart">Prix de départ</label>
                <input type="text" name="prixDepart" id="prixDepart">
            </p>
            <p>
                <label for="dateFin">Date de fin de l'enchère</label>
                <input type="date" name="dateFin" id="dateFin">
            </p>
            <p>
                <label for="voiture_id">Marque et modele de voiture</label>
                <select name="voiture_id" id="voiture_id">
                <?php foreach ($voitures as $key =>$value){ ?>
                    <option value="<?=$value["id"]?>"><?=$value["marque"]." ".$value["modele"] ?></option>
                <?php } ?>
                </select>
            </p>
            
            <p>
                <input type="submit" value="Ajouter" name="submitAnnonce">
            </p>
            
        </form>

    </div>
   
  

</div>
    
    

    <?php 
        if(isset($_POST["submitAnnonce"])){

            if($resultat){
                echo "Annonce rajouter";
            } else {
                echo "Erreur lors de l'ajout de l'annonce";
            }
    
        }

    ?>
    
</body>
</html>

