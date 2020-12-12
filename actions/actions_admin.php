<?php

// je mets les données de ma base dans des variables (tableau associatif)
// les données des comptes
$donneescomptes = charge_compte($c);
// la liste des métiers
$listemetier = recupmetier ($c);
// la liste des admins
$listeadmin = charge_listeadmin($c);
// le compteur de compte
$compteurcompte = countcompte();
// le compteur de projet
$compteurprojet = countprojet();


// ------------------------------------ vérification de l'envoi du métier

// si on a envoyé le formulaire
if (isset($_POST['envoiemetier'])) {
// initialisation variable erreur
	$erreurmetier=[];
	//existemetier($_POST["metier"]);
// test si métier vide
	if (empty($_POST["metier"]) || !trim($_POST['metier'])) {
		$erreurmetier[]="Vous n'avez pas rentré de métier";
	}

// test si il existe déjà
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
	// j'unset donc ma variable faute
		unset($_SESSION["fautemetier"]);
	// je récupère le métier
		$metier = $_POST['metier'];
	// je l'insère
		insert_métier($metier);
		//header('location:index.php?page=pageadmin');
	// redirection avec une petite alert javascript
		echo '<script>alert("Vous avez ajouté un métier");
		window.location.href = "./index.php?page=pageadmin";</script>'; 
  		exit();

	}
}



// --------------------------- vérification de l'envoi de l'ajout du membre dans l'équipe

// la vérification si le membre est déjà dans l'équipe se fera sur le nom et le prénom

// si le formulaire est soumis
if (isset($_POST['envoiequipe'])) {
// initialisation variable erreur
	$erreurajoutmembreequipe=[];

// si le prénom et/ou le nom sont vides
	if (empty($_POST["nom"]) || !trim($_POST['nom']) || empty($_POST['prénom']) || !trim($_POST['prénom'])) {
		$erreurajoutmembreequipe[]="Le nom et/ou le prénom est vide";
	}
// appel fonction vérification si il n'y a pas déjà un membre de l'équipe s'appellant comme ça
	elseif (verifmembreequipe ($_POST["nom"], $_POST["prénom"])) {

	$erreurajoutmembreequipe[]="Cette personne est déjà présente dans l'équipe";
}

// age vide ou pas au bon format
	if (empty($_POST["age"]) || !trim($_POST['age']) || !is_numeric($_POST["age"])) {

		$erreurajoutmembreequipe[]="L'age est vide ou non numérique";
	}

// description vide
	if (empty($_POST["description"]) || !trim($_POST['description'])) {

		$erreurajoutmembreequipe[]="La description est vide";
	}

// téléphone vide ou pas bon format
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
	// j'unset les variables de sessions
		unset($_SESSION["donnee"]);
		unset($_SESSION["fauteequipe"]);
	// je récupère les données
		$nom = $_POST['nom'];
		$prénom = $_POST['prénom'];
		$age = $_POST['age'];
		$metier = $_POST['metier'];
		$idmetier = recuperemetier($metier);
// à partir d'un métier retrouver son id
		$description = $_POST["description"];
		$tel = $_POST["tel"];


	// j'insère dans ma base
		insert_membre($nom, $prénom, $age, $idmetier, $description, $tel);
		//header('location:index.php?page=pageadmin');
		// on averti et on redirige
		echo '<script>alert("Vous avez ajouté un membre à votre équipe");
		window.location.href = "./index.php?page=pageadmin";</script>'; 
  		exit();


	}
}





// ----------------------------------- pour la suppression du métier
// pareil on vérifie si il est envoyé
if (isset($_POST['envoiesupprmetier'])) {

// on prend la valeur
	$metier = $_POST['metier'];
// on récupère du métier avec la fonction
	$idmetier = recuperemetier($metier);
	//var_dump($idmetier);
// si le métier est utilisé on prévient
	if (metierutiliser($idmetier)) {
		//var_dump(metierutiliser($idmetier));
		$_SESSION['metierutilise']="Ce métier est affecté à un membre, vous ne pouvez pas le supprimer";

	}

	else {
// on supprime le métier
	suppr_métier($metier);
// on unset la variable de session
	unset($_SESSION["metierutilise"]);
	//header('location:index.php?page=pageadmin');
// on informe et on redirige
	echo '<script>alert("Vous avez supprimé un métier");
	window.location.href = "./index.php?page=pageadmin";</script>'; 
	exit();


	}



}

// ------------------- pour supprimer un membre de l'équipe avec le bouton supprimer



// pareil vérification envoi
if (isset($_POST['asupprimer'])) {
// on récupère les données
	$idequipe = $_POST['idasuppr'];
// on supprime
	suppr_equipe($idequipe);
// on informe et on redirige
	//header('location:index.php?page=pageadmin');
	echo '<script>alert("Vous avez supprimé un membre de votre équipe");
	window.location.href = "./index.php?page=pageadmin";</script>'; 
	exit();


}


// ----------------- pour supprimer un utilisateur
// vérification envoi
if (isset($_POST['asupprimercompte'])) {
// on récupère
	$idutilisateur = $_POST['idasupprcompte'];
// on supprime
	suppr_utilisateur($idutilisateur);
	//header('location:index.php?page=pageadmin');
// on informe et on redirige
	echo '<script>alert("Vous avez supprimé un utilisateur");
	window.location.href = "./index.php?page=pageadmin";</script>'; 
  	exit();

}


// ------------------------- pour ajouter un admin
// vérification envoi
if (isset($_POST['ajouteradmin'])) {

// on ne verifie pas si admin car si il s'affiche dans la liste ça veut dire qu'il n'est pas admin
// on récupère
	$idutilisateuradmin = $_POST['idajout'];
// on insère
	insert_admin($idutilisateuradmin);
// on informe et on redirige
	//header('location:index.php?page=pageadmin');
	echo '<script>alert("Vous avez ajouté un membre à ladministration");
	window.location.href = "./index.php?page=pageadmin";</script>'; 
	exit();


}

// ------------------------ pour supprimer un admin
// vérification envoi
if (isset($_POST['deladmin'])) {
// on récupère
	$idutilisateur = $_POST['idadminsuppr'];
// on supprime
	suppr_admin($idutilisateur);
// on informe et on redirige
	//header('location:index.php?page=pageadmin');
	echo '<script>alert("Vous avez supprimé un membre de ladministration");
	window.location.href = "./index.php?page=pageadmin";</script>'; 
	exit();


}

// ----------------------------- pour traiter un message
// vérification envoi
if (isset($_POST['atraiter'])) {
// on récupère
	$idcon = $_POST['idcontactsuppr'];
// on appelle la fonction pour changer le statut du message
	changestatusok($idcon);
// on informe et on redirige
	//header('location:index.php?page=pageadmin');
	echo '<script>alert("Vous avez traité un message");
	window.location.href = "./index.php?page=pageadmin";</script>'; 
  	exit();

	
}
// vérification envoi
if (isset($_POST['asuppr'])) {
// on récupère
	$idcon = $_POST['idcontactsuppr'];
// on supprime
	supprime_contact($idcon);
// on informe et on redirige
	//header('location:index.php?page=pageadmin');
	echo '<script>alert("Vous avez supprimé un message");
	window.location.href = "./index.php?page=pageadmin";</script>'; 
  	exit();

}



?>