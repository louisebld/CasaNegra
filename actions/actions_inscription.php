<?php

// -------------------------- Envoi du formulaire pour créer un membre
// Vérification

// init tab
$erreur=[];

// POUR L'INSCRIPTION
// vérification envoi
if (isset($_POST['action'])) {


// nom vide
	if (empty($_POST["nom"]) && !trim($_POST['nom'])) {
		$erreur[]="Nom vide";
	}
// prénom vide
	if (empty($_POST["prénom"]) && !trim($_POST['prénom'])) {
		$erreur[]="Prénom vide";

	}
// mail vide
	if (empty($_POST["mail"])) {
			$erreur[]="Email vide";
	}
	
//ancien :  /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ 
// + le truc pour le mail avec symbole
	
	elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i" , $_POST["mail"])) {
		$erreur[]="Email au mauvais format";
	}
// si l'email est déjà prise 
// appel fonction : voit si il y a déjà un compte avec ce mail
	elseif (existeemail ($_POST["mail"])){

		$erreur[]="Cette adresse email est déjà prise";

	}
// si les mots de passes sont vide
	if (empty($_POST["motdepasse1"]) || empty($_POST["motdepasse2"])) {
		$erreur[]="Mot de passe vide, veuillez remplir les deux champs";

	} 


// si ils sont différents
	elseif(strcmp($_POST["motdepasse2"], $_POST["motdepasse1"])!=0) {

		$erreur[]="Les mots de passes ne correspondent pas";
	}

// si ils sont pas au bon format
	elseif	(mdpbonformat($_POST["motdepasse1"])==false ) {
		$erreur[]="Votre mot de passe doit contenir au moins : • Une majuscule • Une minuscule • Un chiffre • Un caractère spécial • 8 caractères";

	}

// si il y a des erreurs
	if (count($erreur)>0) {
// on stocke variable session
		$_SESSION["erreur"]= $erreur;
// on stocke les données pour les laisser dans le formulaire
		$_SESSION["donnee"]= $_POST;
	}
	else {
// on récupère les données
		$nom = remplaceApo ($_POST['nom']);
		$prénom = remplaceApo ($_POST['prénom']);
		$mail = remplaceApo ($_POST['mail']);
// on prend le 1 mais les 2 mots de passes sont les mêmes 
		$motdepasse = remplaceApo ($_POST['motdepasse1']);

// création du compte dans la bdd
		insert_compte($nom, $prénom, $mail, $motdepasse);
// on redirige
		header("Location:index.php?page=connexion");
// on enlève les variables de session
		unset($_SESSION['erreur']);
		unset($_SESSION['donnee']);

	}
}

// Fin INSCRIPTION

?>