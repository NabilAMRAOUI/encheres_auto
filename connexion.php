<?php 
require __DIR__."/classes/pdo.php";
session_start();

if(isset($_POST["submitInscription"])){
  
  $query = $pdo->prepare("INSERT INTO `utilisateur`( `nom`, `prenom`, `email`,`mdp`) VALUES (:nom,:prenom,:email,:mdp)");
$query->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
$query->bindValue(':prenom', $_POST["prenom"],PDO::PARAM_STR);
$query->bindValue(':email', $_POST["email"],PDO::PARAM_STR);
$query->bindValue(':mdp', $_POST["mdp"],PDO::PARAM_STR);
$resultat = $query->execute();

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
  <header class="navbar-connexion">
      <?php require __DIR__."/classes/navBar.php" ?>
  </header>

  <section>
    <h1>INSCRIPTION</h1>
    <div class="form-css1">
      <div class="form-position">
        <form action="" method="post">
    
          <p>
            <label for="">
              Nom <input type="text" name="nom">
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
          <input type="submit"  name="submitInscription">
        </form>
      </div> 
    </div>
  </section>
  
      

  <?php
  if (isset($_POST["submitInscription"])) {
    if ($resultat) {
      echo "Bienvenue";
    }else{
  echo "Erreur";

    }
  }
  ?>


</body>
</html>
