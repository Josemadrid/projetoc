<?php

/**
 * CONTROLLEUR POUR ACCUEIL.
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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Permit to get view accueil
 *
 * @param array $token sécurité CSRF
 * 
 * @return void
 */
function home($token)
{
    $_SESSION['token'] = $token;
    //ou aussi je peux creer una clase
    include 'view/accueil.php';
}

/**
 * Permit to send mail
 *
 * @return void
 */
function email()
{
    $mail = new PHPMailer(true);
    try {
        $log = parse_ini_file('C:\wamp64\www\config/php.ini');
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
        $mail->Body = $message = $_POST["message"];


        $mail->send();
        header('Location: /projetoc/');
    } catch (Exception $e) {
        echo ' Error message pas envoyé: ', $mail->ErrorInfo;
    }
}
