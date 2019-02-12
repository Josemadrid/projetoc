<?php
/**
 * CONTROLLEUR POUR UTILISATEUR.
 * 
 * PHP version 7.2.4
 * 
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
require_once 'model/conection_db.php';
require_once 'model/utilisateur_model.php';
require_once  'model/utilisateurs.php';


/**
 * Controller utilisateur class
 *
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
class Utilisateur_Controlleur
{

    private $_Utilisateurmanageur;

    /**
     * Constructeur qui va appeler le model des utilisateurs
     *
     * @return void
     */
    public function __construct()
    {

        $this->utilisateurmanageur = new Utilisateur_model();
    }

    /**
     * Permit to get view inscription or connect
     *
     * @param array $token sécurité CSRF
     * 
     * @return void
     */
    public function viewconnection($token)
    {
        $_SESSION['token'] = $token;
        include 'view/viewinscription.php';
    }
    /**
     * Permit add users
     * 
     * @param array $user contien les données des utilisateurs
     * 
     * @return void
     */
    public function inscription(array $user)
    {

        if (!empty($user) && $user['password'] == $user['confirmpassword']) {
            $datas['pseudo'] = $user['pseudo'];
            $datas['email'] = $user['email'];
            $datas['password'] = hash('sha256', $user['password']);
            
          
            $users = new Utilisateur($datas);

            $result = $this->utilisateurmanageur->add_utilisateur($users);

            if ($result) {

                header('Location: /projetoc/?action=home');
            }

        } else {
            header('Location: /projetoc/?action=connection');
        }
        
            
        

    }
    /**
     * Permit to connection users
     *
     * @param array $users recupére les données des utilisateurs
     * 
     * @return void
     */
    public function connection(array $users)
    {
 
               
            
           $datas['pseudo'] = $users['pseudo'];
           $datas['password'] = hash('sha256', $users['password']);
            
            

           $users = new Utilisateur($datas);

            
           $result = $this->utilisateurmanageur->connect($users);
            
        if ($result) {

            $users->hydrate($result);
            $_SESSION['user'] = $users;
                
            if ($_SESSION['user']->getRole() == 2) {
                   header('Location: /projetoc/?action=admin&adminaction=accueil');
            } else {
                
                header('Location: /projetoc/?action=home'); 
            }
                

        } else {
            
            header('Location: /projetoc/?action=connection');
        }
            
        


    
        

    }

    

    





}
