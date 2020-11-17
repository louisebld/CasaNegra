<?php

// Envoi du formulaire pour créer un projet
// Vérification

// init tab
$erreur=[];


// POUR L'AJOUT

if (isset($_POST['action'])) {


// nom vide
	if (empty($_POST["nom"]) && !trim($_POST['nom'])) {
		$erreur[]="Nom vide";
	}
// date vide
	if (empty($_POST["date_creation"]) && !trim($_POST['date_creation'])) {
		$erreur[]="Date de creation vide";

// auteur vide
	}

	if (empty($_POST["autor"]) && !trim($_POST['autor'])) {
		$erreur[]="Auteur vide";
	}

// description vide

	if (empty($_POST["description"]) && !trim($_POST['description'])) {
		$erreur[]="Description vide";
	}

// verifier si la date est valide (déja passée)

	if(datepaspasse($_POST["date_creation"])){
		$erreur[]="Cette date n'est pas encore passée";
	}
// verifier si le projet n'existe pas deja 

	if(projetexiste($_POST["nom"])){
		$erreur[]="Ce projet existe deja";

	}

// verifier si l'auteur existe

	if(auteurexistepas($_POST["autor"])){
		$erreur[]="Cet auteur n'existe pas";

	}



	if (count($erreur)>0) {

		$_SESSION["erreur"]= $erreur;
		$_SESSION["donnee"]= $_POST;
	}
	else {

		$nom = $_POST['nom'];
		$date_creation = $_POST['date_creation'];
		$autor = $_POST['autor'];
		$description = $_POST['description'];

// creation du projet dans la bdd
		insert_projet($nom, $date_creation, $autor, $description);

		header("Location:index.php?page=connexion");
		
		unset($_SESSION['erreur']);
		unset($_SESSION['donnee']);

	}
}

// Fin la creation du projet

?>