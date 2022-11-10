<?php
require __DIR__.'/pdo.php';
require __DIR__.'/utilisateurs.php';

class Voiture {

    protected string $modele;
    protected string $marque;
    protected string $puissance;
    protected int $annee;
    protected string $description;
    protected int $utilisateur_id;

    public function __construct($modele,$marque,$puissance,$annee,$description,$utilisateur_id)
    {
        $this->modele = $modele;
        $this->marque = $marque;
        $this->puissance = $puissance;
        $this->annee = $annee;
        $this->description = $description;
        $this->utilisateur_id = $utilisateur_id;
    }

    public function insert($pdo) {

             $query3 = $pdo->prepare("INSERT INTO `voiture` (`modele`, `marque`, `puissance`, `annee`,`description`,`utilisateur_id`) VALUES (:modele, :marque, :puissance, :annee, :description, :utilisateur_id);");
            $query3->bindValue(':modele',$this->modele,PDO::PARAM_STR);
            $query3->bindValue(':marque',$this->marque,PDO::PARAM_STR);
            $query3->bindValue(':puissance',$this->puissance,PDO::PARAM_STR);
            $query3->bindValue(':annee',$this->annee,PDO::PARAM_INT);
            $query3->bindValue(':description',$this->description,PDO::PARAM_STR);
            $query3->bindValue(':utilisateur_id',$this->utilisateur_id,PDO::PARAM_INT);
            $resultat = $query3->execute();
            
            return $resultat;
        
    }

}

        

?>