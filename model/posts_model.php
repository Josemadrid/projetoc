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







}