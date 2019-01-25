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
                header('Location:index.php?action=viewsinglepost&id=' . $comment->getPost_id());
            }
        }
        
    }

   	public function listcomment()
    {
    	
    	$comment = $this->admin->getComment();
    	include 'view/postview.php';
    }

    public function viewadmin()
	{
		$comment = $this->admin->getUnvalidated();

		
		include 'view/viewadmin.php';
		
	}
	public function unvalidatedcomments()
	{
		$comment = $this->admin->getAllcomments();
		
		include 'view/viewadmin.php';
	}
	public function validcomment($id)
	{
		
		if($this->admin->ifexist($id))
		{
			 $this->admin->valid($id);
		}
		
		header('Location:/projetoc/index.php?action=admin&adminaction=viewadmin' );

	}
	public function deletecomment($id)
	{
		if($this->admin->ifexist($id))
		{
			 $this->admin->delete($id);
		}
		
		header('Location:/projetoc/index.php?action=admin&adminaction=viewadmin' );
	}











}
