<?php
/**
 * MODEL POUR LES COMMENTAIRE.
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
require_once 'model/utilisateurs.php';

/**
 * Model Commentaire class
 *
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
class Commentaire_Model
{


    private $_db;
    private $_comment=[];
    /**
     * Constructeur qui va se connecter a la bd.
     *
     * @return void
     */
    public function __construct()
    {

        

        $this->db=Conectdb::conection();

        


    }
    /**
     * Permit add comment
     * 
     * @param string $comment données du comment
     * 
     * @return boolean
     */
    public function addcomment(Commentaire $comment): bool
    {

        
        $addcomment = $this->db->prepare(
            'INSERT INTO commentaires (post_id, utilisateur_id, contenu_commentaire,'
                . ' datecreation_commentaire, datemodification_commentaire)'
            . ' VALUES (:post_id, :session_id, :contenu_commentaire, NOW(), NOW())'
        );
        $addcomment->bindValue(':post_id', $comment->getPostId());
        $addcomment->bindValue(':session_id', $_SESSION['user']->getId());
        $addcomment->bindValue(
            ':contenu_commentaire', 
            $comment->getContenuCommentaire()
        );
        $result = $addcomment->execute();
        $addcomment->closeCursor();

        return $result;

    }
    /**
     * Permit get comment
     * 
     * @param int $id identifiant du commentaire
     * 
     * @return array
     */
    public function getComment(int $id): array
    {
        $comment = [];
        $request = $this->db->prepare(
            'SELECT commentaires.id, contenu_commentaire AS ContenuCommentaire, DATE_FORMAT'
             . '(datecreation_commentaire, "%d/%m/%Y à %Hh%i")'
             . ' AS DatecreationCommentaire, DATE_FORMAT'
             . '(datemodification_commentaire, "%d/%m/%Y à %Hh%i")'
             . ' AS DatemodificationCommentaire, pseudo '
             . 'FROM commentaires, utilisateurs '
             . 'WHERE post_id = :id AND utilisateurs.id=commentaires.utilisateur_id'
             . ' AND commentaires.valid=1 '
             . 'ORDER BY commentaires.id DESC'
        );
        $request->execute(['id'=> $id]);
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
        
            $datas['utilisateur'] = new Utilisateur($datas);
            $comment[] = new Commentaire($datas);
        }
        $request->closeCursor();

        
        return $comment;
    }
    /**
     * Permit get unvalidated comments
     *
     * @return array
     */
    public function getUnvalidated()
    {
        $comment = [];
        $request = $this->db->prepare(
            'SELECT *,contenu_commentaire AS ContenuCommentaire FROM commentaires '
            . 'WHERE valid = 0 LIMIT 5'
        );
        $request->execute();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
        
            $datas['utilisateur'] = new Utilisateur($datas);
            $comment[] = new Commentaire($datas);
        }
        $request->closeCursor();
        
        
        return $comment;

    }
    /**
     * Permit get all comments
     *
     * @return $comment
     */
    public function getAllcomments()
    {
        $comment = [];
        $request = $this->db->prepare('SELECT *,contenu_commentaire AS ContenuCommentaire FROM commentaires WHERE valid = 0');
        $request->execute();
        while ($datas = $request->fetch(PDO::FETCH_ASSOC)) {
        
            $datas['utilisateur'] = new Utilisateur($datas);
            $comment[] = new Commentaire($datas);
        }
        $request->closeCursor();

        
        return $comment;
    }
    /**
     * Permit validated comment
     * 
     * @param int $id identifient commentaire
     * 
     * @return line affected
     */
    public function valid(int $id): bool
    {    
        $request = $this->db->prepare(
            'UPDATE commentaires '
            . 'SET valid = 1 WHERE id = :id'
        );
        $request->execute(['id'=> $id]);
        return $request->rowCount() > 0;

    }
    /**
     * Permit see a comment only if exist
     * 
     * @param int $id identifient commentaire
     * 
     * @return line affected
     */
    public function ifexist(int $id): bool
    {
        $request = $this->db->prepare('SELECT * FROM commentaires WHERE id = :id');
        $request->execute(['id'=> $id]);
        return $request->rowCount() > 0;

    }
    /**
     * Permit delete comment
     * 
     * @param int $id identifient commentaire
     * 
     * @return bool
     */
    public function delete(int $id): bool
    {
        $request = $this->db->prepare('DELETE  FROM commentaires WHERE id = :id');
     
        return $request->execute(['id'=> $id]);
    }

  



}
