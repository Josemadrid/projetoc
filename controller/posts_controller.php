<?php

/**
 * CONTROLLEUR POUR LES POST.
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
require_once 'model/posts_model.php';
require_once  'model/posts.php';
require_once 'model/commentaire_model.php';
require_once  'model/commentaires.php';

/**
 * Controller Posts class
 *
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
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
     * @param array $posts garde les données des posts
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
     * @param array $token sécurité CSRF
     * 
     * @return void
     */
    public function viewadd($token)
    {
        $_SESSION['token'] = $token;
        include 'view/creerpost.php';
    }

  
    /**
     * Permit to get 1 post
     *
     * @param int   $id    indentifian du post
     * @param array $token sécurité CSRF
     * 
     * @return void
     */
    public function viewpost(int $id, $token)
    {
        
         $_SESSION['token'] = $token;
         
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
     * @param int   $id    identifient du post
     * @param array $posts données du post
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
     * @param int $id identifient du post
     * 
     * @return void
     */
    public function viewedit(int $id)
    {
        $post = $this->manager->getPost($id);
        include 'view/editview.php';
    }
    /**
     * Permit to get view delete post
     *
     * @param int $id identifient du post
     * 
     * @return void
     */
    public function viewdelete(int $id)
    {
        $post = $this->manager->getPost($id);
        include 'view/viewdelete.php';
    }
    /**
     * Permit to delete post
     *
     * @param int $id identifient du post
     * 
     * @return void
     */
    public function delete(int $id)
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
