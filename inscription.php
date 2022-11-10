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
    <link rel="stylesheet" href="Css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php require __DIR__."/classes/navBar.php" ?>
    </header>
<div>
    <form action="inscription.php" method="post">
    <label for="">Inscription</label>

    <label for="">
        Nom <input type="text"  name="nom">
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
  if ($nvUtilisateur) {
    echo "Bienvenue";
  }else{
echo "Erreur";

  }
}
?>


</div>
</body>
</html>
