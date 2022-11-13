<?php 
require __DIR__."/classes/pdo.php";
require __DIR__."/classes/session.php";





if(isset($_POST["submitConnexion"])){

    $query = $pdo->prepare("SELECT `id`, `email`, `mdp` FROM `utilisateur` WHERE email = :email");
    $query->bindValue(':email',$_POST["email"],PDO::PARAM_STR);
    $query->execute();
    $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
   

    if ($utilisateur) {
        $hash = $utilisateur['mdp'];

        if (password_verify($_POST['mdp'] ,$hash)) {
            echo "Mots de passe  valide";
            header('Location: index.php');
            $_SESSION["id_utilisateur"] = $utilisateur["id"];
            $_SESSION["email_utilisateur"] = $utilisateur["email"];


        } else {
            echo "Mots de passe non valide";
        }
    }else {
        echo "utilisateur non valide";
    }

   

   


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
    
<div>
    <form action="" method="post">
    <label for=""> Connexion</label>

   

    <label for="">
      Email  <input type="text" name="email">
    </label>

    <label for="">
      Mot de passe  <input type="text" name="mdp">
    </label>
    <input type="submit"  name="submitConnexion">
   </form>

   <?php



?>


</body>
</html>
