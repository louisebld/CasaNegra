<?php

$donneescomptes = charge_compte($c);
$listemetier = recupmetier ($c);

// vérification de l'envoi du métier


if (isset($_POST['envoiemetier'])) {

$erreurmetier=[];
// métier vide
existemetier($_POST["metier"]);
	if (empty($_POST["metier"]) || !trim($_POST['metier'])) {
		$erreurmetier[]="Vous n'avez pas rentré de métier";
	}

// si il existe déjà
	elseif (existemetier($_POST["metier"])) {

		$erreurmetier[]="Ce métier existe déjà";

	}

// si il y a des erreurs
	if (count($erreurmetier)>0){
// stockage dans une variable de session
		$_SESSION["fautemetier"]= $erreurmetier;

	}
// sinon j'insère dans la bdd

	else {
		unset($_SESSION["fautemetier"]);
		$metier = $_POST['metier'];
		insert_métier($metier);
		header('location:index.php?page=pageadmin');

	}
}




?>