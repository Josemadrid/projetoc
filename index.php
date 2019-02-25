<?php

/**
 * ROOTEUR.
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
require 'controller/home.php';
require 'controller/listposts.php';
require 'controller/posts_controller.php';
require 'controller/Utilisateur_controlleur.php';
require 'vendor/autoload.php';
require 'controller/Admin_controlleur.php';

if (!isset($_SESSION)) {
    session_start();
}



$admin_controlleur = new AdminControlleur();
$users = new Utilisateur();
$instance = new Posts_Controller();
$user_controlleur = new Utilisateur_Controlleur();

try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'disconnect') {
            $user_controlleur->disconnect();
        } elseif ($_GET['action'] == 'home') {

            $token = bin2hex(random_bytes(32));
            home($token);
        } elseif ($_GET['action'] == 'mail') {

            //On vérifie que tous les jetons sont là
            if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])
            ) {

                // On vérifie que les deux correspondent
                if ($_SESSION['token'] == $_POST['token']) {

                    if (isset($_POST['prenom']) && !empty(trim($_POST['prenom']))
                    ) {
                        if (isset($_POST['email']) && !empty(trim($_POST['email']))
                        ) {
                            if (isset($_POST['telephone']) && !empty(trim($_POST['telephone']))
                            ) {
                                if (isset($_POST['message']) && !empty(trim($_POST['message']))
                                ) {
                                    email();
                                }
                            }
                        }
                    }
                } else {
                    echo'erreur de validation';
                }
            } else {
                echo'erreur de validation';
            }
        } elseif ($_GET['action'] == 'addpost') {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $token = bin2hex(random_bytes(32));
                $instance->viewadd($token);
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])
                ) {


                    if ($_SESSION['token'] == $_POST['token']) {



                        if (isset($_POST['auteur']) && !empty(trim($_POST['auteur']))
                        ) {
                            if (isset($_POST['titre']) && !empty(trim($_POST['titre']))
                            ) {
                                if (isset($_POST['chapo']) && !empty(trim($_POST['chapo']))
                                ) {
                                    if (isset($_POST['contenu']) && !empty(trim($_POST['contenu']))
                                    ) {

                                        $instance->add($_POST);
                                    }
                                }
                            }
                        }
                    } else {
                        echo'erreur de validation';
                    }
                } else {
                    echo'erreur de validation';
                }
            }
        } elseif ($_GET['action'] == 'listposts') {

            $instance->listposts();
        } elseif ($_GET['action'] == 'viewsinglepost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $token = bin2hex(random_bytes(32));
                $instance->viewpost($_GET['id'], $token);
            } else {
                header('Location: /projetoc/?action=listposts');
            }
        } elseif ($_GET['action'] == 'editpost') {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $instance->viewedit($_GET['id']);
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {

                    $instance->edit($_GET['id'], $_POST);
                } else {
                    header('Location: /projetoc/?action=listposts');
                }
            }
        } elseif ($_GET['action'] == 'delete') {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                $instance->viewdelete($_GET['id']);
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {

                    $instance->delete($_GET['id'], $_POST);
                } else {
                    header('Location: /projetoc/?action=listposts');
                }
            }
        } elseif ($_GET['action'] == 'connection') {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $token = bin2hex(random_bytes(32));
                $user_controlleur->viewconnection($token);
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {


                if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])
                ) {


                    if ($_SESSION['token'] == $_POST['token']) {



                        if (isset($_POST['pseudo']) && !empty(trim($_POST['pseudo']))
                        ) {
                            if (isset($_POST['email']) && !empty(trim($_POST['email']))
                            ) {
                                if (isset($_POST['password']) && !empty(trim($_POST['password']))
                                ) {
                                    if (isset($_POST['confirmpassword']) && !empty(trim($_POST['confirmpassword']))
                                    ) {

                                        $user_controlleur->inscription($_POST);
                                    }
                                }
                            }
                        }
                    } else {
                        echo'erreur de validation';
                    }
                } else {
                    echo'erreur de validation';
                }
            } else {
                header('Location: /projetoc/?action=connection');
            }
        } elseif ($_GET['action'] == 'connect') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $token = bin2hex(random_bytes(32));

                if (isset($_POST['pseudo']) && !empty(trim($_POST['pseudo']))
                ) {
                    if (isset($_POST['password']) && !empty(trim($_POST['password']))
                    ) {
                        $user_controlleur->connection($_POST);
                    }
                }
            } else {
                header('Location: /projetoc/?action=connection');
            }
        } elseif ($_GET['action'] == 'addcomment') {

            if (isset($_SESSION['user'])) {


                if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                    if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])
                    ) {


                        if ($_SESSION['token'] == $_POST['token']) {



                            if (isset($_POST['postId']) && !empty(trim($_POST['postId']))
                            ) {
                                if (isset($_POST['Message']) && !empty(trim($_POST['Message']))
                                ) {


                                    $admin_controlleur->add($_POST);
                                }
                            }
                        } else {
                            echo'erreur de validation';
                        }
                    } else {
                        echo'erreur de validation';
                    }
                } else {
                    echo 'Vous devez vous connecter';
                }
            }
        } elseif ($_GET['action'] == 'listcomment') {

            $admin_controlleur->listcomment();
        } elseif ($_GET['action'] == 'admin') {
            if ($_SESSION['user']->getRole() == 2) {
                if (isset($_GET['adminaction'])) {
                    if ($_GET['adminaction'] == 'accueil') {
                        $admin_controlleur->accueil();
                    }
                    if ($_GET['adminaction'] == 'viewadmin') {
                        $admin_controlleur->viewadmin();
                    }
                    if ($_GET['adminaction'] == 'viewscomment') {
                        $admin_controlleur->unvalidatedcomments();
                    }
                    if ($_GET['adminaction'] == 'validcomment') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $admin_controlleur->validcomment($_GET['id']);
                        }
                    }
                    if ($_GET['adminaction'] == 'deletecomment') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $admin_controlleur->deletecomment($_GET['id']);
                        }
                    }
                }
            } else {
                header('Location: /projetoc/?action=connection');
            }
        }
    } else {

        $token = bin2hex(random_bytes(32));
        home($token);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
