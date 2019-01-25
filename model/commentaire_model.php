<?php
require_once('conection_db.php');
require_once 'model/utilisateurs.php';


class Commentaire_model
{


	private $db;
	private $comment=[];

	public function __construct()
    {

		

		$this->db=Conectdb::conection();

		


	}

public function add_comment(Commentaire $comment)
    {

    	
    	$addcomment = $this->db->prepare('INSERT INTO commentaires (post_id, utilisateur_id, contenu_commentaire, datecreation_commentaire, datemodification_commentaire) VALUES (:post_id, :session_id, :contenu_commentaire, NOW(), NOW())');
        $addcomment->bindValue(':post_id', $comment->getPost_id());
        $addcomment->bindValue(':session_id', $_SESSION['user']->getId());
        $addcomment->bindValue(':contenu_commentaire', $comment->getContenu_commentaire());
        $addcomment->execute();
        $addcomment->closeCursor();

        return $addcomment;

	}

public function getComment($id)
{
        $comment = [];
        $request = $this->db->prepare('SELECT commentaires.id, contenu_commentaire, DATE_FORMAT(datecreation_commentaire, "%d/%m/%Y à %Hh%i") AS datecreation_commentaire, DATE_FORMAT(datemodification_commentaire, "%d/%m/%Y à %Hh%i") AS datemodification_commentaire, pseudo FROM commentaires, utilisateurs WHERE post_id = :id AND utilisateurs.id=commentaires.utilisateur_id AND commentaires.valid=1 ORDER BY commentaires.id DESC');
        $request->execute(['id'=> $id]);
        while ($datas = $request->fetch(PDO::FETCH_ASSOC))
        {
        	$datas['utilisateur'] = new Utilisateur($datas);
            $comment[] = new Commentaire($datas);
        }
        $request->closeCursor();

        
        return $comment;
    }

public function getUnvalidated()
{
	$comment = [];
	$request = $this->db->prepare('SELECT * FROM commentaires WHERE valid = 0 LIMIT 5');
	$request->execute();
	while ($datas = $request->fetch(PDO::FETCH_ASSOC))
        {
        	$datas['utilisateur'] = new Utilisateur($datas);
            $comment[] = new Commentaire($datas);
        }
        $request->closeCursor();

        
        return $comment;

}

public function getAllcomments()
{
	$comment = [];
	$request = $this->db->prepare('SELECT * FROM commentaires WHERE valid = 0');
	$request->execute();
	while ($datas = $request->fetch(PDO::FETCH_ASSOC))
        {
        	$datas['utilisateur'] = new Utilisateur($datas);
            $comment[] = new Commentaire($datas);
        }
        $request->closeCursor();

        
        return $comment;
}

public function valid($id)
{	
	$request = $this->db->prepare('UPDATE commentaires SET valid = 1 WHERE id = :id');
	$request->execute(['id'=> $id]);
	 return $request->rowCount() > 0;

}
public function ifexist($id)
{
	$request = $this->db->prepare('SELECT * FROM commentaires WHERE id = :id');
	 $request->execute(['id'=> $id]);
	 return $request->rowCount() > 0;

}

public function delete($id)
{
	$request = $this->db->prepare('DELETE  FROM commentaires WHERE id = :id');
	 
	 return $request->execute(['id'=> $id]);
}

  



}