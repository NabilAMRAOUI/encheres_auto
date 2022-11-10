<?php
require __DIR__."/session.php";




if(isset($_POST["submitEnchere"])){
    

    $query4 = $pdo->prepare("INSERT INTO `enchere` (`prix-propose`, `date`,`utilisateur_id`,`annonce_id`) VALUES (:prixPropose,:dateD,:utilisateurId,:annonceId)");
    $query4->bindValue(':prixPropose',$_POST["prixPropose"],PDO::PARAM_INT);
    $query4->bindValue(':dateD',$_POST["dateD"],PDO::PARAM_STR);
    $query4->bindValue(':utilisateurId',$_SESSION["id_utilisateur"],PDO::PARAM_INT);
    $query4->bindValue(':annonceId',$_GET["id"],PDO::PARAM_INT);
    $resultat4 = $query4->execute();
    

}

?>
