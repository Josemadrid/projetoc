<?php

require_once 'model/entity/posts.php';
require_once 'controller/creerpostcontroller.php';





function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=projet5;', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    return $db;
}


function addBd($auteur,$contenu)
 {
    $db = dbConnect();
    $posts = $db->prepare('INSERT INTO posts(auteur, contenu) VALUES(?, ?, NOW())');
    $affectedLines = $posts->execute(array($auteur, $contenu));

    return $affectedLines;}
