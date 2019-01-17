<?php

require_once ('model/conection_db.php');
require_once ('model/commentaire_model.php');
require_once  ('model/commentaires.php');

class AdminControlleur
{
	private $admin;
	

	public function __construct(){

		$this->admin = new Commentaire_model();
}

	public function accueil()
	{
		include 'view/accueil.php';
		
	}

	public function add(array $comment)
    {
    	

        if (!empty($comment))
        {
        	
            
            $datas['contenu_commentaire'] = $comment['Message'];
            $datas['post_id'] = $comment['postId'];
            

            $comment = new Commentaire($datas);
            
            
            $result = $this->admin->add_comment($comment);
            if($result)
            {
                header('Location: /projetoc/?action=listposts');
            }
        }
        
    }

   	public function listcomment()
    {
    	
    	$comment = $this->admin->getComment();
    	include 'view/postview.php';
    }











}
