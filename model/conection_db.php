<?php

class Conectdb{

	public static function conection(){


	try{

		$conection=new PDO ('mysql:host=localhost;dbname=projet5;', 'root', '');
		$conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conection->exec("SET CHARACTER SET UTF8");

	

   		}	

	catch(Exeption $e){
	die("Erreur" . $e->getMessage());
		echo "ligne de erreur" . $e->getLine();


		}

		return $conection;





	}

}