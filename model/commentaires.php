<?php
class Commentaire
{
	private $id;
	private $post_id;
	private $utilisateur_id;
	private $contenu_commentaire;
	private $datecreation_commentaire;
	private $datemodification_commentaire;
	private $valid;


	public function __construct(array $tableau)
	{
		$this->hydrate($donnees);
	}



public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }


// GETTERS
    public function id()
    {
        return $this->id;
    }

    public function post_id()
    {
        return $this->post_id;
    }

    public function utilisateur_id()
    {
        return $this->utilisateur_id;
    }

    public function contenu_commentaire()
    {
        return $this->contenu_commentaire;
    }

    public function datecreation_commentaire()
    {
        return $this->datecreation_commentaire;
    }

    public function datemodification_commentaire()
    {
        return $this->datemodification_commentaire;
    }

    public function valid()
    {
        return $this->valid;
    }

// SETTERS
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPost_id($post_id)
    {
        $this->post_id = (int)$post_id;
    }

    public function setUtilisateur_id($pseudo)
    {
        $this->utilisateur_id = $utilisateur_id;
    }

    public function setContenu_commentaire($contenu_commentaire)
    {
        $this->contenu_commentaire = $contenu_commentaire;
    }

    public function setDatecreation_commentaire(DateTime $datecreation_commentaire)
    {
        $this->datecreation_commentaire = $datecreation_commentaire;
    }

    public function setDatemodification_commentaire(DateTime $datemodification_commentaire)
    {
        $this->datemodification_commentaire = $datemodification_commentaire;
    }

    public function setValid($valid)
    {
        $this->valid = $valid;
    }
}



}



















?>