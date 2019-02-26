<?php

/**
 * CONTROLLEUR POUR UTILISATEUR.
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
require_once 'model/conection_db.php';
require_once 'model/utilisateur_model.php';
require_once 'model/utilisateurs.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Controller utilisateur class
 *
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
class Utilisateur_Controlleur
{

    private $utilisateurmanageur;

    /**
     * Constructeur qui va appeler le model des utilisateurs
     *
     * @return void
     */
    public function __construct()
    {

        $this->utilisateurmanageur = new UtilisateurModel();
    }

    /**
     * Permit to get view inscription or connect
     *
     * @param array $token sécurité CSRF
     * 
     * @return void
     */
    public function home($token)
    {
        $_SESSION['token'] = $token;
        //ou aussi je peux creer una clase
        include 'view/accueil.php';
    }

    public function email()
    {
        $mail = new PHPMailer(true);
        try {
            $log = parse_ini_file('config/php.ini');
            $mail->IsSMTP();
            //
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = $log['secure'];
            $mail->Host = $log['host'];
            $mail->Port = $log['port'];
            $mail->Username = $log['username'];
            $mail->Password = $log['password'];
            $mail->setFrom('josemadridgil90@gmail.com', 'Blog');
            $mail->addAddress('josemadridgil90@gmail.com', 'Jose');
            $mail->isHTML(true);
            $mail->Subject = 'Mon blog';
            $mail->Body = $_POST["message"];


            $mail->send();
            header('Location: /projetoc/');
        } catch (Exception $e) {
            echo ' Error message pas envoyé: ', $mail->ErrorInfo;
        }
    }

    public function viewconnection($token)
    {
        $_SESSION['token'] = $token;
        include 'view/viewinscription.php';
    }

    /**
     * Permit add users
     * 
     * @param array $user contien les données des utilisateurs
     * 
     * @return void
     */
    public function inscription(array $user)
    {

        if (!empty($user) && $user['password'] == $user['confirmpassword']) {
            $datas['pseudo'] = $user['pseudo'];
            $datas['email'] = $user['email'];
            $datas['password'] = hash('sha256', $user['password']);


            $users = new Utilisateur($datas);

            $result = $this->utilisateurmanageur->addUtilisateur($users);

            if ($result) {

                header('Location: /projetoc/?action=home');
            }
        } else {
            header('Location: /projetoc/?action=connection');
        }
    }

    /**
     * Permit to connection users
     *
     * @param array $users recupére les données des utilisateurs
     * 
     * @return void
     */
    public function connection(array $users)
    {



        $datas['pseudo'] = $users['pseudo'];
        $datas['password'] = hash('sha256', $users['password']);



        $users = new Utilisateur($datas);


        $result = $this->utilisateurmanageur->connect($users);

        if ($result) {

            $users->hydrate($result);
            $_SESSION['user'] = $users;

            if ($_SESSION['user']->getRole() == 2) {
                header('Location: /projetoc/?action=admin&adminaction=accueil');
            } else {

                header('Location: /projetoc/?action=home');
            }
        } else {

            header('Location: /projetoc/?action=connection');
        }
    }

    public function disconnect()
    {
        session_destroy();
        header('Location: /projetoc/?action=home');
    }

}
