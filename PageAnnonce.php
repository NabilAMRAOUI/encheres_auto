<?php 
require __DIR__."/classes/pdo.php";

if (isset($_GET["id"])){

    $query = $pdo->prepare("SELECT * FROM annonce WHERE id=:id");
    $query->bindValue(':id',$_GET["id"],PDO::PARAM_INT);
    $query->execute();

    $annonce = $query->fetch(PDO::FETCH_ASSOC);



} else {
    echo "Erreur de parametre url manquant";
    
}

$query1 = $pdo->prepare("SELECT * FROM annonce");

$query1->execute();

$annonces = $query1->fetchAll(PDO::FETCH_ASSOC);


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
    <header>
        <?php require __DIR__."/classes/navBar.php" ?>
    </header>

    <ul>
        <li>
         <?= 
            $annonce['prix-depart']; 
            $annonce['date-fin'] 
          ?>
        </li>
    </ul>


    
</body>
</html>