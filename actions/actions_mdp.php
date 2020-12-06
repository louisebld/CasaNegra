<?php

if (isset($_POST['changementmdp'])) {

// appel à la fonction pour savoir si l'ancien mdp est correct
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
	elseif (!$verif) {

		unset($_SESSION["fautechangementmdp"]);
		// on change la valeur de la variable de session
		$erreur[]="Ancien mot de passe incorrect";
		// actualisation
		$_SESSION["fautechangementmdp"]=$erreur;
	}

	elseif (!mdpbonformat($_POST["newmdp"])) {

		$erreur[]="Votre nouveau mot de passe n'a pas le format demandé";
		$_SESSION["fautechangementmdp"]=$erreur;

	}

// Si les deux valeurs sont correctes =2
// on se connecte
	else {
// on enlève toutes les variables de session d'erreur

		unset($_SESSION["fautechangementmdp"]);

		// on va pouvoir changer le mot de passe
		changemdp($_SESSION["idcompte"], $_POST["newmdp"]);

		// on informe l'utilisateur qu'il a changé de mot de passe
		// redirection vers la page moncompte
		echo '<script>alert("Vous avez changé de mot de passe");
		window.location.href = "./index.php";</script>'; 
  		exit();
		
	}
}

?>


