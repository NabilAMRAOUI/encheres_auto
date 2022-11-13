<?php 

require __DIR__."/classes/utilisateurs.php";



if (isset($_POST['submitInscription'])) {
  $user = new Utilisateur($_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["mdp"]);
  $nvUtilisateur = $user->insertUtilisateurs($pdo);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    
        <?php require __DIR__."/classes/navBar.php" ?>
<div class="form-css1">
  <h2>Inscription</h2>
  <div class="form-position">
        <form action="inscription.php" method="post">
        
        <p>
          <label for="">
            Nom <input type="text"  name="nom">
          </label>
        </p>
        
        <p>
          <label for="">
            Prénom   <input type="text" name="prenom">
          </label>
        </p>
        <p>
          <label for="">
            Email  <input type="text" name="email">
          </label>

        </p>
        <p>
          <label for="">
            Mot de passe  <input type="text" name="mdp">
          </label>
        </p>
        <p>
          <input type="submit"  name="submitInscription">
        </p>
      </form>

      <?php
    if (isset($_POST["submitInscription"])) {
      if ($nvUtilisateur) {
        echo "Bienvenue";
      }else{
    echo "Erreur";

      }
    }
    ?>


    </div>
</div>    
  
</body>
</html>
