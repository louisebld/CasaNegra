<?php

//Recuperation du tableau de l'equipe
$equipe = charge_equipe($c);
// données compte
$compte = charge_compte_mailmotdepasse($c);
// $avis = charge_avis($c);


//initialise la page ou la défini en fonction du choix de l'utilisateur
if (isset($_GET) && isset($_GET["page"])){
	$page=$_GET["page"];
	
	//On modifie le titre de la page en meme temps que le changement de page
	//$title=$_GET["page"];

if ($page == "accueil"){
		$title="Accueil";

	}

	elseif ($page == "presentation"){
		$title="Présentation";

	}

	elseif ($page == "inscription") {
		$title="Inscription";
		

	}

	elseif ($page == "connexion") {
		
		$title="Connexion";

	}

	elseif ($page == "projets"){
		$title="Nos projets";

	}


	elseif ($page == "prendrerdv") {
		$title="Les rendez-vous";

	}

	elseif ($page == "contact") {
		$title="Contactez nous";

	}

	elseif ($page == "moncompte") {

		$title="Mon compte";

	}

	elseif ($page == "pageadmin") {
		$title="Page admin";

	}

// si déconnexion : redirection vers l'accueil et suppression des variables de session ? suppression ou unset
	elseif ($page == "deconnexion") {
		$title="Déconnexion";


	}
	}else{

	//Page de base, sans argument dans l'url ou autre chose que page
	$title="Accueil";
	$page="accueil";
}





?>