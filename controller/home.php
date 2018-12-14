<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 
function home(){
	//ou aussi je peux creer una clase
	include 'view/accueil.php';
	

$prenom = $_POST["prenom"];

$email = $_POST["email"];

$telephone = $_POST["telephone"];

$message = $_POST["message"];
	
	
}

function email()
{
 	$mail = new PHPMailer(true);
 try {
 	$log=parse_ini_file('config/php.ini');
 	$mail->IsSMTP();
 	$mail->SMTPAuth = true;
	$mail->SMTPSecure = $log['secure'];
	$mail->Host = $log ['host'];
	$mail->Port = $log ['port'];
	$mail->Username = $log ['username'];
	$mail->Password = $log ['password'];
 	$mail->setFrom('josemadridgil90@gmail.com', 'Blog');
    $mail->addAddress('josemadridgil90@gmail.com', 'Jose');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mon blog';
    $mail->Body    = $message = $_POST["message"];
    
    $mail->send();
    header('Location: /projetoc/');
 	
 } catch (Exception $e)
  {
 	echo ' Error message pas envoyé: ', $mail->ErrorInfo;
 	
  }
}



 ?>