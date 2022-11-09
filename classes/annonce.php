<?php

$query1 = $pdo->prepare("SELECT * FROM `voiture` ORDER BY marque ASC");

$query1->execute();

$voitures = $query1->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["submitAnnonce"])){

    $query = $pdo->prepare("INSERT INTO `annonce` (`prix-depart`, `date-fin`,voiture_id) VALUES (:prixDepart,:dateFin,:voiture_id)");
    $query->bindValue(':prixDepart',$_POST["prixDepart"],PDO::PARAM_INT);
    $query->bindValue(':dateFin',$_POST["dateFin"],PDO::PARAM_STR);
    $query->bindValue(':voiture_id',$_POST["voiture_id"],PDO::PARAM_INT);
    $resultat = $query->execute();

    

}

?>









