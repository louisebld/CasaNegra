<?php

// Envoi du formulaire pour créer un membre
// Vérification

// init tab
$erreur=[];

// POUR L'INSCRIPTION

if (isset($_POST['action'])) {


// nom vide
	if (empty($_POST["nom"]) && !trim($_POST['nom'])) {
		$erreur[]="Nom vide";
	}

	if (empty($_POST["prénom"]) && !trim($_POST['prénom'])) {
		$erreur[]="Prénom vide";

	}

// + le truc pour le mail avec symbole td5 wayntal
	if (empty($_POST["mail"]) || !preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST["mail"])) {
		$erreur[]="Email vide ou Email au mauvais format";

	}

	if (empty($_POST["motdepasse1"]) || empty($_POST["motdepasse2"]) || (strcmp($_POST["motdepasse2"], $_POST["motdepasse1"])!=0) || mdpbonformat($_POST["motdepasse1"])==false ) {
		$erreur[]="Mot de passe vide ou incorrect : votre mot de passe doit contenir au moins : • Une majuscule • Une minuscule • Un chiffre • Un caractère spécial • 8 caractères";

	}


	if (count($erreur)>0) {

		$_SESSION["erreur"]= $erreur;
		$_SESSION["donnee"]= $_POST;
	}
	else {

		$nom = $_POST['nom'];
		$prénom = $_POST['prénom'];
		$mail = $_POST['mail'];
// on prend le 1 mais les 2 mots de passes sont les mêmes 
		$motdepasse = $_POST['motdepasse1'];



		insert_compte($nom, $prénom, $mail, $motdepasse);

		header("Location:index.php?page=accueil");
		
		unset($_SESSION['erreur']);
		unset($_SESSION['donnee']);

	}
}

// Fin INSCRIPTION

?>