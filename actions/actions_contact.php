<?php

$contactatraiter =charge_contactnotok($c);
$contactok = charge_contactok($c);

// pour poster un message / contact

if (isset($_POST['contact'])) {

$erreur = [];


if(!isset($_SESSION['connected'])) {
$erreur[]="Vous devez être connecté pour nous contacter";
}


if (empty($_POST['tel'])) {
	$erreur[]="Vous devez mettre un numero de téléphone pour que l'on puisse vous contacter";


}

if (empty($_POST['message'])) {
	$erreur[]="Vous devez mettre un message";
}

if (count($erreur)>0) {

				$_SESSION["fautecontact"]= $erreur;
				$_SESSION["telmessage"]= $_POST;
				
		}else {
				$id = $_SESSION['idcompte'];
				$tel = $_POST['tel'];
				$message = $_POST['message'];
// pour avoir la date du jour
				$date = date('Y-m-d H:i:s');
				// var_dump($id);
				// var_dump($tel);
				// var_dump($message);
				// var_dump($date);
				insert_contact($id, $tel, $message, $date);


				header("Location:index.php");
				
				unset($_SESSION['fautecontact']);
				unset($_SESSION['telmessage']);

			}
	}



