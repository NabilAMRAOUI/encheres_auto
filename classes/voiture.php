<?php
require __DIR__.'/utilisateurs.php';
require __DIR__."/session.php";


if(isset($_POST["submitVoiture"])){
    

    $query5 = $pdo->prepare("INSERT INTO `voiture` ( `modele`, `marque`, `puissance`, `annee`, `description`, `utilisateur_id`) VALUES (:modele,:marque,:puissance,:annee,:description,:id_utilisateur)");
    $query5->bindValue(':modele',$_POST["modele"],PDO::PARAM_INT);
    $query5->bindValue(':marque',$_POST["marque"],PDO::PARAM_STR);
    $query5->bindValue(':puissance',$_POST["puissance"],PDO::PARAM_STR);
    $query5->bindValue(':annee',$_POST["annee"],PDO::PARAM_INT);
    $query5->bindValue(':description',$_POST["description"],PDO::PARAM_STR);
    $query5->bindValue(':id_utilisateur',$_SESSION["id_utilisatateur"],PDO::PARAM_INT);
   
    $resultat5 = $query5->execute();
    

}

?>