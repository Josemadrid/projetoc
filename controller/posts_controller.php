<?php
require_once ('model/conection_db.php');
require_once ('model/posts_model.php');
require_once  'model/posts.php';
require_once ('model/commentaire_model.php');
require_once  ('model/commentaires.php');


class Posts_Controller{

	private $manager;
    private $comment;
	

	public function __construct(){

		$this->manager = new Posts_model();
        $this->comment = new Commentaire_model();
		
	}

	public function add(array $posts)
    {
    	

        if (!empty($posts))
        {
        	
            $datas['auteur'] = $posts['auteur'];
            $datas['titre'] = $posts['titre'];
            $datas['chapo'] = $posts['chapo'];
            $datas['contenu'] = $posts['contenu'];

            $posts = new Posts($datas);
            
            $result = $this->manager->add_post($posts);
            if($result)
            {
                header('Location: /projetoc/?action=listposts');
            }
        }
        
    }
    public function viewadd()
    {
    	include 'view/creerpost.php';
    }

  

    public function viewpost($id)
    {
    	$post = $this->manager->getPost($id);

        $comment = $this->comment->getComment($id);

        
    	include 'view/postview.php';


    }

    public function listposts()
    {
    	$posts = $this->manager->getPosts();
    	include 'view/listposts.php';
    }

    public function edit($id, array $posts)
    {
 
    		   
        	
            $datas['auteur'] = $posts['auteur'];
            $datas['titre'] = $posts['titre'];
            $datas['chapo'] = $posts['chapo'];
            $datas['contenu'] = $posts['contenu'];
            $datas['id'] = $id;
            

            $posts = new Posts($datas);

            
            $result = $this->manager->editPost($posts);
            if($result)
            {
                header('Location:index.php?action=viewsinglepost&id=' . $posts->getId());
            }
        


    }
    public function viewedit($id)
    {
    	$post = $this->manager->getPost($id);
    	include 'view/editview.php';
    }

    public function viewdelete($id)
    {
    	$post = $this->manager->getPost($id);
    	include 'view/viewdelete.php';
    }

    public function delete($id)
    {
    	
        
        if(!empty($_POST['id']))
        {
            $id = $_POST['id'];
            $result = $this->manager->deletePost($id);
            if($result)
            {
                header('Location: index.php?action=listposts');
            }
        }
    }

    
} 