<?php

$query2 = $pdo->prepare("SELECT * FROM `utilisateur` ORDER BY nom ASC");
$query2->execute();
$utilisateurs = $query2->fetchAll(PDO::FETCH_ASSOC);

$query3 = $pdo->prepare("SELECT * FROM `annonce`");
$query3->execute();
$annonces = $query3->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST["submitEnchere"])){
    

    $query2 = $pdo->prepare("INSERT INTO `enchere` (`prix-propose`, `date`,`utilisateur_id`,`annonce_id`) VALUES (:prixPropose,:dateD,:utilisateurId,:annonceId)");
    $query2->bindValue(':prixPropose',$_POST["prixPropose"],PDO::PARAM_INT);
    $query2->bindValue(':dateD',$_POST["dateD"],PDO::PARAM_STR);
    $query2->bindValue(':utilisateurId',$_POST["utilisateurId"],PDO::PARAM_INT);
    $query3->bindValue(':annonceId',$_POST["annonceId"],PDO::PARAM_INT);
    $resultat2 = $query2->execute();
    $resultat3 = $query3->execute();

}

?>
