<?php




// je mets les données de ma base dans des variables (tableau associatif)
// les données des messages de contact qui ne sont pas encore traités
$contactatraiter =charge_contactnotok($c);
// les données des messages de contact qui sont traités
$contactok = charge_contactok($c);

// ------------------------------------- pour poster un message / contact
// vérification envoi
if (isset($_POST['contact'])) {
// initialisation variable stockage erreur
$erreur = [];

// si le téléphone est vide
if (empty($_POST['tel'])) {
	$erreur[]="Vous devez mettre un numero de téléphone pour que l'on puisse vous contacter";


}
// si le message est vide
if (empty($_POST['message'])) {
	$erreur[]="Vous devez mettre un message";
}

if (count($erreur)>0) {
		// si il y a des erreurs : on stocke
				$_SESSION["fautecontact"]= $erreur;
		// stockage données pour qu'elle reste dans le formulaire
				$_SESSION["telmessage"]= $_POST;
				
		}else {
		// on récupère les données
				$id = $_SESSION['idcompte'];
				$tel = $_POST['tel'];
				$message = remplaceApo ($_POST['message']);
// pour avoir la date du jour
				$date = date('Y-m-d H:i:s');
				// var_dump($id);
				// var_dump($tel);
				// var_dump($message);
				// var_dump($date);
		// on insère
				insert_contact($id, $tel, $message, $date);

		// on redirige
				header("Location:index.php");
		// on enlève les variables
				unset($_SESSION['fautecontact']);
				unset($_SESSION['telmessage']);

			}
	}



