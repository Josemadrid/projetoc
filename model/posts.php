<?php

require_once 'model/posts_model.php';
require_once 'model/hydrate.php';

class Posts
{
    private $id;
    private $auteur;
    private $titre;
    private $chapo;
    private $contenu;
    private $created_at;
    private $updated_at;

    use Hydrate;
    // CONSTRUCTOR
    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }



    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getChapo()
    {
        return $this->chapo;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    // SETTERS
    public function setId($id)
    {
        $this->id = (int)$id;
    }

    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function setCreated_at($created_at)
    {
        
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}
