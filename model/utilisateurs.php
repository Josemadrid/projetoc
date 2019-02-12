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
require_once 'model/utilisateur_model.php';
require_once 'model/hydrate.php';
/**
 * Utilisateur class
 *
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
class Utilisateur
{
    private $_id;
    private $_email;
    private $_pseudo;
    private $_password;
    private $_role;

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
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }
    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * GETTERS
     * 
     * @return voide
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * GETTERS
     * 
     * @return voide
     */

    /**
     * SETTER
     * 
     * @param int $id identification de l'utilisateur
     * 
     * @return voide
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
    /**
     * SETTER
     * 
     * @param string $email de l'utilisateur
     * 
     * @return voide
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    /**
     * SETTER
     * 
     * @param string $pseudo de l'utilisateur
     * 
     * @return voide
     */
    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }
    /**
     * SETTER
     * 
     * @param string $password de l'utilisateur
     * 
     * @return voide
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }
    /**
     * SETTER
     * 
     * @param int $role de l'utilisateur
     * 
     * @return voide
     */
    public function setRole(int $role)
    {
        $this->role = $role;
    }
}
