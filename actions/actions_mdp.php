<?php

if (isset($_POST['changementmdp'])) {

// appel à la fonction pour savoir si le mail et le mdp correspondent
	$verif = verificationadressemailmdp($compte, $_SESSION["comptedonnee"]['mail'], $_POST["oldmdp"]);
	$erreur=[];
// non vide
	
	if (empty($_POST["oldmdp"])) {
		$erreur[]="Vous n'avez pas renseigné l'ancien mot de passe";

	}

	if (empty($_POST["newmdp"])) {
		$erreur[]="Vous n'avez pas renseigné le nouveau mot de passe";

	}



// Si on a des champs vide
	if (count($erreur)>0) {

// on met les valeurs dans une variable de session afin de les laisser dans le formulaire
		$_SESSION["fautechangementmdp"]= $erreur;

	}

// Si il n'y a pas deux valeurs correctes
	elseif ($verif==false) {
		//$_SESSION["incorrect"]=verificationadressemailmdp($compte, $_POST["mail"], $_POST["motdepasse"]);
		// on met le tableau dans la variable de session
		unset($_SESSION["fautechangementmdp"]);
		// on change la valeur de la variable de session
		$erreur[]="Mot de passe incorrect";
		$_SESSION["fautechangementmdp"]=$erreur;
	}

	elseif (!mdpbonformat($_POST["newmdp"])) {

		$erreur[]="Votre mot de passe doit contenir au moins : • Une majuscule • Une minuscule • Un chiffre • Un caractère spécial • 8 caractères";

	}

// Si les deux valeurs sont correctes =2
// on se connecte
	else {
// on enlève toutes les variables de session d'erreur

		unset($_SESSION["fautechangementmdp"]);

	//	$_SESSION['monadressemail'] = $_POST["mail"];
  		
		// redirection vers une page membre
		header('Location: index.php?page=moncompte');	
			
	}


}