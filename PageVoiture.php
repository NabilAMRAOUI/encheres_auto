<?php 
require __DIR__."/classes/pdo.php";
require __DIR__."/classes/voiture.php";




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
    
    <section>
        <div class="form-css1">
            <h1>AJOUTER VOITURE</h1>
            <div class="form-position">
         <?php   if(isset($_SESSION["id_utilisatateur"])) { ?>
                <form action="PageVoiture.php" method="post">
                    
                    <p> 
                    <label for="modele">Modele</label>
                    <input type="text" name="modele" id="modele">
                    </p>
    
                    <p>
                    <label for="marque">Marque</label>
                    <input type="text" name="marque" id="marque">
                    </p>
    
                    <p>
                    <label for="puissance">Puissance</label>
                    <input type="text" name="puissance" id="puissance">
                    </p>
    
                    <p>
                    <label for="annee">Date de la voiture</label>
                    <input type="datetime" name="annee" id="annee">
                    </p>
    
                    <p>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description">
                    
                        <input type="submit" value="Ajouter" name="submitVoiture">
                    </p>
    
                    <?php } else { ?>
        <a href="connexion.php">Connectez vous </a>
    <?php }
    ?> 

                   
                    
    
                </form>
            </div>
        </div>


    </section>
    

    <?php 

        if(isset($_POST["submitVoiture"])){

            if($resultat5){
                echo "Voiture rajouté";
            } else {
                echo "Erreur ";
            }

            
        }
    ?>
</body>
</html>