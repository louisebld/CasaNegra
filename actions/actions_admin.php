<?php

$donneescomptes = charge_compte($c);
$listemetier = recupmetier ($c);
$listeadmin = charge_listeadmin($c);

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



// vérification de l'envoi de l'ajout du membre dans l'équipe

// la vérification si le membre est déjà dans l'équipe se fera sur le nom et le prénom

if (isset($_POST['envoiequipe'])) {

	$erreurajoutmembreequipe=[];

// faire un test ici si le nom prénom existe pas déjà 

	if (empty($_POST["nom"]) || !trim($_POST['nom']) || empty($_POST['prénom']) || !trim($_POST['prénom'])) {
		$erreurajoutmembreequipe[]="Le nom et/ou le prénom est vide";
	}

	elseif (verifmembreequipe ($_POST["nom"], $_POST["prénom"])) {

	$erreurajoutmembreequipe[]="Cette personne est déjà présente dans l'équipe";
}


	if (empty($_POST["age"]) || !trim($_POST['age']) || !is_numeric($_POST["age"])) {

		$erreurajoutmembreequipe[]="L'age est vide ou non numérique";
	}

	if (empty($_POST["description"]) || !trim($_POST['description'])) {

		$erreurajoutmembreequipe[]="La description est vide";
	}


	if (empty($_POST["tel"]) || !trim($_POST['tel']) || !is_numeric($_POST["tel"])) {

		$erreurajoutmembreequipe[]="Le numéro de téléphone est vide ou non valide";
	}

// si il y a des erreurs
	if (count($erreurajoutmembreequipe)>0){
// stockage dans une variable de session
		$_SESSION["fauteequipe"]= $erreurajoutmembreequipe;
		$_SESSION["donnee"]= $_POST;
		// pour garder les données dans le formulaire

	}
// sinon j'insère dans la bdd

	else {
		unset($_SESSION["donnee"]);
		unset($_SESSION["fauteequipe"]);
		$nom = $_POST['nom'];
		$prénom = $_POST['prénom'];
		$age = $_POST['age'];
		$metier = $_POST['metier'];
		$idmetier = recuperemetier($metier);
// à partir d'un métier retrouver son id
		$description = $_POST["description"];
		$tel = $_POST["tel"];


		// marche ?
		insert_membre($nom, $prénom, $age, $idmetier, $description, $tel);
		header('location:index.php?page=pageadmin');

	}
}





// pour la suppression du métier

if (isset($_POST['envoiesupprmetier'])) {

// A FAIRE : VERIFIER SI LE METIER EST PAS UTILISEE 

	$metier = $_POST['metier'];
	$idmetier = recuperemetier($metier);
	//var_dump($idmetier);
	if (metierutiliser($idmetier)) {
		//var_dump(metierutiliser($idmetier));
		$_SESSION['metierutilise']="Ce métier est affecté à un membre, vous ne pouvez pas le supprimer";

	}

	else {

	suppr_métier($metier);
	unset($_SESSION["metierutilise"]);
	header('location:index.php?page=pageadmin');
	}



}

// pour supprimer un membre de l'équipe avec le bouton supprimer




if (isset($_POST['asupprimer'])) {

	$idequipe = $_POST['idasuppr'];
	suppr_equipe($idequipe);
	header('location:index.php?page=pageadmin');

}


// pour supprimer un utilisateur

if (isset($_POST['asupprimercompte'])) {

	$idutilisateur = $_POST['idasupprcompte'];
	suppr_utilisateur($idutilisateur);
	header('location:index.php?page=pageadmin');

}


// pour ajouter un admin

if (isset($_POST['ajouteradmin'])) {

// on ne verifie pas si admin car si il s'affiche dans la liste ça veut dire qu'il n'est pas admin
	$idutilisateuradmin = $_POST['idajout'];
	insert_admin($idutilisateuradmin);
	header('location:index.php?page=pageadmin');

}





?>