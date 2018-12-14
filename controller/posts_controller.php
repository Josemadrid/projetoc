<?php
require_once ('model/conection_db.php');
require_once ('model/posts_model.php');
require_once  'model/posts.php';


class Posts_controller{

	private $manager;

	public function __construct(){

		$this->manager = new Posts_model();
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
            echo $posts->getAuteur();
            $result = $this->manager->add_post($posts);
            if($result)
            {
                header('Location: /projetoc/?action=home');
            }
        }
        
    }
    public function view()
    {
    	include 'view/creerpost.php';
    }
}
 