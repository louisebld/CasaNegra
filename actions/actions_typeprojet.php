<?php
	//----------------Partie concernant l'affichage des projets -----------------

	$res = charge_projet($c);
	$titreProjets = "toutes nos réalisations";
	// Affichage de base: tous les projets

	if (isset($_POST['form_typeProjets']) && $_POST['form_typeProjets'] != "allProjets"){
		//Si on precise un type spéciale, on recupere le type et on affiche les projets de ce type

		$res = charge_projetType($_POST['form_typeProjets']);
		$titreProjets = $_POST['form_typeProjets'];

	} elseif (isset($_POST['form_typeProjets']) && $_POST['form_typeProjets'] = "allProjets") {
		// Si on remet tous les projets, alors on reaffiche tous les projets
		$res = charge_projet($c);
		$titreProjets = "toutes nos réalisations";
	}


	//-----------------  insertion d'un nouveau type de projet ----------------------------


// si on a envoyé le formulaire
	if (isset($_POST['Envoyer_Type'])) {
// initialisation variable erreur
		$erreurnewtypeprojet=[];
	//existemetier($_POST["metier"]);
// test si métier vide
		if (empty($_POST["newType"]) || !trim($_POST['newType'])) {
			$erreurnewtypeprojet[]="Vous n'avez pas rentré de type";
		}

// test si il existe déjà
		elseif (existetype(remplaceApo($_POST["newType"]))) {

			$erreurnewtypeprojet[]="Ce type existe déjà";

		}

// si il y a des erreurs
		if (count($erreurnewtypeprojet)>0){
// stockage dans une variable de session
			$_SESSION["fautenewtypeprojet"]= $erreurnewtypeprojet;

		}
// sinon j'insère dans la bdd

		else {
	// j'unset donc ma variable faute
			unset($_SESSION["fautenewtypeprojet"]);
	// je récupère le métier
			$newType = remplaceApo ($_POST['newType']);
	// je l'insère
			insert_typeProjet($newType);
	// redirection avec une petite alert javascript
			echo '<script>alert("Vous avez ajouté un type de projet");
			window.location.href = "./index.php?page=projets";</script>'; 
			exit();

		}
	}









// ------------------------------ AFFICHAGE PROJET EQUIPE ---------------------------------------




	if (isset($_POST['projetequipe']) && $_POST['projetequipe'] != "allProjets"){
		//Si on precise un type spéciale
		$res = charge_projetPersonne($_POST['projetequipe']);
		$titreProjets = $_POST['projetequipe'];

	} elseif (isset($_POST['projetequipe']) && $_POST['projetequipe'] = "allProjets") {
		$res = charge_projet($c);
		$titreProjets = "toutes nos réalisations";
	}



// ----------------------------- SUPPRESSION DE PROJETS -------------------------------



// pareil on vérifie si il est envoyé
if (isset($_POST['envoiesupprtype'])) {

// on prend la valeur
	$typeprojet = remplaceApo($_POST['typeprojet']);
// on récupère du métier avec la fonction
//	$idtypeprojet = recupetypeprojet($typeprojet);

// si le métier est utilisé on prévient
	if (typeutiliser($typeprojet)) {

		$_SESSION['typeutiliser']="Ce type est affecté à un projet, vous ne pouvez pas le supprimer";

	}

	else {
// on supprime le métier
	supprtype($typeprojet);
// on unset la variable de session
	unset($_SESSION["typeutiliser"]);
	//header('location:index.php?page=pageadmin');
// on informe et on redirige
	echo '<script>alert("Vous avez supprimé un type de projets");
	window.location.href = "./index.php?page=projets";</script>'; 
	exit();


	}
}


?>