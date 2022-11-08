<?php

$query3 = $pdo->prepare("SELECT * FROM `utilisateur` ORDER BY nom ASC");

$query3->execute();

$utilisayeurs = $query3->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["submitVoiture"])){
    

    $query3 = $pdo->prepare("INSERT INTO `voiture` (`modele`, `marque`, `puissance`, `annee`, `description`, `utilisateur_id`) VALUES (':modele', ':marque', ':puissance', ':annee', ':description', ':utilisateur_id');");
    $query3->bindValue(':modele',$_POST["modele"],PDO::PARAM_STR);
    $query3->bindValue(':marque',$_POST["marque"],PDO::PARAM_STR);
    $query3->bindValue(':puissance',$_POST["puissance"],PDO::PARAM_STR);
    $query3->bindValue(':annee',$_POST["annee"],PDO::PARAM_STR);
    $query3->bindValue(':description',$_POST["description"],PDO::PARAM_STR);
    $query3->bindValue(':utilisateur_id',$_POST["utilisateur_id"],PDO::PARAM_INT);
    $resultat3 = $query3->execute();

    var_dump($resultat3);
}

?>