<?php
require_once 'conection_db.php';

class Utilisateur_Model
{


    private $db;
    private $user=[];

    public function __construct()
    {

        

        $this->db=Conectdb::conection();
        


    }


    public function add_utilisateur(Utilisateur $user)
    {


        $add_utilisateur = $this->db->prepare('INSERT INTO utilisateurs (pseudo, email, password) VALUES (:pseudo, :email, :password)');

        
        $add_utilisateur->bindValue(':pseudo', $user->getPseudo());
        $add_utilisateur->bindValue(':email', $user->getEmail());
        $add_utilisateur->bindValue(':password', $user->getPassword());
        $result = $add_utilisateur->execute();
        $add_utilisateur->closeCursor();
        
        return $result;

    }

    public function connect( Utilisateur $users)
    {    
        $userconect = $this->db->prepare('SELECT * FROM utilisateurs WHERE pseudo=:pseudo AND password=:password');

        $userconect->bindValue(':pseudo', $users->getPseudo());
        $userconect->bindValue(':password', $users->getPassword());
        $userconect->execute();
        

        if($userconect->rowCount() == 1) {    
            $result = $userconect->fetch(PDO::FETCH_ASSOC);
            
            return $result;
            
        }

        return false;


    } 

    public function connect_admin( Utilisateur $users)
    {
        $userconect = $this->db->prepare('SELECT * FROM utilisateurs WHERE pseudo=:pseudo AND password=:password');

        $userconect->bindValue(':pseudo', $users->getPseudo());
        $userconect->bindValue(':password', $users->getPassword());
        $userconect->execute();
        

        if($userconect->rowCount() == 1) {    
            $result = $userconect->fetch(PDO::FETCH_ASSOC);
            
            return $result;
            
        }

        return false;
    }   

}
