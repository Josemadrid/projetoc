<?php

/**
 * CONTROLLEUR QUI VA PERMETRE DE GERER LES POSTS. 
 * PHP VERSION 5.1
 */
require_once 'model/conection_db.php';
require_once 'model/posts_model.php';
require_once  'model/posts.php';
require_once 'model/commentaire_model.php';
require_once  'model/commentaires.php';

/**
 * CLASS QUI VA PERMETRE DE GERER LES POSTS.
 *
 * @return void
 */
class Posts_Controller
{

    private $_manager;
    private $_comment;
    
    /**
     * Constructeur qui va appeler les model des commentaires et des posts
     *
     * @return void
     */
    public function __construct()
    {

        $this->manager = new Posts_model();
        $this->comment = new Commentaire_model();
        
    }
    /**
     * Permit to add post
     *
     * @param array $posts entité
     * 
     * @return void
     */
    public function add(array $posts)
    {
        

        if (!empty($posts)) {
            
            $datas['auteur'] = $posts['auteur'];
            $datas['titre'] = $posts['titre'];
            $datas['chapo'] = $posts['chapo'];
            $datas['contenu'] = $posts['contenu'];

            $posts = new Posts($datas);
            
            $result = $this->manager->add_post($posts);
            if ($result) {
                header('Location: /projetoc/?action=listposts');
            }
        }
        
    }
    /**
     * Permit to get view new post
     *
     * @return void
     */
    public function viewadd()
    {
        include 'view/creerpost.php';
    }

  
    /**
     * Permit to get 1 post
     *
     * @param int $id indentifian du post
     * 
     * @return void
     */
    public function viewpost($id)
    {
        $post = $this->manager->getPost($id);

        $comment = $this->comment->getComment($id);

        
        include 'view/postview.php';


    }
    /**
     * Permit to get all posts
     *
     * @return void
     */
    public function listposts()
    {
        $posts = $this->manager->getPosts();
        include 'view/listposts.php';
    }
    /**
     * Permit to modify post
     * 
     * @param int $id entité
     *
     * @return void
     */
    public function edit($id, array $posts)
    {
 
               
            
            $datas['auteur'] = $posts['auteur'];
            $datas['titre'] = $posts['titre'];
            $datas['chapo'] = $posts['chapo'];
            $datas['contenu'] = $posts['contenu'];
            $datas['id'] = $id;
            

            $posts = new Posts($datas);

            
            $result = $this->manager->editPost($posts);
        if ($result) {
            header('Location:index.php?action=viewsinglepost&id=' . $posts->getId());
        }
        


    }
    /**
     * Permit to modify post
     *
     * @param int $id entité
     * 
     * @return void
     */
    public function viewedit($id)
    {
        $post = $this->manager->getPost($id);
        include 'view/editview.php';
    }
    /**
     * Permit to get view delete post
     *
     * @param int $id entité
     * 
     * @return void
     */
    public function viewdelete($id)
    {
        $post = $this->manager->getPost($id);
        include 'view/viewdelete.php';
    }
    /**
     * Permit to delete post
     *
     * @param int $id entité
     * 
     * @return void
     */
    public function delete($id)
    {
        
        
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $result = $this->manager->deletePost($id);
            if ($result) {
                header('Location: index.php?action=listposts');
            }
        }
    }

    
} 
