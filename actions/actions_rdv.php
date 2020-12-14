<?php

// Données de la bdd équipe
$listemembres = recupmembre ($c);

//-------------------------------------------- verif formulaire rdv  -------------------------------
// si sousmission d'un rdv depuis la bdd rdv
if (isset($_POST['envoyer_rdv'])){

	//tableau des erreurs si il y en a 
	$err=[];

	//---------------------------DETECTION DES ERREURS --------------------------------
	if (empty($_POST["heure"]) || !trim($_POST['heure'])) {
		$err[]="Vous n'avez pas rentré d'heure de rdv";
		}

	if (empty($_POST["date"]) || !trim($_POST['date'])) {
		$err[]="Vous n'avez pas rentré de date de rdv";
		}

		// on verifie que ce membre de l'equipe n'a pas deja un rdv a cette heure ce jour la 
	elseif (dejardv(($_POST['date']), $_POST['heure'], recupmembreid($_POST['equipe']))) {
					$err[]= "Ce rendez-vous n'est pas disponible, choisissez d'autres horaires";
				}

		//on verifie que les dates et les horraires rentrés sont bien dans les creaneaux de travail de l'entreprise
				//NE FONCTIONNE PAS 

	// elseif (rdvnonvalide(($_POST['date']), $_POST['heure'])) {
	// 				$err[]= "Ce rdv n'est pas dans les creneaux de travail de l'entreprise";
	// 			}

	

	if (empty($_POST['equipe']) || !trim($_POST['date'])) {
		// ajout []
		$err[]="Vous n'avez pas rentré avec qui vous voulez prendre un rendez-vous";
	}

	//---------------------------ON VERIFIE LE NOMBRE D'ERREUR --------------------------------
	if (count($err)>0){
// stockage dans de notre tableau dans une variable de session pour les afficher plus tard
		$_SESSION["fauterdv"]= $err;

	}

	else{
	//on stocke les infos depuis la variabke $_POST
	$heure = $_POST['heure'];
	$date = $_POST['date'];
	$idclient = $_POST['idclient'];
	$membre = $_POST['equipe'];
	$idmembre = recupmembreid($membre);

	//on insere le rdv 
	insert_rdv($heure, $date, $idclient, $idmembre);
	unset($_SESSION["fauterdv"]);
	header('location:index.php?page=moncompte');



}
}

?>