<?php
require_once('conection_db.php');

class Posts_model{


	private $db;
	private $posts=[];

	public function __construct(){

		

		$this->db=Conectdb::conection();
		


	}

	public function add_post(Posts $posts){


    	$addpost = $this->db->prepare('INSERT INTO posts (auteur, titre, chapo, contenu, created_at, updated_at) VALUES (:auteur, :titre, :chapo, :contenu, NOW(), NOW())');
        $addpost->bindValue(':auteur', $posts->getAuteur());
        $addpost->bindValue(':titre', $posts->getTitre());
        $addpost->bindValue(':chapo', $posts->getChapo());
        $addpost->bindValue(':contenu', $posts->getContenu());
        $addpost->execute();
        $addpost->closeCursor();
        return $addpost;

	}

	public function getPost($id)
    {
        
            $request = $this->db->prepare('SELECT id, titre, auteur, titre, chapo, contenu, DATE_FORMAT(created_at, "%d/%m/%Y à %Hh%i") AS created_at, DATE_FORMAT(updated_at, "%d/%m/%Y à %Hh%i") AS updated_at FROM posts WHERE id = ?');
            $request->execute(array($id));
            $line = $request->rowCount();
            if ($line > 0){
                $tab = $request->fetch(PDO::FETCH_ASSOC);
                

                $post= new Posts($tab);
                
                return $post;

            }
            else
            {
            throw new Exception("Aucun post ne correspond à l'identifiant '$id'");
            }


    }

    public function getPosts()
    {
        $posts = [];
        $request = $this->db->query('SELECT id, titre, chapo, DATE_FORMAT(created_at, "%d/%m/%Y à %Hh%i") AS created_at, DATE_FORMAT(updated_at, "%d/%m/%Y à %Hh%i") AS updated_at FROM posts ORDER BY updated_at DESC, id DESC');
        while ($datas = $request->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Posts($datas);
        }
        $request->closeCursor();
        return $posts;
    }

    public function editPost( Posts $posts)
    {
        $addpost = $this->db->prepare('UPDATE posts SET auteur= :auteur, titre= :titre, chapo= :chapo, contenu= :contenu, updated_at= NOW() WHERE id = :id');

        $addpost->bindValue(':auteur', $posts->getAuteur());
        $addpost->bindValue(':titre', $posts->getTitre());
        $addpost->bindValue(':chapo', $posts->getChapo());
        $addpost->bindValue(':contenu', $posts->getContenu());
        $addpost->bindValue(':id', $posts->getId());
        $addpost->execute();
        $addpost->closeCursor();



        return $addpost;
    }  

    public function deletePost($id)
    {
        $delete = $this->db->prepare('DELETE FROM posts WHERE id= :id');
        $delete->bindValue(':id', $id);
        $delete->execute();
        $delete->closeCursor();
        return true;
    }
            
            
        




 



}