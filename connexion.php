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
    <link rel="stylesheet" href="Css\style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php require __DIR__."/classes/navBar.php" ?>
    </header>
<div>
    <form action="" method="post">
    <label for=""> Inscription</label>

    <label for="">
        Nom <input type="text" name="nom">
    </label>

    <label for="">
      Prénom   <input type="text" name="prenom">
    </label>

    <label for="">
      Email  <input type="text" name="email">
    </label>

    <label for="">
      Mot de passe  <input type="text" name="mdp">
    </label>
    <input type="submit"  name="submitInscription">
   </form>

   <?php
if (isset($_POST["submitInscription"])) {
  if ($resultat) {
    echo "Bienvenue";
  }else{
echo "Erreur";

  }
}
?>


</div>
</body>
</html>
