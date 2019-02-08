<?php

require_once 'model/commentaire_model.php';
require_once 'model/hydrate.php';
require_once 'model/utilisateurs.php';


class Commentaire
{
    private $id;
    private $post_id;
    private $utilisateur_id;
    private $contenu_commentaire;
    private $datecreation_commentaire;
    private $datemodification_commentaire;
    private $valid;
    private $utilisateur;


    use Hydrate;
    // CONSTRUCTOR
    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);

        }
        
    }


    // GETTERS
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getPost_id()
    {
        return $this->post_id;
    }

    public function getUtilisateur_id()
    {
        return $this->utilisateur_id;
    }

    public function getContenu_commentaire()
    {
        return $this->contenu_commentaire;
    }

    public function getDatecreation_commentaire()
    {
        return $this->datecreation_commentaire;
    }

    public function getDatemodification_commentaire()
    {
        return $this->datemodification_commentaire;
    }

    public function getValid()
    {
        return $this->valid;
    }

    // SETTERS

    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPost_id($post_id)
    {
        $this->post_id = (int)$post_id;
    }

    public function setUtilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;
    }

    public function setContenu_commentaire($contenu_commentaire)
    {
        $this->contenu_commentaire = $contenu_commentaire;
    }

    public function setDatecreation_commentaire( $datecreation_commentaire)
    {
        $this->datecreation_commentaire = $datecreation_commentaire;
    }

    public function setDatemodification_commentaire( $datemodification_commentaire)
    {
        $this->datemodification_commentaire = $datemodification_commentaire;
    }

    public function setValid($valid)
    {
        $this->valid = $valid;
    }
}























?>
