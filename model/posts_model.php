<?php

/**
 * MODELE POUR LES POSTS.
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
require_once 'conection_db.php';

/**
 * Posts_model class
 *
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
class PostsModel
{

    private $_db;
    private $_posts = [];

    /**
     * Constructeur qui va se connecter a la bd.
     *
     * @return void
     */
    public function __construct()
    {



        $this->db = Conectdb::conection();
    }
    /**
     * Permit add post
     * 
     * @param string $posts données du post
     * 
     * @return boolean
     */
    public function addPost(Posts $posts)
    {


        $addpost = $this->db->prepare(
            'INSERT INTO posts (auteur, titre, chapo, contenu, created_at,'
            . ' updated_at) VALUES (:auteur, :titre, :chapo, :contenu, NOW(), NOW())'
        );
        $addpost->bindValue(':auteur', $posts->getAuteur());
        $addpost->bindValue(':titre', $posts->getTitre());
        $addpost->bindValue(':chapo', $posts->getChapo());
        $addpost->bindValue(':contenu', $posts->getContenu());
        $addpost->execute();
        $addpost->closeCursor();
        return $addpost;
    }
    /**
     * Permit get post
     * 
     * @param int $id identification du post
     * 
     * @return array
     */
    public function getPost(int $id)
    {

        $request = $this->db->prepare(
            'SELECT id, titre, auteur, titre, chapo, contenu, '
                . 'DATE_FORMAT(created_at, "%d/%m/%Y à %Hh%i") '
                . 'AS created_at, DATE_FORMAT'
            . '(updated_at, "%d/%m/%Y à %Hh%i") AS updated_at '
                . 'FROM posts WHERE id = ?'
        );
        $request->execute(array($id));
        $line = $request->rowCount();
        if ($line > 0) {
            $tab = $request->fetch(PDO::FETCH_ASSOC);


            $post = new Posts($tab);

            return $post;
        } else {
            throw new Exception("Aucun post ne correspond à l'identifiant '$id'");
        }
    }
    /**
     * Permit getall post
     *
     * @return array
     */
    public function getPosts()
    {
        $posts = [];
        $request = $this->db->query(
            'SELECT id, titre, chapo, DATE_FORMAT'
                . '(created_at, "%d/%m/%Y à %Hh%i") AS created_at, DATE_FORMAT'
                . '(updated_at, "%d/%m/%Y à %Hh%i") AS updated_at '
            . 'FROM posts ORDER BY updated_at DESC, id DESC'
        );
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Posts($datas);
        }
        $request->closeCursor();
        return $posts;
    }
    /**
     * Permit edit post
     * 
     * @param string $posts données du post
     * 
     * @return boolean
     */
    public function editPost(Posts $posts)
    {
        $addpost = $this->db->prepare(
            'UPDATE posts SET auteur= :auteur, '
                . 'titre= :titre, chapo= :chapo, contenu= :contenu, '
            . 'updated_at= NOW() WHERE id = :id'
        );

        $addpost->bindValue(':auteur', $posts->getAuteur());
        $addpost->bindValue(':titre', $posts->getTitre());
        $addpost->bindValue(':chapo', $posts->getChapo());
        $addpost->bindValue(':contenu', $posts->getContenu());
        $addpost->bindValue(':id', $posts->getId());
        $addpost->execute();
        $addpost->closeCursor();



        return $addpost;
    }
    /**
     * Permit delete post
     * 
     * @param int $id identification du post
     * 
     * @return boolean
     */
    public function deletePost(int $id)
    {
        $delete = $this->db->prepare('DELETE FROM posts WHERE id= :id');
        $delete->bindValue(':id', $id);
        $result = $delete->execute();
        $delete->closeCursor();

        return $result;
    }

}
