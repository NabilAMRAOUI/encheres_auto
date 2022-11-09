<?php

$query1 = $pdo->prepare("SELECT * FROM `voiture` ORDER BY marque ASC");

$query1->execute();

$voitures = $query1->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST["submitAnnonce"])){
  
    $query3 = $pdo->prepare("INSERT INTO `annonce`( `nom`, `prenom`, `email`,`mdp`) VALUES (:nom,:prenom,:email,:mdp)");
  $query3->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
  $query3->bindValue(':prenom', $_POST["prenom"],PDO::PARAM_STR);
  $query3->bindValue(':email', $_POST["email"],PDO::PARAM_STR);
  $query3->bindValue(':mdp', $_POST["mdp"],PDO::PARAM_STR);
  $resultat = $query3->execute();
  
  }






