<?php

// Envoi du formulaire pour créer un membre
// Vérification

// init tab
$erreur=[];

// POUR L'INSCRIPTION

if (isset($_POST['action'])) {


// nom vide
	if (empty($_POST["nom"]) && trim($_POST['nom'])) {
		$erreur[]="nom";
	}

	if (empty($_POST["prénom"]) && trim($_POST['prénom'])) {
		$erreur[]="prénom";

	}

// + le truc pour le mail avec symbole td5 wayntal
	if (empty($_POST["mail"]) || !preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST["mail"])) {
		$erreur[]="mail";

	}

	if (empty($_POST["motdepasse"])) {
		$erreur[]="motdepasse";

	}


	if (count($erreur)>0) {

		$_SESSION["erreur"]= $erreur;
		$_SESSION["donnee"]= $_POST;
	}
	else {

		$nom = $_POST['nom'];
		$prénom = $_POST['prénom'];
		$mail = $_POST['mail'];
		$motdepasse = $_POST['motdepasse'];



		insert_compte($nom, $prénom, $mail, $motdepasse);

		header("Location:index.php?page=accueil");
		
		unset($_SESSION['erreur']);
		unset($_SESSION['donnee']);

	}
}

// Fin INSCRIPTION

?>