<?php

/**
 * ENTITE POUR LES POSTS.
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
require_once 'model/posts_model.php';
require_once 'model/hydrate.php';

/**
 * Posts class
 *
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
class Posts
{

    private $_id;
    private $_auteur;
    private $_titre;
    private $_chapo;
    private $_contenu;
    private $_created_at;
    private $_updated_at;

    use Hydrate;

    /**
     * Constructeur qui va hydrate les datas.
     * 
     * @param string $datas hydratation
     * 
     * @return void
     */
    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * SETTER
     * 
     * @param int $id identification du post
     * 
     * @return voide
     */
    public function setId(int $id)
    {
        $this->id = (int) $id;
    }

    /**
     * SETTER
     * 
     * @param string $auteur auteur du post
     * 
     * @return voide
     */
    public function setAuteur(string $auteur)
    {
        $this->auteur = $auteur;
    }
    /**
     * SETTER
     * 
     * @param string $titre titre du post
     * 
     * @return voide
     */
    public function setTitre(string $titre)
    {
        $this->titre = $titre;
    }
    /**
     * SETTER
     * 
     * @param string $chapo chapo du post
     * 
     * @return voide
     */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }
    /**
     * SETTER
     * 
     * @param string $contenu contenu du post
     * 
     * @return voide
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
    /**
     * SETTER
     * 
     * @param datetime $created_at creation du post
     * 
     * @return voide
     */
    public function setCreatedAt($created_at)
    {

        $this->created_at = $created_at;
    }
    /**
     * SETTER
     * 
     * @param datetime $updated_at modification du post
     * 
     * @return voide
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

}
