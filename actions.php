<?php
//Recupertation du tableau de l'equipe
$equipe = charge_equipe($c);

//initialise la page ou la défini en fonction du choix de l'utilisateur
if (isset($_GET) && isset($_GET["page"])){
	$page=$_GET["page"];
	
	//On modifie le titre de la page en meme temps que le changement de page
	$title=$_GET["page"];

}else{
	//Page de base, sans argument dans l'url ou autre chose que page
	$page="accueil";
	$title="accueil";
}


// Envoi du formulaire pour créer un membre
// Vérification

// init tab
$erreur=[];

if (isset($_POST['action'])) {


	if (empty($_POST["nom"])) {
		$erreur[]="nom";
	}


	if (empty($_POST["prénom"])) {
		$erreur[]="prénom";

	}

// + le truc pour le mail avec symbole td4 wayntal
	if (empty($_POST["mail"])) {
		$erreur[]="mail";

	}


	if (count($erreur)>0) {

		$_SESSION["erreur"]= $erreur;
		$_SESSION["donnee"]= $_POST;
	}
	else {

		$nom = $_POST['nom'];
		$prénom = $_POST['prénom'];
		$mail = $_POST['mail'];


		insert_compte($nom, $prénom, $mail);

		header("Location:index.php?page=accueil");
		
		unset($_SESSION['erreur']);
		unset($_SESSION['donnee']);

	}
}



?>