<?php
require 'controller/home.php';
require 'controller/listposts.php';
require 'controller/posts_controller.php';
require 'vendor/autoload.php';


$instance = new Posts_controller();

try{
	if(isset($_GET['action']))
	{
		if ($_GET['action'] == 'home')
		{
			home();
		}
		elseif ($_GET['action'] == 'mail')
		{
			

			if(isset($_POST['prenom']) && !empty(trim($_POST['prenom'])))
			{ 
				if(isset($_POST['email']) && !empty(trim($_POST['email'])))
				{
					if(isset($_POST['telephone']) && !empty(trim($_POST['telephone'])))
						{
							if(isset($_POST['message']) && !empty(trim($_POST['message'])))
							{
								email();

							}
						}
				}
			}
		}
		elseif ($_GET['action'] == 'creerpost')
		{
			
			$instance->view();
		}
		elseif ($_GET['action'] == 'addpost')
		{
			

			if(isset($_POST['auteur']) && !empty(trim($_POST['auteur'])))
			{ 
				if(isset($_POST['titre']) && !empty(trim($_POST['titre'])))
				{
					if(isset($_POST['chapo']) && !empty(trim($_POST['chapo'])))
						{
							if(isset($_POST['contenu']) && !empty(trim($_POST['contenu'])))
							{

								$instance->add($_POST);


							}
						}
				}
			}
		}
		elseif ($_GET['action'] == 'listposts') 
		{
            
                listposts();
        }
        
        elseif ($_GET['action'] == 'singlepost')
        {
        	singlepost();
        }


	}
else {
	
		require 'view/accueil.php';
		
	}

}
catch(Exception $e){
	echo 'Erreur';
}


//$instance = new Posts_controller();
			//$instance->add();