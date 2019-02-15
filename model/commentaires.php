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
require_once 'model/commentaire_model.php';
require_once 'model/hydrate.php';
require_once 'model/utilisateurs.php';

/**
 * Class Commentaire entité
 *
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
class Commentaire
{

    private $_id;
    private $_post_id;
    private $_utilisateur_id;
    private $_contenu_commentaire;
    private $_datecreation_commentaire;
    private $_datemodification_commentaire;
    private $_valid;
    private $_utilisateur;

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
    public function getUtilisateur()
    {
        return $this->_utilisateur;
    }

    /**
     * GETTER
     * 
     * @return voide
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * GETTER
     * 
     * @return voide
     */
    public function getPostId()
    {
        return $this->_post_id;
    }

    /**
     * GETTER
     * 
     * @return voide
     */
    public function getUtilisateurId()
    {
        return $this->_utilisateur_id;
    }

    /**
     * GETTER
     * 
     * @return voide
     */
    public function getContenuCommentaire()
    {
        return $this->_contenu_commentaire;
    }

    /**
     * GETTER
     * 
     * @return voide
     */
    public function getDatecreationCommentaire()
    {
        return $this->_datecreation_commentaire;
    }

    /**
     * GETTER
     * 
     * @return voide
     */
    public function getDatemodificationCommentaire()
    {
        return $this->_datemodification_commentaire;
    }

    /**
     * GETTER
     * 
     * @return voide
     */
    public function getValid()
    {
        return $this->_valid;
    }

    /**
     * SETTER
     * 
     * @param int $utilisateur utilisateur
     * 
     * @return voide
     */
    public function setUtilisateur($utilisateur)
    {
        $this->_utilisateur = $utilisateur;
    }

    /**
     * SETTER
     * 
     * @param int $id identification
     * 
     * @return voide
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * SETTER
     * 
     * @param int $post_id identification post
     * 
     * @return voide
     */
    public function setPostId($post_id)
    {
        $this->_post_id = (int) $post_id;
    }

    /**
     * SETTER
     * 
     * @param int $utilisateur_id identification utilisateur
     * 
     * @return voide
     */
    public function setUtilisateurId($utilisateur_id)
    {
        $this->_utilisateur_id = $utilisateur_id;
    }

    /**
     * SETTER
     * 
     * @param text $contenu_commentaire contenu commentaire
     * 
     * @return voide
     */
    public function setContenuCommentaire($contenu_commentaire)
    {
        $this->_contenu_commentaire = $contenu_commentaire;
    }

    /**
     * SETTER
     * 
     * @param datetime $datecreation_commentaire date de creation du commentaire
     * 
     * @return voide
     */
    public function setDatecreationCommentaire($datecreation_commentaire)
    {
        $this->_datecreation_commentaire = $datecreation_commentaire;
    }

    /**
     * SETTER
     * 
     * @param datetime $datemodification_commentaire date de modification
     *
     * @return voide
     */
    public function setDatemodificationCommentaire($datemodification_commentaire)
    {
        $this->_datemodification_commentaire = $datemodification_commentaire;
    }

    /**
     * SETTER
     * 
     * @param int $valid validation commentaire
     * 
     * @return voide
     */
    public function setValid($valid)
    {
        $this->_valid = $valid;
    }

}

?>
