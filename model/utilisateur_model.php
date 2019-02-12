<?php

/**
 * MODEL POUR LES UTILISATEURS.
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
class UtilisateurModel
{

    private $_db;
    private $_user = [];

    /**
     * Constructeur qui va se connecter a la bd.
     *
     * @return void
     */
    public function __construct()
    {



        $this->db = Conectdb::conection();
    }
    /**
     * Permit add user
     * 
     * @param int $user données de l'utilisateur
     * 
     * @return boolean
     */
    public function addUtilisateur(Utilisateur $user)
    {


        $add_utilisateur = $this->db->prepare(
            'INSERT INTO utilisateurs '
            . '(pseudo, email, password) VALUES (:pseudo, :email, :password)'
        );


        $add_utilisateur->bindValue(':pseudo', $user->getPseudo());
        $add_utilisateur->bindValue(':email', $user->getEmail());
        $add_utilisateur->bindValue(':password', $user->getPassword());
        $result = $add_utilisateur->execute();
        $add_utilisateur->closeCursor();

        return $result;
    }
     /**
      * Permit connect user
      * 
      * @param int $users données de l'utilisateur
      * 
      * @return boolean
      */
    public function connect(Utilisateur $users)
    {
        $userconect = $this->db->prepare(
            'SELECT * FROM utilisateurs'
            . ' WHERE pseudo=:pseudo AND password=:password'
        );

        $userconect->bindValue(':pseudo', $users->getPseudo());
        $userconect->bindValue(':password', $users->getPassword());
        $userconect->execute();


        if ($userconect->rowCount() == 1) {
            $result = $userconect->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        return false;
    }
     /**
      * Permit connect admin
      * 
      * @param int $users données de l'admin
      * 
      * @return boolean
      */
    public function connectAdmin(Utilisateur $users)
    {
        $userconect = $this->db->prepare(
            'SELECT * FROM utilisateurs'
            . ' WHERE pseudo=:pseudo AND password=:password'
        );

        $userconect->bindValue(':pseudo', $users->getPseudo());
        $userconect->bindValue(':password', $users->getPassword());
        $userconect->execute();


        if ($userconect->rowCount() == 1) {
            $result = $userconect->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        return false;
    }

}
