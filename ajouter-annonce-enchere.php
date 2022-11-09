<?php 
require __DIR__."/classes/pdo.php";
require __DIR__."/classes/session.php";

require __DIR__."/classes/enchere.php";


if (isset($_SESSION['id_utilisatateur'])) {
    echo 'utilsateur connecté';
}


$query1 = $pdo->prepare("SELECT * FROM `voiture` ORDER BY marque ASC");
$resultat = $query1->execute();
$voitures = $query1->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST["submitAnnonce"])){



    $query = $pdo->prepare("INSERT INTO annonce (prix-depart, date-fin,voiture_id) VALUES (:prix_depart,:date_fin,:voiture_id)");
    $query->bindValue(':prix_depart',$_POST["prixDepart"],PDO::PARAM_INT);
    $query->bindValue(':date_fin',$_POST["dateFin"],PDO::PARAM_INT);
    $query->bindValue(':voiture_id',$_POST["voiture_id"],PDO::PARAM_INT);
    $annonces = $query->execute();

  
}

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

<div class="text-annonce">
    <h1>Ajouter une annonce ou proposer une enchère</h1>
    
</div>
<div class="form-css" >
    <div class="form-position">
        <h2>Formulaire pour ajouter une annonce</h2>
        <form action="ajouter-annonce-enchere.php" method="post">
            <p>
                <label for="prixDepart">Prix de départ</label>
                <input type="text" name="prixDepart" id="prixDepart">
            </p>
            <p>
                <label for="dateFin">Date de fin de l'enchère</label>
                <input type="date" name="dateFin" id="dateFin">
            </p>

            <label for="voiture_id">Marque et modele de voiture</label>
            <select name="voiture_id" id="voiture_id">
                <?php foreach ($voitures as $key =>$value){ ?>
                    <option value="<?=$value["id"]?>"><?=$value["marque"]." ".$value["modele"] ?></option>
            <?php } ?>
            </select>
            <p>
                <input type="submit" value="Ajouter" name="submitAnnonce">
            </p>
            
        </form>




    </div>
    <div class="form-position">
        <h2>Formulaire pour proposer une enchère</h2>

        <form action="ajouter-annonce-enchere.php" method="post">
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

    </div>
   
  

</div>
    
    

    <?php 
        if(isset($_POST["submitAnnonce"])){

            if($annonces){
                echo "Annonce rajouter";
            } else {
                echo "Erreur lors de l'ajout de l'annonce";
            }
    
        }
    ?>

    
    <?php 

        if(isset($_POST["submitEnchere"])){

            if($voitures){
                echo "Enchère rajouter";
            } else {
                echo "Erreur lors de l'ajout de l'enchère";
            }

        }
    ?>
</body>
</html>

