<?php
require __DIR__.'/pdo.php';
$query3 = $pdo->prepare("SELECT * FROM `utilisateur` ORDER BY nom ASC");
$query3->execute();

$utilisateurs = $query3->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["submitInscription"])){
    

    $query3 = $pdo->prepare("INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `mdp`) VALUES (':nom', ':prenom', ':email', ':mdp');");
    $query3->bindValue(':nom',$_POST["nom"],PDO::PARAM_STR);
    $query3->bindValue(':prenom',$_POST["prenom"],PDO::PARAM_STR);
    $query3->bindValue(':email',$_POST["email"],PDO::PARAM_STR);
    $query3->bindValue(':mdp',$_POST["mdp"],PDO::PARAM_STR);
    $utilisateur = $query3->execute();

    var_dump($utilisateur);
}

?>