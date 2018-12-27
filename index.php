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
		
		elseif ($_GET['action'] == 'addpost')
		{
			if ($_SERVER['REQUEST_METHOD'] == 'GET'){
				$instance->viewadd();
			}
				elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				

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
	}
		elseif ($_GET['action'] == 'listposts') 
		{
            
                $instance->listposts();
        }
        
    
        elseif ($_GET['action'] == 'viewsinglepost')
		{
			if (isset($_GET['id']) && $_GET['id'] > 0)
			{
				
				$instance->viewpost($_GET['id']);
			}
			
			else{
				header('Location: /projetoc/?action=listposts');
			}
		}
		elseif ($_GET['action'] == 'editpost')
		{
			if ($_SERVER['REQUEST_METHOD'] == 'GET')
			{
				$instance->viewedit($_GET['id']);
			}
			elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			if (isset($_GET['id']) && $_GET['id'] > 0)
			{
				
				$instance->edit($_GET['id'], $_POST);
			}
			else
			{
				header('Location: /projetoc/?action=listposts');
			}
			}
		}
		elseif ($_GET['action'] == 'delete')
		{
			if ($_SERVER['REQUEST_METHOD'] == 'GET')
			{
				
				$instance->viewdelete($_GET['id']);
			}
			elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			if (isset($_GET['id']) && $_GET['id'] > 0)
			{
				
				$instance->delete($_GET['id'], $_POST);
			}
			else
			{
				header('Location: /projetoc/?action=listposts');
			}
			}
		}


	}
else {
	
		require 'view/accueil.php';
		
	}

}
catch(Exception $e){
	echo $e->getMessage();
}


