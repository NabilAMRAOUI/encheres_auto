<?php
require __DIR__.'/pdo.php';

class Utilisateur {

    private string $nom;
    private string $prenom;
    private string $email;
    private string $mdp;
    

    public function __construct(string $nom,string $prenom,string $email,string $mdp)
    {
        
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    public function insertUtilisateurs($pdo) {
        $query7 = $pdo->prepare("INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `mdp`) VALUES (:nom, :prenom, :email, :mdp)");
        $query7->bindValue(':nom',$this->nom,PDO::PARAM_STR);
        $query7->bindValue(':prenom',$this->prenom,PDO::PARAM_STR);
        $query7->bindValue(':email',$this->email,PDO::PARAM_STR);
        $query7->bindValue(':mdp', password_hash($this->mdp, PASSWORD_DEFAULT) ,PDO::PARAM_STR);
        return $query7->execute();
    
        
    }


}




?>