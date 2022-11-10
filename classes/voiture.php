<?php
require __DIR__.'/utilisateurs.php';

$query3 = $pdo->prepare("SELECT * FROM `voiture` ORDER BY marque ASC");
$query3->execute();

$resultat = $query3->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["submitVoiture"])){
    

    $query3 = $pdo->prepare("INSERT INTO `voiture` (`modele`, `marque`, `puissance`, `annee`,`description`,`utilisateur_id`) VALUES (:modele, :marque, :puissance, :annee, :description, :utilisateur_id);");
    $query3->bindValue(':modele',$_POST["modele"],PDO::PARAM_STR);
    $query3->bindValue(':marque',$_POST["marque"],PDO::PARAM_STR);
    $query3->bindValue(':puissance',$_POST["puissance"],PDO::PARAM_STR);
    $query3->bindValue(':annee',$_POST["annee"],PDO::PARAM_INT);
    $query3->bindValue(':description',$_POST["description"],PDO::PARAM_STR);
    $resultat = $query3->execute();
    
    var_dump($resultat);
}

?>