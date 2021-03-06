<?php

/**
 * CONTROLLEUR POUR ADMIN.
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
require_once 'model/commentaire_model.php';
require_once 'model/commentaires.php';

//
//Controller admin class
//
//@category Controlleur
//@package  Controlleur
//@author   Name <mail@mail.com>
//@license  https://fr.wikipedia.org/wiki/Licence_MIT 
//@version  GIT: Release: 1.0.0
//@link     URL Documentation

class AdminControlleur
{
    private $admin;

    //
    //Constructeur qui va appeler le model des commentaires
    //
  //@return void

    public function __construct()
    {


        $this->admin = new Commentaire_model();
    }

    //
    //Permit to get view accueil
    //
  //@return void

    public function accueil($token)
    {
        

        include 'view/accueil.php';
    }

    //
    //Permit add comment
    //
  //@param array $comment les données du commentaire
    //
  //@return void

    public function add(array $comment)
    {



        if (!empty($comment)) {


            $datas['contenuCommentaire'] = $comment['Message'];
            $datas['postId'] = $comment['postId'];
            $datas['UtilisateurId'] = $_SESSION['user']->getId();





            $comment = new Commentaire($datas);



            $result = $this->admin->addcomment($comment);
            if ($result) {
                header(
                        'Location:index.php?'
                        . 'action=viewsinglepost&id=' . $comment->getPostId()
                );
            }
        }
    }

    //
    //Permit to list all comments
    //
  //@return void

    public function listcomment()
    {


        $comment = $this->admin->getComment();
        include 'view/postview.php';
    }

    //
    //Permit to get 5 unvalidated comments in view admin
    //
  //@return void

    public function viewadmin()
    {

        $comment = $this->admin->getUnvalidated();


        include 'view/viewadmin.php';
    }

    //
    //Permit to get all unvalidated comments in view admin
    //
  //@return void

    public function unvalidatedcomments()
    {

        $comment = $this->admin->getAllcomments();

        include 'view/viewadmin.php';
    }

    //
    //Permit to valid a comment
    //
  //@param int $id identifient du commentaire
    //
  //@return void

    public function validcomment(int $id)
    {


        if ($this->admin->ifexist($id)) {
            $this->admin->valid($id);
        }

        header('Location:/projetoc/index.php?action=admin&adminaction=viewadmin');
    }

    //
    //Permit to delete a comment
    //
  //@param int $id identifient du commentaire
    //
  //@return void

    public function deletecomment(int $id)
    {

        if ($this->admin->ifexist($id)) {
            $this->admin->delete($id);
        }

        header('Location:/projetoc/index.php?action=admin&adminaction=viewadmin');
    }

}
