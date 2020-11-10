<?php
//Recupertation du tableau de l'equipe
$equipe = charge_equipe($c);
$compte = charge_compte_mailmotdepasse($c);
var_dump($compte);

//initialise la page ou la défini en fonction du choix de l'utilisateur
if (isset($_GET) && isset($_GET["page"])){
	$page=$_GET["page"];
	
	//On modifie le titre de la page en meme temps que le changement de page
	$title=$_GET["page"];

}else{
	//Page de base, sans argument dans l'url ou autre chose que page
	$page="accueil";
	$title="accueil";
}


// Envoi du formulaire pour créer un membre
// Vérification

// init tab
$erreur=[];

// POUR L'INSCRIPTION

if (isset($_POST['action'])) {


	if (empty($_POST["nom"])) {
		$erreur[]="nom";
	}


	if (empty($_POST["prénom"])) {
		$erreur[]="prénom";

	}

// + le truc pour le mail avec symbole td5 wayntal
	if (empty($_POST["mail"]) || !preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST["mail"])) {
		$erreur[]="mail";

	}

	if (empty($_POST["motdepasse"])) {
		$erreur[]="motdepasse";

	}


	if (count($erreur)>0) {

		$_SESSION["erreur"]= $erreur;
		$_SESSION["donnee"]= $_POST;
	}
	else {

		$nom = $_POST['nom'];
		$prénom = $_POST['prénom'];
		$mail = $_POST['mail'];
		$motdepasse = $_POST['motdepasse'];



		insert_compte($nom, $prénom, $mail, $motdepasse);

		header("Location:index.php?page=accueil");
		
		unset($_SESSION['erreur']);
		unset($_SESSION['donnee']);

	}
}

// Fin INSCRIPTION

// DEBUT CONNEXION





?>