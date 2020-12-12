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
	$title=$_GET["page"];

}else{
	//Page de base, sans argument dans l'url ou autre chose que page
	$page="accueil";
	$title="accueil";
}

?>