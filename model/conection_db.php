<?php
/**
 * MODEL POUR CONNECTION BD.
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

/**
 * Model Connect class
 *
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
class Conectdb
{
    /**
     * Permit connect db
     *
     * @return boolean
     */
    public static function conection()
    {


        try{

            $conection=new PDO('mysql:host=localhost;dbname=projet5;', 'root', '');
            $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conection->exec("SET CHARACTER SET UTF8");

    

        }    

        catch(Exeption $e){
            echo("Erreur" . $e->getMessage());
            echo "ligne de erreur" . $e->getLine();


        }

        return $conection;





    }

}
