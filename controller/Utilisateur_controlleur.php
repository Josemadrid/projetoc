<?php
require_once ('model/conection_db.php');
require_once ('model/utilisateur_model.php');
require_once  'model/utilisateurs.php';



class Utilisateur_Controlleur
{

	private $Utilisateurmanageur;

	public function __construct()
	{

		$this->utilisateurmanageur = new Utilisateur_model();
	}


	public function viewconnection()
    {
    	include 'view/viewinscription.php';
    }

    public function inscription(array $user)
    {

    	if (!empty($user) && $user['password'] == $user['confirmpassword'])
        {
    		$datas['pseudo'] = $user['pseudo'];
    		$datas['email'] = $user['email'];
            $datas['password'] = hash('sha256',$user['password']);
            
          
            $users = new Utilisateur($datas);

            $result = $this->utilisateurmanageur->add_utilisateur($users);

            if($result)
            {

                header('Location: /projetoc/?action=home');
            }

        }
        else
        {
            header('Location: /projetoc/?action=connection');
        }

    }

     public function connection(array $users)
    {
 
               
            
            $datas['pseudo'] = $users['pseudo'];
            $datas['password'] = hash('sha256',$users['password']);
            
            

            $users = new Utilisateur($datas);

            
            $result = $this->utilisateurmanageur->connect($users);
            
            if($result)
            {

                $users->hydrate($result);
                $_SESSION['user'] = $users;
                
                if($_SESSION['user']->getRole() == 2)
                {
                    header('Location: /projetoc/?action=admin&adminaction=accueil');
                }
                else
                {
                   header('Location: /projetoc/?action=home'); 
                }
                

            }
            
            else
            {
                header('Location: /projetoc/?action=connection');
            }


    
        

    }

    

    





}